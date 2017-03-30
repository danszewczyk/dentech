<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Record;
use App\AttributeType;
use App\RecordAttribute;

use App\Patient;

class PatientAttributesController extends Controller
{


    public function create(Request $request, $patient_id = null) {

        if ($request->session()->has('patient_id')) {

            $patient_id = $request->session()->get('patient_id');

        }

        $patient = Patient::find($patient_id);

        $records = Record::with('attributes')->get();
        
        // add attributes to a specific patient

        return view('patients.attributes.create')
            ->with('patient', $patient)
            ->with('records', $records);

    }

    public function store(Request $request, $patient_id = null) {

        // store attribute to this patient

        if ($request->session()->has('patient_id')) {

            $patient_id = $request->session()->get('patient_id');

        }

        $patient = Patient::find($patient_id);

        foreach (array_filter($request->input('attributes')) as $key => $value) {
            $patient->attributes()->attach($key, ['value' => $value]);
        }

        return view('patients.success');

    }

    public function show($patient_id) {

        // store to this patient

        $patient = Patient::with('attributes')->find($patient_id);

        return view('patients.attributes.show')
            ->with('patient', $patient);

    }

}
