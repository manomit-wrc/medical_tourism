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

    //Role section
    Route::get('/admin/role', 'RoleController@index');
    Route::get('/admin/role/create', ['as' => 'create-role', 'uses' => 'RoleController@create']);
    Route::post('/admin/role/add', 'RoleController@add');
    Route::get('/admin/role/edit/{id}', 'RoleController@edit');
    Route::post('admin/role/update/{id}', 'RoleController@update');
    Route::get('/admin/role/delete/{id}','RoleController@delete');

    //Degree section
    Route::get('/admin/degree', 'DegreeController@index');
    Route::get('/admin/degree/create','DegreeController@create');
    Route::post('/admin/degree/store','DegreeController@store');
    Route::get('/admin/degree/edit/{id}','DegreeController@edit');
    Route::patch('/admin/degree/update/{id}','DegreeController@update');
    Route::delete('/admin/degree/delete/{id}','DegreeController@destroy');

    //Medical Facility section
    Route::get('/admin/medicalfacility', 'MedicalFacilityController@index');
    Route::get('/admin/medicalfacility/create','MedicalFacilityController@create');
    Route::post('/admin/medicalfacility/store','MedicalFacilityController@store');
    Route::get('/admin/medicalfacility/edit/{id}','MedicalFacilityController@edit');
    Route::patch('/admin/medicalfacility/update/{id}','MedicalFacilityController@update');
    Route::delete('/admin/medicalfacility/delete/{id}','MedicalFacilityController@destroy');



    Route::get('/admin/adminuser','AdminUserController@index');
    Route::get('/admin/adminuser/create', 'AdminUserController@create');
    Route::post('/admin/adminuser/add', 'AdminUserController@add');
    Route::get('/admin/adminuser/edit/{id}','AdminUserController@edit');
    Route::post('/admin/adminuser/update/{id}', 'AdminUserController@update');
    Route::get('/admin/adminuser/delete/{id}','AdminUserController@delete');
    Route::get('/admin/permission/','AdminUserController@permission');
    Route::post('/admin/store_permission/', 'AdminUserController@store_permission');
    Route::post('/admin/get_permission/','AdminUserController@get_permission');

    //Medical Provider type section
    Route::get('/admin/providertype', 'ProviderTypeController@index');
    Route::get('/admin/providertype/create','ProviderTypeController@create');
    Route::post('/admin/providertype/store','ProviderTypeController@store');
    Route::get('/admin/providertype/edit/{id}','ProviderTypeController@edit');
    Route::patch('/admin/providertype/update/{id}','ProviderTypeController@update');
    Route::delete('/admin/providertype/delete/{id}','ProviderTypeController@destroy');

    //Payment type section
    Route::get('/admin/paymenttype', 'PaymentTypeController@index');
    Route::get('/admin/paymenttype/create','PaymentTypeController@create');
    Route::post('/admin/paymenttype/store','PaymentTypeController@store');
    Route::get('/admin/paymenttype/edit/{id}','PaymentTypeController@edit');
    Route::patch('/admin/paymenttype/update/{id}','PaymentTypeController@update');
    Route::delete('/admin/paymenttype/delete/{id}','PaymentTypeController@destroy');

    //Country State city
    /*Route::get('/admin/api/dependent-dropdown','APIController@index');
    Route::get('/admin/api/get-state-list','APIController@getStateList');
    Route::get('/admin/api/get-city-list','APIController@getCityList');*/

    Route::get('/admin/api/dependent-dropdown','CountryStateCityController@index');
    Route::get('/admin/api/get-state-list','CountryStateCityController@getStateList');
    Route::get('/admin/api/get-city-list','CountryStateCityController@getCityList');

    //Hotel section
    Route::get('/admin/hotel', 'HotelController@index');
    Route::get('/admin/hotel/create','HotelController@create');
    Route::post('/admin/hotel/store','HotelController@store');
    Route::get('/admin/hotel/edit/{id}','HotelController@edit');
    Route::patch('/admin/hotel/update/{id}','HotelController@update');
    Route::delete('/admin/hotel/delete/{id}','HotelController@destroy');
    Route::get('/admin/hotel/show/{id}','HotelController@show');

    //connectivity master section
    Route::get('/admin/connectivity', 'ConnectivityController@index');
    Route::get('/admin/connectivity/create','ConnectivityController@create');
    Route::post('/admin/connectivity/store','ConnectivityController@store');
    Route::get('/admin/connectivity/edit/{id}','ConnectivityController@edit');
    Route::patch('/admin/connectivity/update/{id}','ConnectivityController@update');
    Route::delete('/admin/connectivity/delete/{id}','ConnectivityController@destroy');

    //news section
    Route::get('/admin/news','NewsController@index');
    Route::get('/admin/news/create','NewsController@create');
    Route::post('/admin/news/store','NewsController@store');
    Route::get('/admin/news/edit/{id}','NewsController@edit');
    Route::patch('/admin/news/update/{id}','NewsController@update');
    Route::delete('/admin/news/delete/{id}','NewsController@destroy');

    //provider connectivitysettings master section
    Route::get('/admin/providerconnectivity', 'ProviderConnectivityController@index');
    Route::get('/admin/providerconnectivity/create','ProviderConnectivityController@create');
    Route::post('/admin/providerconnectivity/store','ProviderConnectivityController@store');
    Route::get('/admin/providerconnectivity/edit/{id}','ProviderConnectivityController@edit');
    Route::patch('/admin/providerconnectivity/update/{id}','ProviderConnectivityController@update');
    Route::delete('/admin/providerconnectivity/delete/{id}','ProviderConnectivityController@destroy');

    //Doctor section
    Route::get('/admin/doctors','DoctorController@index');
    Route::get('/admin/doctors/create','DoctorController@create');
    Route::post('/admin/doctors/store','DoctorController@store');
    Route::get('/admin/doctors/edit/{id}','DoctorController@edit');
    Route::post('/admin/doctors/update/{id}','DoctorController@update');
    Route::delete('/admin/doctors/delete/{id}','DoctorController@destroy');
    Route::get('/admin/doctors/delete/{id}','DoctorController@delete');
    Route::post('/admin/doctors/get_state_list','DoctorController@get_state_list');
    Route::post('/admin/doctors/get_city_list','DoctorController@get_city_list');

    //connectivityservices master section
    Route::get('/admin/connectivityservices', 'ConnectivityServicesController@index');
    Route::get('/admin/connectivityservices/create','ConnectivityServicesController@create');
    Route::post('/admin/connectivityservices/store','ConnectivityServicesController@store');
    Route::get('/admin/connectivityservices/edit/{id}','ConnectivityServicesController@edit');
    Route::patch('/admin/connectivityservices/update/{id}','ConnectivityServicesController@update');
    Route::delete('/admin/connectivityservices/delete/{id}','ConnectivityServicesController@destroy');

    //hospitals section
    Route::get('/admin/hospitals', 'HospitalController@index');
    Route::get('/admin/hospitals/create','HospitalController@create');
    Route::post('/admin/hospitals/store','HospitalController@store');
    Route::get('/admin/hospitals/edit/{id}','HospitalController@edit');
    Route::patch('/admin/hospitals/update/{id}','HospitalController@update');
    Route::delete('/admin/hospitals/delete/{id}','HospitalController@destroy');
    Route::get('/admin/hospitals/show/{id}','HospitalController@show');
    Route::get('/admin/hospitals/treatment/{id}','HospitalController@treatment');
    Route::post('/admin/store_treatment/', 'HospitalController@store_treatment');
    Route::post('/admin/get_treatment/','HospitalController@get_treatment');


    Route::get('/admin/package-types/', 'PackageTypeController@index');
    Route::get('/admin/package-types/create', 'PackageTypeController@create');

    //success story section
    Route::get('/admin/successstories','SuccessStoryController@index');
    Route::get('/admin/successstories/create','SuccessStoryController@create');
    Route::post('/admin/successstories/store','SuccessStoryController@store');
    Route::get('/admin/successstories/edit/{id}','SuccessStoryController@edit');
    Route::patch('/admin/successstories/update/{id}','SuccessStoryController@update');
    Route::delete('/admin/successstories/delete/{id}','SuccessStoryController@destroy');
    Route::get('/admin/successstories/show/{id}','SuccessStoryController@show');

     //Provider connectivity services section
    Route::get('/admin/providerconnectivityservices','ProviderConnectivityServicesController@index');
    Route::get('/admin/providerconnectivityservices/create','ProviderConnectivityServicesController@create');
    Route::post('/admin/providerconnectivityservices/store','ProviderConnectivityServicesController@store');
    Route::get('/admin/providerconnectivityservices/edit/{id}','ProviderConnectivityServicesController@edit');
    Route::patch('/admin/providerconnectivityservices/update/{id}','ProviderConnectivityServicesController@update');
    Route::delete('/admin/providerconnectivityservices/delete/{id}','ProviderConnectivityServicesController@destroy');
    Route::get('/admin/providerconnectivityservices/show/{id}','ProviderConnectivityServicesController@show');
	
	 /* genericmedicine section */
	Route::get('/admin/genericmedicine','genericmedicineController@index');
    Route::get('/admin/genericmedicine/create','genericmedicineController@create');
    Route::post('/admin/genericmedicine/store','genericmedicineController@store');
    Route::get('/admin/genericmedicine/edit/{id}','genericmedicineController@edit');
    Route::patch('/admin/genericmedicine/update/{id}','genericmedicineController@update');
    Route::delete('/admin/genericmedicine/delete/{id}','genericmedicineController@destroy');
});
