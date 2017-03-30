<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;

use DateTime;
use DateTimeZone;

use Validator;

class DashboardController extends Controller
{

	protected $todays_patients_appointments;

	public function __construct()
    {
        $this->middleware('auth');

        $todays_patients_appointments_raw = json_decode(file_get_contents(resource_path('assets/scripts/todays_patients_appointments.json')), true);

        $this->todays_patients_appointments = collect($todays_patients_appointments_raw);
    }

    public function index() {
    	return view("dashboard.index", ['todays_patients' => $this->todays_patients_appointments]);

    }


    public function getProfile($patient_id) {

    	$profile_info = collect( $this->todays_patients_appointments->where('id', $patient_id)->first() );

    	if ($profile_info->isEmpty()) {
    		abort(404);
    	}

    	return view('dashboard.profile', ['profile_info' => $profile_info ]);

    }

    public function getContactInfo($patient_id) {


        $profile_info = collect( $this->todays_patients_appointments->where('id', $patient_id)->first() );

        $profile_info['phones'] = collect( $profile_info['phones'] )->sortBy('sequence');

        if ($profile_info->isEmpty()) {
            abort(404);
        }

        return view('dashboard.contact.index', ['profile_info' => $profile_info ]);
    }

    public function postContactInfo(Request $request, $patient_id) {

        $validator = Validator::make($request->all(), [
            'first_name'    =>  'required|alpha|min:2|max:50',
            'last_name'     =>  'required|alpha_dash|min:2|max:50',
            'email'         =>  'required|email',
            'phone.0.type'  =>  'required|alpha',
            'phone.0.number'=>  'required|digits:10',
            'address1'      =>  'required|max:200',
            'address2'      =>  'nullable|max:200',
            'city'          =>  'required|min:2|max:50',
            'state'         =>  'required|alpha|min:2|max:50',
            'postalCode'    =>  'required|max:10'
        ]);

        if ($validator->fails()) {
            return redirect()->action('DashboardController@editContactInfo', ['patient_id' => $patient_id])
                ->withErrors($validator)
                ->withInput();
        }

        //update here
        $profile_info = collect( $this->todays_patients_appointments->where('id', $patient_id)->first() );

        if ($profile_info->isEmpty()) {
            abort(404);
        }


        $array_key = $this->todays_patients_appointments->where('id', $patient_id)->keys()->first();

        $appointments_array = $this->todays_patients_appointments->toArray();


        $profile_info->put('first_name', $request->first_name);
        $profile_info->put('last_name', $request->last_name);
        $profile_info->put('full_name', $request->first_name." ".$request->last_name);
        $profile_info->put('email', $request->email);
        

        $profile_info = $profile_info->toArray();
        $profile_info['mailing_address']['address1'] = $request->address1;
        $profile_info['mailing_address']['address2'] = $request->address2;
        $profile_info['mailing_address']['city'] = $request->city;
        $profile_info['mailing_address']['state'] = $request->state;
        $profile_info['mailing_address']['postalCode'] = $request->postalCode;
        
        //phones

        // foreach ($request->phone as $key => $value) {
        //     $request->phone[$key]['sequence'] = $key + 1;
        // }


       $profile_info['phones'] = $request->phone;

        $appointments_array[$array_key] = $profile_info;

        $fp = fopen(resource_path('assets/scripts/todays_patients_appointments.json'), 'w');
        fwrite($fp, json_encode($appointments_array));
        fclose($fp);


        $patients_export_file = json_decode(file_get_contents(resource_path('assets/patients/'. $patient_id .'.json')), true);

        $patients_export_file = collect($patients_export_file);

        $patients_export_file->put('firstName', $request->first_name);
        $patients_export_file->put('lastName', $request->last_name);

        $patients_export_file->put('primaryEmail', ['address' => $request->email]);
        $patients_export_file->put('patientAddress', [
                'city' => $request->city,
                'address1' => $request->address1,
                'address2' => $request->address2,
                'state' => $request->state,
                'postalCode' => $request->postalCode
            ]);
        $patients_export_file->put('phones', $request->phone);

        $fp = fopen(resource_path('assets/patients/'.$patient_id.'.json'), 'w');
        fwrite($fp, json_encode($patients_export_file));
        fclose($fp);



        return redirect()->action('DashboardController@getProfile', ['patient_id' => $patient_id]);

    }

    public function editContactInfo(Request $request, $patient_id ) {

        $profile_info = collect( $this->todays_patients_appointments->where('id', $patient_id)->first() );
        $profile_info['phones'] = collect( $profile_info['phones'] )->sortBy('sequence');

        if ($profile_info->isEmpty()) {
            abort(404);
        }

        return view('dashboard.contact.edit', ['profile_info' => $profile_info]);

    }



// -----------------------------------------------------------------------------------------------------
//                                       MEDICAL HISTORY 
// -----------------------------------------------------------------------------------------------------

    public function getMedicalStep(Request $request, $patient_id, $step ) {

        $profile_info = collect( $this->todays_patients_appointments->where('id', $patient_id)->first() );
        $profile_info['phones'] = collect( $profile_info['phones'] )->sortBy('sequence');

        if ($profile_info->isEmpty()) {
            abort(404);
        }

        return view('dashboard.medical_history.step'.$step, ['profile_info' => $profile_info]);

    }    

    public function postMedicalInfoStep(Request $request, $patient_id, $step) {


        switch($step) {

            case 1:
                $rules = [];
                break;
            case 2:
                $rules = [];
                break;
            case 3:
                $rules = [];
                break;
            case 4: 
                $rules = [];
                break;
            default:
                abort(400, "no rules for this step!");
                

        }


        $validator = Validator::make($request->all(), [
            
            'radio-choice-page-2-1'     =>  'required',
            'radio-choice-page-2-2'     =>  'required',
            'radio-choice-page-2-3'     =>  'required',
            'radio-choice-page-2-4'     =>  'required',
            'radio-choice-page-2-5'     =>  'required',
            'radio-choice-page-2-6'     =>  'required',
            'radio-choice-page-2-7'     =>  'required',
            'radio-choice-page-2-8'     =>  'required',

            'radio-choice-page-3-1'     =>  'required',
            'radio-choice-page-3-2'     =>  'required',
            'radio-choice-page-3-3'     =>  'required',
            'radio-choice-page-3-4'     =>  'required',
            'radio-choice-page-3-5'     =>  'required',
            'radio-choice-page-3-6'     =>  'required',
            'radio-choice-page-3-7'     =>  'required',

            'radio-choice-page-4-1'     =>  'requried',
            'radio-choice-page-4-2'     =>  'requried',
            'radio-choice-page-4-3'     =>  'requried',
            'radio-choice-page-4-4'     =>  'requried',
            'radio-choice-page-4-5'     =>  'requried',
            'radio-choice-page-4-6'     =>  'requried',
            'radio-choice-page-4-7'     =>  'requried',

            'radio-choice-page-5-1'     =>  'requried',
            'radio-choice-page-5-2'     =>  'requried',
            'radio-choice-page-5-3'     =>  'requried',
            'radio-choice-page-5-4'     =>  'requried',
            'radio-choice-page-5-5'     =>  'requried',
            'radio-choice-page-5-6'     =>  'requried',
            'radio-choice-page-5-7'     =>  'requried',
            'radio-choice-page-5-8'     =>  'requried',
            'radio-choice-page-5-9'     =>  'requried',
            'radio-choice-page-5-10'    =>  'requried',
            'radio-choice-page-5-11'    =>  'requried',

            'radio-choice-page-6-1'    =>  'requried',
            'radio-choice-page-6-2'    =>  'requried',
            'radio-choice-page-6-3'    =>  'requried',
            'radio-choice-page-6-4'    =>  'requried',
            'radio-choice-page-6-5'    =>  'requried',
            'radio-choice-page-6-6'    =>  'requried',
            'radio-choice-page-6-7'    =>  'requried',
            'radio-choice-page-6-8'    =>  'requried',
            'radio-choice-page-6-9'    =>  'requried',
            'radio-choice-page-6-10'   =>  'requried',
            'radio-choice-page-6-12'   =>  'requried',
            'radio-choice-page-6-12'   =>  'requried'
        ]);

        if ($validator->fails()) {
            return 'hello';
        }

    }

}









