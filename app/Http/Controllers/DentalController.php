<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;

class DentalController extends Controller
{

    protected $patient_info;
    protected $next_page = 'medical';

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

    	return view('dental.intro', ['patient_info' => $this->patient_info]);

    }


    public function getStep($patient_id, $step = 1) {

    	$this->current_step = $step;

    	return view('dental.step'.$step, ['patient_info' => $this->patient_info, 'current_step' => $step]);

    }

    public function postStep(Request $request, $patient_id, $step = 1) {

    	$last_page = false;

    	switch ($step) {

    		case 1:
    			$rules = [];
    			break;
    		case 2:
    			$rules = ['dental-page-02-rate' => 'required'];
    			$last_page = true;
    			break;
    		default:
    			abort(400, "no rules for this step!");
    	}


    		$validator = Validator::make($request->all(), $rules);

    		if ($validator->fails()) {
    		    return redirect()->action('DentalController@getStep', ['patient_id' => $this->patient_info['id'], 'step' => $step])
    		        ->withErrors($validator)
    		        ->withInput();
    		}

    		// save to session

    		$request->session()->push('patient_dental_information', $request->except('_token'));

    		if ($last_page) {
    			return redirect()->route($this->next_page, ['patient_id' => $request->patient_id]);
    		} else {
    			return redirect()->route('editDental', ['patient_id' => $request->patient_id, 'step' => $step + 1]);
    		}

    		


    }
}
