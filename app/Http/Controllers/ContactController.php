<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;

class ContactController extends Controller
{

	protected $patient_info;
	protected $next_page = 'dental';

	public function __construct(Request $request)
    {

    	$this->middleware('auth');

        $patient_id = $request->patient_id;

        $patient_info = collect(json_decode(file_get_contents(resource_path('assets/patients/'.$patient_id.'.json')), true));

        if ($patient_info->isEmpty()) {
            abort(404);
        }

        $this->patient_info = $patient_info;
    }

    public function intro() {

    	return view('contact.intro', ['patient_info' => $this->patient_info]);

    }

    public function index() {

    	$phones = collect($this->patient_info['phones'])->sortBy('sequence');
    	
    	return view('contact.index', [
    		'patient_info' => $this->patient_info, 
    		'next_page' => $this->next_page,
    		'phones'	=>	$phones
    	]);

    }

    public function getEdit() {

    	$phones = collect($this->patient_info['phones'])->sortBy('sequence');

    	return view('contact.edit', ['patient_info' => $this->patient_info, 'phones' =>	$phones]);

    }

    public function postEdit(Request $request) {

    	$validator = Validator::make($request->all(), [

    		'phone.*.number' => 'nullable|max:50',
    		'phone.*.type' => 'nullable|alpha|max:10',
    		'phone.*.smsAuthorizationStatus' => 'nullable',
    		'phone.0.number' => 'required|max:50',
    		'phone.0.type' => 'required|alpha|max:10',

    		'email'	=> 'email|nullable',

    	    'address1'	=> 'required|max:255',
    	    'address2'	=> 'nullable|max:255',
    	    'city'		=> 'required|alpha',
    	    'state'		=> 'required|alpha',
    	    'zip'		=>	'required|max:11'
    	]);

    	if ($validator->fails()) {
    	    return redirect()->action('ContactController@getEdit', ['patient_id' => $this->patient_info['id']])
    	        ->withErrors($validator)
    	        ->withInput();
    	}

    	// change the patients info

    	

    	
    	$this->patient_info->put('patientAddress', [
    		'address1' => $request->address1,
    		'address2' => $request->address2,
    		'city' => $request->city,
    		'state' => $request->state,
    		'postalCode' => $request->zip,
    	]);	

    	$this->patient_info->put('primaryEmail', [
    		'address'	=>	$request->email
    	]);

    	$this->patient_info->put('phones', $request->phone);

    	//update the file

    	$fp = fopen(resource_path('assets/patients/'.$request->patient_id.'.json'), 'w');
        fwrite($fp, json_encode($this->patient_info));
        fclose($fp);

        //redirect to next step

        return redirect()->route($this->next_page, ['patient_id' => $request->patient_id]);



    }


}
