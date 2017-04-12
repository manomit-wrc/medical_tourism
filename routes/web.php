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
Route::group(['middleware' => ['auth']], function () {
	Route::get('/admin/logout', array('uses' => 'LoginController@logout'));
    Route::get('/admin/dashboard', 'DashboardController@index');
    Route::get('/admin/procedure', 'ProcedureController@index');
});
