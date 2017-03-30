<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Patient as Patient;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function staff()
    {
        return view('staff.home');
    }

    public function app(Request $request)
    {
        $patient = Patient::findOrFail($request->session()->get('patient_id'));

        return view('app.home')
            ->with('patient', $patient);
    }
}
