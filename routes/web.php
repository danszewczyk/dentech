<?php


// Route::get('/', function () {
//     return view('welcome');
// });


/*
* CONTACT ROUTE
 with post form now...
*/

Route::get('/', function() {
	return "homepage!!";
});


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
		 *  Single Patient
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
			 *  Attributes (single patient)
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

});

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






