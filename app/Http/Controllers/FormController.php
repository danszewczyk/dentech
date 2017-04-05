<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Models
use App\Form as Form;

// Form Requests
use App\Http\Requests\StaffStoreForm as StaffStoreForm;
use App\Http\Requests\StaffUpdateForm as StaffUpdateForm;

class FormController extends Controller
{
    

	/**
	 * Show all forms
	 */

	public function index() {

		$forms = Form::all();

		return view('staff.forms.index')
			->with('forms', $forms);

	}

	/**
	 * Create a form
	 */

	public function create() {

		return view('staff.forms.create');

	}


	/**
	 * Store a form
	 */

	public function store(StaffStoreForm $request) {

		$form = new Form;

		$form->name = $request->name;
		$form->instructions = $request->instructions;
		$form->save();



		return redirect()
                ->route('staff.forms.index')
                ->with('info', 'You created a form!');

	}


	/**
	 * Show a form
	 */

	public function show($id) {

		$form = Form::find($id);

		return view('staff.forms.show')
			->with('form', $form);

	}


	/**
	 * Edit a form
	 */

	public function edit($id) {

		$form = Form::find($id);

		return view('staff.forms.edit')
			->with('form', $form);

	}


	/**
	 * update a form
	 */

	public function update($id, StaffUpdateForm $request) {

		$form = Form::find($id);

		$form->name = $request->name;
		$form->instructions = $request->instructions;

		$form->save();

		return redirect()->route('staff.forms.index')
			->with('info', 'Form updated!');

	}


	/**
	 * destory a form
	 */

	public function destroy($id) {

		$form = Form::find($id);

		$form->delete();

		return redirect()->route('staff.forms.index')
			->with('info', 'Deleted form!');
	}



}
