<?php


// Route::get('/', function () {
//     return view('welcome');
// });


/*
* CONTACT ROUTE
 with post form now...
*/


Auth::routes();

/*  
 *  ------------------------------------------------------------------------
 *  Staff-only Section 
 *  live.dentech.io
 *  ------------------------------------------------------------------------
 */

Route::group([
	'domain' 	=> 'live.'.env('APP_DOMAIN'),
	'middleware'=> 'auth' // TODO: isStaff
], function () {

	Route::get('/', 'HomeController@staff')
		->name('staff.home');

	Route::get('/testing', 'ImportController@todaysPatients');


	/*  --------------------------------------------------------------------
	 *  Patients
	 *  --------------------------------------------------------------------
	 */ 

	Route::group(array('prefix' => 'patients'), function() {

		Route::get('/', 'PatientController@index')
			->name('patients.index');

		Route::get('/create', 'PatientController@create')
			->name('patients.create');

		Route::post('/', 'PatientController@store')
			->name('patients.store');


		/*  ----------------------------------------------------------------
		 *  Single Patient ( patient/12 )
		 *  ----------------------------------------------------------------
		 */ 

		Route::group(array('prefix' => '{id}'), function() {

			Route::get('/', 'PatientController@show')
				->name('patients.show')
				->where('id', '[0-9]+');

			Route::get('/edit', 'PatientController@edit')
				->name('patients.edit')
				->where('id', '[0-9]+');

			Route::put('/', 'PatientController@update')
				->name('patients.update')
				->where('id', '[0-9]+');

			Route::delete('/', 'PatientController@destroy')
				->name('patients.destroy')
				->where('id', '[0-9]+');	

			Route::get('/login', 'PatientController@login')
				->name('patients.login')
				->where('id', '[0-9]+');	


			/*  ----------------------------------------------------------------
			 *  Attributes (single patient) ( patient/12/attributes )
			 *  ----------------------------------------------------------------
			 */ 

			Route::group(array('prefix' => 'attributes'), function() {

				Route::get('/create', 'PatientAttributesController@create')
					->name('patients.attributes.create');

				Route::post('/', 'PatientAttributesController@store')
					->name('patients.attributes.store');

				Route::get('/', 'PatientAttributesController@show')
					->name('patients.attributes.show')
					->where('id', '[0-9]+');

			}); // </attributes>

		}); // </single patient>

	}); // </patients>



	/*  --------------------------------------------------------------------
	 *  Forms - /forms
	 *  --------------------------------------------------------------------
	 */ 

	Route::group(array('prefix' => 'forms'), function() {

		Route::get('/', 'FormController@index')
			->name('staff.forms.index');

		Route::get('/create', 'FormController@create')
			->name('staff.forms.create');

		Route::post('/', 'FormController@store')
			->name('staff.forms.store');


		/*  ----------------------------------------------------------------
		 *  Single Form - /forms/2
		 *  ----------------------------------------------------------------
		 */ 

		Route::group(array('prefix' => '{form}'), function() {


			Route::get('/', 'FormController@show')
				->name('staff.forms.show')
				->where('id', '[0-9]+');

			Route::get('/edit', 'FormController@edit')
				->name('staff.forms.edit')
				->where('id', '[0-9]+');

			Route::put('/', 'FormController@update')
				->name('staff.forms.update')
				->where('id', '[0-9]+');

			Route::delete('/', 'FormController@destroy')
				->name('staff.forms.destroy')
				->where('id', '[0-9]+');	


			/*  ----------------------------------------------------------------
			 *  Sections (single form) - /forms/2/sections
			 *  ----------------------------------------------------------------
			 */ 

			Route::group(array('prefix' => 'sections'), function() {

				Route::get('/', 'FormSectionController@index')
					->name('staff.forms.sections.index');

				Route::get('/create', 'FormSectionController@create')
					->name('staff.forms.sections.create');

				Route::post('/', 'FormSectionController@store')
					->name('staff.forms.sections.store');


				/*  ----------------------------------------------------------------
				 *  Single Section - /forms/2/sections/2
				 *  ----------------------------------------------------------------
				 */

				Route::group(array('prefix' => '{section}'), function() {


					Route::get('/', 'FormSectionController@show')
						->name('staff.forms.sections.show')
						->where('id', '[0-9]+');

					Route::get('/edit', 'FormSectionController@edit')
						->name('staff.forms.sections.edit')
						->where('id', '[0-9]+');

					Route::put('/', 'FormSectionController@update')
						->name('staff.forms.sections.update')
						->where('id', '[0-9]+');

					Route::delete('/', 'FormSectionController@destroy')
						->name('staff.forms.sections.destroy')
						->where('id', '[0-9]+');

				});



			});


		}); // </single form>

	}); // </forms>


}); //live

/*  
 *  ------------------------------------------------------------------------
 *  User-only Section 
 *  app.dentech.io
 *  ------------------------------------------------------------------------
 */

Route::group([
	'domain' 	=> 'app.'.env('APP_DOMAIN'),
	'middleware'	=> ['auth', 'isPatient'] // TODO: isPatient
], function () {

	Route::get('/', 'HomeController@app')
		->name('app.home');

	Route::get('/edit', 'PatientController@edit')
		->name('app.edit')
		->where('id', '[0-9]+');

	Route::put('/', 'PatientController@update')
		->name('app.update')
		->where('id', '[0-9]+');

	/*  ----------------------------------------------------------------
	 *  Attributes (single patient)
	 *  ----------------------------------------------------------------
	 */ 

	Route::group(array('prefix' => 'attributes'), function() {

		Route::get('/create', 'PatientAttributesController@create')
			->name('app.attributes.create');

		Route::post('/', 'PatientAttributesController@store')
			->name('app.attributes.store');

	}); // </attributes>

});





Route::get('/patients/{id}/edit/app/{step?}', 'PatientController@getStepApp')
	->name('patients.app.edit');




Route::put('/patients/{id}/app', 'PatientController@updateApp')
	->name('patients.app.update');






