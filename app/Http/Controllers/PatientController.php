<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

use App\Patient;
use App\Person;

use App\Phone;
use App\Address;
use App\PhoneType;
use App\State;
use App\Country;
use App\RelationshipType;
use App\Record;

use Twilio;

class PatientController extends Controller {

	/**
	 * Display a list of all patients
	 */

	public function index() {

		// get all patients
		$patients = Patient::with('person')->orderBy('created_at', 'desc')->get();

		//load the view and pass the patients
		return view('patients.index')->with('patients', $patients);

	}


	/**
	 * Show a form to add a new patient
	 */

	public function create() {

        // get list of states, countries, etc..

        $states                 = State::all();
        $countries              = Country::all();
        $phone_types            = PhoneType::all();
        $relationship_types     = RelationshipType::all();


		// load the create form
		return view('patients.create')
            ->with('states', $states)
            ->with('countries', $countries)
            ->with('phone_types', $phone_types)
            ->with('relationship_types', $relationship_types);

	}


	/**
	 * Store the newply created patient
	 */

	public function store(Request $request) {

		$rules = array(

            'first_name'                =>  'required|string',
            'preferred_name'            =>  'nullable|string',
            'middle_name'               =>  'nullable|string',
            'last_name'                 =>  'required|string',
            'gender'                    =>  'required|alpha|max:1',
            'date_of_birth'             =>  'required|date',
            'social_security_number'    =>  'nullable|string',
            'occupation'                =>  'nullable|string',
            'external_id'               =>  'nullable|integer',
            'email'                     =>  'nullable|email',
            'line_1'                    =>  'required|string',
            'line_2'                    =>  'nullable|string',
            'city'                      =>  'required|string',
            'state'                     =>  'required|integer',
            'zip_code'                  =>  'required|string',
            'country'                   =>  'required|integer',
            'phones.*.number'           =>  'nullable|string',
            'phones.*.extension'        =>  'nullable|string',
            'phones.*.type'             =>  'required_with:phones.*.number|nullable|integer',
            'phones.*.order'            =>  'required|integer',
            'phones.*.sms_subscribed'   =>  'nullable|integer',
            'phones.0.number'           =>  'required|string',
            'phones.0.type'             =>  'required|integer',

            'emergency_contacts.*.first_name'   =>  'nullable|string',
            'emergency_contacts.*.last_name'    =>  'nullable|string',
            'emergency_contacts.*.type'         =>  'nullable|integer',

            'emergency_contacts.*.phones.*.number'  =>  'nullable|string',
            'emergency_contacts.*.phones.*.extension'  =>  'nullable|string',
            'emergency_contacts.*.phones.*.type'  =>  'nullable|integer',
            'emergency_contacts.*.phones.*.order'  =>  'nullable|integer',

            'emergency_contacts.0.first_name'   =>  'required|string',
            'emergency_contacts.0.last_name'    =>  'required|string',
            'emergency_contacts.0.type'         =>  'required|integer',
            'emergency_contacts.0.phones.0.number'  =>  'required|string',
            'emergency_contacts.0.phones.0.type'  =>  'required|integer',

        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->route('patients.create')
                ->withErrors($validator)
                ->withInput();
        } else {

            // store

            $person = new Person;
            $person->first_name                 =   $request->first_name;
            $person->preferred_name             =   $request->preferred_name;
            $person->middle_name                =   $request->middle_name;
            $person->last_name                  =   $request->last_name;
            $person->gender                     =   $request->gender;
            $person->date_of_birth              =   $request->date_of_birth;
            $person->email                      =   $request->email;

            $patient = new Patient;
            $patient->external_id               =   $request->external_id;
            $patient->occupation                =   $request->occupation;
            $patient->social_security_number    =   $request->social_security_number;

            $address = new Address;
            $address->line_1                    =   $request->line_1;
            $address->line_2                    =   $request->line_2;
            $address->city                      =   $request->city;
            $address->state_id                  =   $request->state;
            $address->zip_code                  =   $request->zip_code;
            $address->country_id                =   $request->country;
            
            $patient->save();
            $patient->person()->save($person);
            $patient->person->address()->save($address);


            // loop through each phone

            collect(array_filter($request->phones))->each(function($new_phone) use ($patient){

                // check if there is a number
                if (!empty($new_phone['number'])) {

                    $sms_subscribed = '0';

                    if (isset($new_phone['sms_subscribed'])) {
                        $sms_subscribed = '1';
                    }

                    $phone = new Phone;
                    $phone->number          =   $new_phone['number'];
                    $phone->extension       =   $new_phone['extension'];
                    $phone->type_id         =   $new_phone['type'];
                    $phone->order           =   $new_phone['order']; 
                    $phone->sms_subscribed  =   $sms_subscribed;

                    $patient->person->phones()->save($phone);

                }

            });


            // loop through each emergency contact
            
            collect(array_filter($request->emergency_contacts))->each(function($new_emergency_contact) use ($patient){

                if (!empty($new_emergency_contact['first_name'])) {

                    $relationship_type = RelationshipType::find($new_emergency_contact['type']);

                    $emergency_contact = new Person;
                    $emergency_contact->first_name  =   $new_emergency_contact['first_name'];
                    $emergency_contact->last_name   =   $new_emergency_contact['last_name'];
                    $emergency_contact->gender      =   $relationship_type->gender;

                    // save the new emergency contact

                    $emergency_contact->save();


                    // attach it to the patient

                    $patient->person->emergency_contacts()->attach($emergency_contact, ['is_emergency_contact' => 1, 'type_id' => $new_emergency_contact['type']]);


                    // loop through phones...
                    collect(array_filter($new_emergency_contact['phones']))->each(function($new_phone) use ($emergency_contact){

                        // check if there is a number
                        if (!empty($new_phone['number'])) {

                            $phone = new Phone;
                            $phone->number          =   $new_phone['number'];
                            $phone->extension       =   $new_phone['extension'];
                            $phone->type_id         =   $new_phone['type'];
                            $phone->order           =   $new_phone['order']; 

                            $emergency_contact->phones()->save($phone);

                        }

                    });
                }

            });


            // redirect the user

            return redirect()
                ->route('patients.index')
                ->with('status', 'Successfully created patient!');

        }

	}


	/**
	 * Display the selected patient
	 */

	public function show($id) {

        // get the patient

        $patient = Patient::find($id);

        // show the view and pass the patient

        return view('patients.show')
            ->with('patient', $patient);

	}


    /**
     * Log in as a patient and redirect to app
     */

    public function login(Request $request, $id) {

        // get the patient

        $patient = Patient::findOrFail($id);

        // create a session

        $request->session()->put('patient_id', $patient->id);

        // redirect to app

        return redirect()->route('app.home');


    }


	/**
	 * Show a form to edit a patient
	 */

	public function edit(Request $request, $id = null) {

        // get the patinet

        if ($request->session()->has('patient_id')) {

            $id = $request->session()->get('patient_id');

        }

        $patient = Patient::with('person')->find($id);

        

        // get list of states, countries, etc..

        $states = State::all();
        $countries = Country::all();
        $phone_types = PhoneType::all();
        $relationship_types     = RelationshipType::all();


        // show the edit form and pass the patient

        return view('patients.edit')
            ->with('patient', $patient)
            ->with('states', $states)
            ->with('countries', $countries)
            ->with('phone_types', $phone_types)
            ->with('relationship_types', $relationship_types);

	}


	/**
	 * Update the selected patient
	 */

	public function update(Request $request, $id = null) {

        // validate

        $rules = array(
            'first_name'                =>  'required|string',
            'preferred_name'            =>  'nullable|string',
            'middle_name'               =>  'nullable|string',
            'last_name'                 =>  'required|string',
            'gender'                    =>  'required|alpha|max:1',
            'date_of_birth'             =>  'required|date',
            'social_security_number'    =>  'nullable|string',
            'occupation'                =>  'nullable|string',
            'external_id'               =>  'nullable|integer',
            'email'                     =>  'nullable|email',
            'line_1'                    =>  'required|string',
            'line_2'                    =>  'nullable|string',
            'city'                      =>  'required|string',
            'state'                     =>  'required|integer',
            'zip_code'                  =>  'required|string',
            'country'                   =>  'required|integer',
            'phones.*.number'           =>  'nullable|string',
            'phones.*.extension'        =>  'nullable|string',
            'phones.*.type'             =>  'required_with:phones.*.number|integer',
            'phones.*.order'            =>  'required|integer',
            'phones.*.id'               =>  'nullable|integer',
            'phones.*.sms_subscribed'   =>  'nullable|integer',
            'phones.0.number'           =>  'required|string',
            'phones.0.extension'        =>  'nullable|string',
            'phones.0.type'             =>  'required|integer',

            'emergency_contacts.*.first_name'   =>  'nullable|string',
            'emergency_contacts.*.last_name'    =>  'nullable|string',
            'emergency_contacts.*.type'         =>  'nullable|integer',

            'emergency_contacts.*.phones.*.number'  =>  'nullable|string',
            'emergency_contacts.*.phones.*.extension'  =>  'nullable|string',
            'emergency_contacts.*.phones.*.type'  =>  'nullable|integer',
            'emergency_contacts.*.phones.*.order'  =>  'nullable|integer',

            'emergency_contacts.0.first_name'   =>  'required|string',
            'emergency_contacts.0.last_name'    =>  'required|string',
            'emergency_contacts.0.type'         =>  'required|integer',
            'emergency_contacts.0.phones.0.number'  =>  'required|string',
            'emergency_contacts.0.phones.0.type'  =>  'required|integer',

        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->route('app.edit', [$id])
                ->withErrors($validator)
                ->withInput();
        } else {

            // update

            if ($request->session()->has('patient_id')) {

                $id = $request->session()->get('patient_id');

            }

            $patient = Patient::find($id);

            $patient->person->first_name            =   $request->first_name;
            $patient->person->preferred_name        =   $request->preferred_name;
            $patient->person->middle_name           =   $request->middle_name;
            $patient->person->last_name             =   $request->last_name;
            $patient->person->gender                =   $request->gender;
            $patient->person->date_of_birth         =   $request->date_of_birth;
            $patient->person->email                 =   $request->email;

            $patient->person->address->line_1       =   $request->line_1;
            $patient->person->address->line_2       =   $request->line_2;
            $patient->person->address->city         =   $request->city;
            $patient->person->address->state_id     =   $request->state;
            $patient->person->address->zip_code     =   $request->zip_code;
            $patient->person->address->country_id   =   $request->country;

            $patient->external_id                   =   $request->external_id;
            $patient->occupation                    =   $request->occupation;
            $patient->social_security_number        =   $request->social_security_number;

            $patient->save();
            $patient->person->save();
            $patient->person->address->save();


            // loop through each phone

            collect(array_filter($request->phones))->each(function($new_phone) use ($patient){

                // check if there is a number
                if (!empty($new_phone['number'])) {

                    $sms_subscribed = '0';

                    if (isset($new_phone['sms_subscribed'])) {
                        $sms_subscribed = '1';
                    }

                    $phone = Phone::where('person_id', '=', $patient->person->id)->find($new_phone['id']);
                    
                    $phone->number          =   $new_phone['number'];
                    $phone->extension       =   $new_phone['extension'];
                    $phone->type_id         =   $new_phone['type'];
                    $phone->order           =   $new_phone['order']; 
                    $phone->sms_subscribed  =   $sms_subscribed;

                    $phone->save();

                }

            });


            // loop through each emergency contact

            collect(array_filter($request->emergency_contacts))->each(function($new_emergency_contact) use ($patient){


                $relationship_type = RelationshipType::find($new_emergency_contact['type']);

                // TODO: where the person is related to patient

                $emergency_contact = Person::find($new_emergency_contact['id']);

                $emergency_contact->first_name  =   $new_emergency_contact['first_name'];
                $emergency_contact->last_name   =   $new_emergency_contact['last_name'];
                $emergency_contact->gender      =   $relationship_type->gender;

                $emergency_contact->save();

                $patient->person->emergency_contacts()->updateExistingPivot($emergency_contact->id, ['type_id' => $new_emergency_contact['type']]);


                // loop through emergency contacts phones

                collect(array_filter($new_emergency_contact['phones']))->each(function($new_phone) use ($emergency_contact){

                    // check if there is a number
                    if (!empty($new_phone['number'])) {

                        $phone = Phone::where('person_id', '=', $emergency_contact->id)->find($new_phone['id']);
                        
                        $phone->number          =   $new_phone['number'];
                        $phone->extension       =   $new_phone['extension'];
                        $phone->type_id         =   $new_phone['type'];
                        $phone->order           =   $new_phone['order']; 

                        $phone->save();

                    }

                });

            });

            // redirect the user

            return redirect()
                ->route('app.attributes.create');

        }

	}


	/**
	 * Remove the selected patient
	 */

	public function destroy($id) {

        // find the patient
        $patient = Patient::find($id);

        // delete
        $patient->delete();

        // redirect the user
        return redirect()
            ->route('patients.index')
            ->with('status', 'Successfully deleted patient!');


	}


    public function getStepApp($id, $step = 1) {

        //$patient =  Patient::where('external_id', '=', $patient_external_id)->with(['person.emergency_contacts.phones', 'attributes.type', 'person.phones.type', 'person.address.state', 'person.address.country'])->first();

        switch ($step){

            case 1:

                $patient = Patient::with(['person.phones', 'person.address'])->find($id);

                $phone_types = PhoneType::all();
                $states = State::all();
                $countries = Country::all();

                return view('patients.step'.$step, [
                    'patient'       => $patient,
                    'phone_types'   => $phone_types,
                    'states'        => $states,
                    'countries'     => $countries,
                    'current_step'  => $step
                ]);

            break;

            case 2:

                $patient = Patient::with(['person.emergency_contacts.phones', 'person.address'])->find($id);

                $phone_types = PhoneType::all();
                $states = State::all();
                $countries = Country::all();
                $relationship_types = RelationshipType::all();

                $emergency_contacts = $patient->person->emergency_contacts;

                return view('patients.step'.$step, [
                    'patient'       => $patient,
                    'phone_types'   => $phone_types,
                    'states'        => $states,
                    'countries'     => $countries,
                    'emergency_contacts' => $emergency_contacts,   
                    'relationship_types' => $relationship_types, 
                    'current_step'  => $step
                ]);
            break;

            case 3:

                $records = Record::with('attributes')->get();

                //$patient->attributes()->orderBy('created_at', 'desc')->first()->pivot->created_at;

                $patient = Patient::find($id);

                return view('patients.step'.$step, [
                    'patient'       => $patient,
                    'records'       => $records,
                    'current_step'  => $step
                ]);
            break;

            default:

                return abort(404);

            break;

        }

        

        

    }




}