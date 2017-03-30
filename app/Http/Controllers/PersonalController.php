<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;

class PersonalController extends Controller
{


	protected $patient_info;
	protected $next_page = 'contact';

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

    	return view('personal.intro', ['patient_info' => $this->patient_info]);

    }

    public function index() {
    	
    	return view('personal.index', ['patient_info' => $this->patient_info, 'next_page' => $this->next_page]);

    }

    public function getEdit() {

    	return view('personal.edit', ['patient_info' => $this->patient_info]);

    }

    public function postEdit(Request $request) {

    	$validator = Validator::make($request->all(), [
    	    'first_name'    =>  'required|alpha|min:2|max:50',
    	    'last_name'     =>  'required|alpha_dash|min:2|max:50',
    	]);

    	if ($validator->fails()) {
    	    return redirect()->action('PersonalController@getEdit', ['patient_id' => $this->patient_info['id']])
    	        ->withErrors($validator)
    	        ->withInput();
    	}

    	// change the patients info

    	$this->patient_info['firstName'] = $request->first_name;
    	$this->patient_info['lastName'] = $request->last_name;

    	//update the file

    	$fp = fopen(resource_path('assets/patients/'.$request->patient_id.'.json'), 'w');
        fwrite($fp, json_encode($this->patient_info));
        fclose($fp);

        //redirect to next step

        return redirect()->route($this->next_page, ['patient_id' => $request->patient_id]);



    }


}
