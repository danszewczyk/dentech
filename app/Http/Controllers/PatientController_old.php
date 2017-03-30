<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

use App\Mail\VerifyEmail;
use Illuminate\Support\Facades\Mail;

use App\Jobs\SendVerificationEmail;

use App\Person;
use App\Patient;
use App\Phone;
use App\Address;
use App\PhoneType;
use App\State;
use App\Country;
use App\RelationshipType;
use App\Record;

use Twilio;

class PatientController extends Controller
{

	protected $patient_info;

	// public function __construct(Request $request)
 //    {
 //        $this->middleware('auth');

 //        $patient_id = $request->patient_id;

 //        $patient_info = collect(json_decode(file_get_contents(resource_path('assets/patients/'.$patient_id.'.json')), true));

 //    	if ($patient_info->isEmpty()) {
 //    		abort(404);
 //    	}

 //    	$this->patient_info = $patient_info;
 //    }

    public function getStep($patient_external_id, $step = 1) {

        //$patient =  Patient::where('external_id', '=', $patient_external_id)->with(['person.emergency_contacts.phones', 'attributes.type', 'person.phones.type', 'person.address.state', 'person.address.country'])->first();

        switch ($step){

            case 1:

                $patient = Patient::with(['person.phones', 'person.address'])->where('external_id', '=', $patient_external_id)->first();

                $phone_types = PhoneType::all();
                $states = State::all();
                $countries = Country::all();

                return view('patient.step'.$step, [
                    'patient'       => $patient,
                    'phone_types'   => $phone_types,
                    'states'        => $states,
                    'countries'     => $countries,
                    'current_step'  => $step
                ]);

            break;

            case 2:

                $patient = Patient::with(['person.emergency_contacts.phones', 'person.address'])->where('external_id', '=', $patient_external_id)->first();

                $phone_types = PhoneType::all();
                $states = State::all();
                $countries = Country::all();
                $relationship_types = RelationshipType::all();

                $emergency_contacts = $patient->person->emergency_contacts;

                return view('patient.step'.$step, [
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

                $patient = Patient::where('external_id', '=', $patient_external_id)->first();

                return view('patient.step'.$step, [
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

    public function createEmergencyContactPost(Request $request, $patient_external_id) {

        $validate = Validator::make($request->all(), [
            'first_name'                =>  'required|string|min:2',
            'last_name'                 =>  'required|string|min:2',
            'relationship_type'         =>  'required',
        
            'phones.*.number'           =>  'nullable|string',
            'phones.*.extension'        =>  'nullable|string',
            'phones.*.type'             =>  'required_with:phones.*.number|nullable|integer',
            'phones.0.number'           =>  'required|string',
            'phones.0.type'             =>  'required|integer',
        ], [

            'required'  => 'Required',
            'alpha'     => 'Letters only',
            'min'       => 'Too short',
            'date'      => 'Incorrect date',
            'max'       => 'Too Long',
            'in'        => 'Incorrect choice'

        ])->validate();


        $person = Person::find($request->person_id);

        $relationship_type = RelationshipType::find($request->relationship_type);

        $emergency_person = new Person;

        $emergency_person->email = null;
        $emergency_person->first_name = $request->first_name;
        $emergency_person->preferred_name = $request->preferred_name;
        $emergency_person->middle_name = $request->middle_name;
        $emergency_person->last_name = $request->last_name;
        $emergency_person->gender = $relationship_type->gender;

        $emergency_person->save();

        $person->emergency_contacts()->attach($emergency_person, ['is_emergency_contact' => 1, 'type_id' => $request->relationship_type]);

        collect($request->phones)->each(function($new_phone) use ($emergency_person) {

            $phone = new Phone;

            $phone->number = $new_phone['number'];
            $phone->order = $new_phone['order'];
            $phone->type_id = $new_phone['type'];
            $phone->extension = $new_phone['extension'];

            $phone_type_name = PhoneType::where('id', '=', $new_phone['type'])->first()->name;

            $phone->person_id = $emergency_person->id;

            $phone->save();

        });

        return redirect()->action('PatientController@getStep', ['patient_external_id' => $patient_external_id, 'step' => 3]);


    }

    public function update(Request $request, $patient_external_id, $step) {

        $patient = Patient::where('external_id', '=', $patient_external_id)->first();

        switch ($step){

            case 1: 

                $validate = Validator::make($request->all(), [
                    'first_name'                =>  'required|string|min:2',
                    'preferred_name'            =>  'nullable|string|min:2',
                    'middle_name'               =>  'nullable|string|min:2',
                    'last_name'                 =>  'required|string|min:2',

                    'gender'                    =>  'required|in:m,f',
                    'date_of_birth'             =>  'required|date',
                    'social_security_number'    =>  'nullable|min:9',

                    'occupation'                =>  'nullable|alpha|max:100',
                    
                    'email'                     =>  'nullable|email',
                    'phones.*.number'           =>  'nullable|string',
                    'phones.*.extension'        =>  'nullable|string',
                    'phones.*.type'             =>  'required_with:phones.*.number|nullable|integer',
                    'phones.*.sms_subscribed'   =>  'nullable|integer',
                    'phones.0.number'           =>  'required|string',
                    'phones.0.type'             =>  'required|integer',
                    
                    'line_1'                    =>  'required|string',
                    'line_2'                    =>  'nullable|string',
                    'line_3'                    =>  'nullable|string',
                    'city'                      =>  'required|string',
                    'state'                     =>  'required|integer',
                    'zip_code'                  =>  'required|integer|min:5',
                    'country'                   =>  'required|integer'

                    

                ], [

                    'required'  => 'Required',
                    'alpha'     => 'Letters only',
                    'min'       => 'Too short',
                    'date'      => 'Incorrect date',
                    'max'       => 'Too Long',
                    'in'        => 'Incorrect choice'

                ])->validate();

                $patient->occupation                = $request->occupation;
                $patient->social_security_number    = $request->social_security_number;

                $patient->person->first_name        = $request->first_name;
                $patient->person->preferred_name    = $request->preferred_name;
                $patient->person->middle_name       = $request->middle_name;
                $patient->person->last_name         = $request->last_name;
                $patient->person->gender            = $request->gender;
                $patient->person->date_of_birth     = $request->date_of_birth;
                $patient->person->email             = $request->email;   
                
                $patient->person->address->line_1       = $request->line_1;
                $patient->person->address->line_2       = $request->line_2;
                $patient->person->address->line_3       = $request->line_3;
                $patient->person->address->city         = $request->city;
                $patient->person->address->state_id     = $request->state;
                $patient->person->address->zip_code     = $request->zip_code;
                $patient->person->address->country_id   = $request->country;

                $patient->save();
                $patient->person->save();
                $patient->person->address->save();

                // add job to queue
                dispatch(new SendVerificationEmail($patient->person));

                collect(array_filter($request->phones))->each(function($updated_phone) use ($patient) {

                    if (!empty($updated_phone['number'])) {

                        $phone_type_name = PhoneType::find($updated_phone['type'])->name;

                        if (isset($updated_phone['sms_subscribed']) && $phone_type_name == "mobile") {

                            $sms_subscribed = '1';

                            
                            try {
                                Twilio::message($updated_phone['number'], "Hey ". $patient->person->first_name ."! Thanks for subscribing to text alerts!");
                            } catch (\Services_Twilio_RestException $e) {
                                
                            }

                        } else {
                            
                            $sms_subscribed = '0';  

                        }

                        $patient->person->phones()->updateOrCreate([
                                'id'                => $updated_phone['id']
                            ],[
                                'number'            => $updated_phone['number'],
                                'extension'         => $updated_phone['extension'],
                                'type_id'              => $updated_phone['type'],
                                'order'             => $updated_phone['order'],
                                'sms_subscribed'    => $sms_subscribed    
                        ]);
                    } // if no phone number

                    else {
                        $phone = Phone::find($updated_phone['id']);
                        $phone->delete();
                    }

                });

            
                
                return redirect()->action('PatientController@getStep', ['patient_external_id' => $patient_external_id, 'step' => 2]);

                break;

            case 2:

            collect($request->emergency_contacts)->each(function($updated_emergency_contact) use ($person) {

                $emergency_contact = Person::find($updated_emergency_contact['person_id']);

                $emergency_contact->first_name = $updated_emergency_contact['first_name'];
                $emergency_contact->preferred_name = $updated_emergency_contact['preferred_name'];
                $emergency_contact->middle_name = $updated_emergency_contact['middle_name'];
                $emergency_contact->last_name = $updated_emergency_contact['last_name'];

                $person->emergency_contacts()->updateExistingPivot($updated_emergency_contact['person_id'], ['type_id' => $updated_emergency_contact['relationship_type']]);

                $emergency_contact->save();
                $person->save();



                collect($updated_emergency_contact['phones'])->each(function($updated_phone){

                    $phone = Phone::find($updated_phone['id']);

                    $phone->number = $updated_phone['number'];
                    $phone->extension = $updated_phone['extension'];
                    $phone->type_id = $updated_phone['type'];
                    $phone->order = $updated_phone['order'];

                    $phone_type_name = PhoneType::where('id', '=', $updated_phone['type'])->first()->name;

                    $phone->save();

                });

            });

                    return redirect()->action('PatientController@getStep', ['patient_external_id' => $patient_external_id, 'step' => 3]);

                break;

            case 3:  

                //$person->emergency_contacts()->attach($emergency_person, ['is_emergency_contact' => 1, 'type_id' => $request->relationship_type]);

                foreach (array_filter($request->input('attributes')) as $key => $value) {
                    $patient->attributes()->attach($key, ['value' => $value]);
                }

                return "ALL DONE!";

            break;

            default:

                return abort(404);

            break;

        }       
    }
}
