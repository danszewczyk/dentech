<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MedicalController extends Controller
{
    protected $patient_info;
    protected $next_page = 'confirm';

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

    	return view('medical.intro', ['patient_info' => $this->patient_info]);

    }

    public function getStep($patient_id, $step = 1) {

    	$this->current_step = $step;

    	return view('medical.step'.$step, ['patient_info' => $this->patient_info, 'current_step' => $step]);

    }


}
