<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Models
use App\Form as Form;
use App\FormSection as FormSection;

// Form Requests
use App\Http\Requests\StaffStoreFormSection as StaffStoreFormSection;
use App\Http\Requests\StaffUpdateFormSection as StaffUpdateFormSection;


class FormSectionController extends Controller
{
    
	public function index(Form $form) {

		$sections = $form->sections;

		return view('staff.forms.sections.index')
			->with('form', $form)
			->with('sections', $sections);

	}

	public function create(Form $form) {

		return view('staff.forms.sections.create')
			->with('form', $form);

	}


	public function store(StaffStoreFormSection $request, Form $form) {

		$form->sections()->create([
			'name'			=>	$request->name,
			'title'			=>	$request->title,
			'sub_heading'	=>	$request->subheading,
		]);
		

		return redirect()->route('staff.forms.sections.index', $form->id)
			->with('info', 'Succesfully added section to "'.$form->name.'"');

	}


	public function show(Form $form, FormSection $section) {

		return view('staff.forms.sections.show')
			->with('form', $form)
			->with('section', $section);

	}

	public function edit(StaffUpdateFormSection $request, Form $form, FormSection $section) {

		return 'edit';
		
		// return view('staff.forms.sections.edit')
		// 	->with('form', $form)
		// 	->with('section', $section);


	}

	public function update(Form $form, FormSection $section) {


		return redirect()->route('staff.forms.sections.index', [$form->id, $section->id])
			->with('info', 'Edited a section!');

	}

	public function destroy($form, $section_id) {


		$section = FormSection::find($section_id);

		$section->delete();

		return redirect()->route('staff.forms.sections.index', [$form, $section_id])
			->with('info', 'SUccesfully deleted section!');

	}


}
