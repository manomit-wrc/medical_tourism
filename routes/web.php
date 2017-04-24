<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', 'LoginController@index');
Route::post('/admin/login', 'LoginController@checkLogin');
//Route::get('/admin/dashboard', 'DashboardController@index')->middleware('web');
Route::group(['middleware' => ['admin']], function () {
	Route::get('/admin/logout', array('uses' => 'LoginController@logout'));
    Route::get('/admin/dashboard', 'DashboardController@index');

    //Language capability section
    Route::get('/admin/languagecapability', 'LanguageCapabilityController@index');
    Route::get('/admin/languagecapability/create','LanguageCapabilityController@create');
    Route::post('/admin/languagecapability/store','LanguageCapabilityController@store');
    Route::get('/admin/languagecapability/edit/{id}','LanguageCapabilityController@edit');
    Route::patch('/admin/languagecapability/update/{id}','LanguageCapabilityController@update');
    Route::delete('/admin/languagecapability/delete/{id}','LanguageCapabilityController@destroy');

    //Procedure section
    Route::get('/admin/procedure', 'ProcedureController@index');
    Route::get('/admin/procedure/create','ProcedureController@create');
    Route::post('/admin/procedure/store','ProcedureController@store');
    Route::get('/admin/procedure/edit/{id}','ProcedureController@edit');
    Route::patch('/admin/procedure/update/{id}','ProcedureController@update');
    Route::delete('/admin/procedure/delete/{id}','ProcedureController@destroy');

    //Treatment section
    Route::get('/admin/treatment', 'TreatmentController@index');
    Route::get('/admin/treatment/create','TreatmentController@create');
    Route::post('/admin/treatment/store','TreatmentController@store');
    Route::get('/admin/treatment/edit/{id}','TreatmentController@edit');
    Route::patch('/admin/treatment/update/{id}','TreatmentController@update');
    Route::delete('/admin/treatment/delete/{id}','TreatmentController@destroy');

    //Accrediation section
    Route::get('/admin/accrediation', 'AccrediationController@index');
    Route::get('/admin/accrediation/create','AccrediationController@create');
    Route::post('/admin/accrediation/store','AccrediationController@store');
    Route::get('/admin/accrediation/edit/{id}','AccrediationController@edit');
    Route::patch('/admin/accrediation/update/{id}','AccrediationController@update');
    Route::delete('/admin/accrediation/delete/{id}','AccrediationController@destroy');

    //Accomodation section
    Route::get('/admin/accomodation', 'AccomodationController@index');
    Route::get('/admin/accomodation/create','AccomodationController@create');
    Route::post('/admin/accomodation/store','AccomodationController@store');
    Route::get('/admin/accomodation/edit/{id}','AccomodationController@edit');
    Route::patch('/admin/accomodation/update/{id}','AccomodationController@update');
    Route::delete('/admin/accomodation/delete/{id}','AccomodationController@destroy');

    //Cuisine section
    Route::get('/admin/cuisine', 'CuisineController@index');
    Route::get('/admin/cuisine/create','CuisineController@create');
    Route::post('/admin/cuisine/store','CuisineController@store');
    Route::get('/admin/cuisine/edit/{id}','CuisineController@edit');
    Route::patch('/admin/cuisine/update/{id}','CuisineController@update');
    Route::delete('/admin/cuisine/delete/{id}','CuisineController@destroy');

    //Specific Service section
    Route::get('/admin/specificservice', 'SpecificServiceController@index');
    Route::get('/admin/specificservice/create','SpecificServiceController@create');
    Route::post('/admin/specificservice/store','SpecificServiceController@store');
    Route::get('/admin/specificservice/edit/{id}','SpecificServiceController@edit');
    Route::patch('/admin/specificservice/update/{id}','SpecificServiceController@update');
    Route::delete('/admin/specificservice/delete/{id}','SpecificServiceController@destroy');

    //Banner section
    Route::get('/admin/banner', 'BannerController@index');
    Route::get('/admin/banner/create','BannerController@create');
    Route::post('/admin/banner/store','BannerController@store');
    Route::get('/admin/banner/edit/{id}','BannerController@edit');
    Route::patch('/admin/banner/update/{id}','BannerController@update');
    Route::delete('/admin/banner/delete/{id}','BannerController@destroy');

});
