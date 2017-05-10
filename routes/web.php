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
//Frontend routing start here
Route::get('/','HomeController@index');
Route::get('/activate/{token}/{current_time}','PagesController@activate');
Route::get('/about','PagesController@about');
Route::get('/services','PagesController@services');
Route::get('/servicedetails/{id}','PagesController@servicedetails');
Route::get('/enquiry','PagesController@enquiry');
Route::get('/facilities','PagesController@facilities');
Route::get('/doctors','PagesController@doctors');
Route::get('/doctordetail/{id}','PagesController@doctordetail');
Route::get('/contact','PagesController@contact');
Route::post('contact-us', ['as'=>'contactus.store','uses'=>'ContactUSController@contactUSPost']);
Route::get('/news','PagesController@news');
Route::get('/newsdetails/{id}','PagesController@newsdetails');
Route::get('/faqs','PagesController@faqs');
Route::get('/connectivity','PagesController@connectivity');
Route::get('/immigration','PagesController@immigration');
Route::get('/visa','PagesController@visa');
Route::get('/disclaimer','PagesController@disclaimer');
Route::get('/privacypolicy','PagesController@privacypolicy');
Route::get('/successstory_details/{id}','PagesController@successstory_details');
Route::get('/frontend/check_user_exist','PagesController@check_user_exist');
Route::post('/patient-registration','PagesController@patient_registration');
Route::post('/patient-login','PagesController@patient_login');

Route::group(['middleware' => ['front']], function() {
	Route::get('/profile','PagesController@patient_profile');
	Route::post('/update-profile','PagesController@update_profile');
	Route::get('/patient-logout','PagesController@patient_logout');
	Route::post('/get_state_list','PagesController@get_state_list');
	Route::post('/get_city_list','PagesController@get_city_list');
	Route::get('/change-password','PagesController@change_password');
	Route::post('update-password','PagesController@update_password');
    Route::get('/upload-documents','PagesController@upload_documents');
});
//Route::get('/successstory','HelperController@successstory');


//Backend routing start here
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
	Route::get('/admin/languagecapability/delete/{id}','LanguageCapabilityController@delete');

    //Procedure section
    Route::get('/admin/procedure', 'ProcedureController@index');
    Route::get('/admin/procedure/create','ProcedureController@create');
    Route::post('/admin/procedure/store','ProcedureController@store');
    Route::get('/admin/procedure/edit/{id}','ProcedureController@edit');
    Route::patch('/admin/procedure/update/{id}','ProcedureController@update');    
	Route::get('/admin/procedure/delete/{id}','ProcedureController@delete');

    //Treatment section
    Route::get('/admin/treatment', 'TreatmentController@index');
    Route::get('/admin/treatment/create','TreatmentController@create');
    Route::post('/admin/treatment/store','TreatmentController@store');
    Route::get('/admin/treatment/edit/{id}','TreatmentController@edit');
    Route::patch('/admin/treatment/update/{id}','TreatmentController@update');   
	Route::get('/admin/treatment/delete/{id}','TreatmentController@delete');

    //Accrediation section
    Route::get('/admin/accrediation', 'AccrediationController@index');
    Route::get('/admin/accrediation/create','AccrediationController@create');
    Route::post('/admin/accrediation/store','AccrediationController@store');
    Route::get('/admin/accrediation/edit/{id}','AccrediationController@edit');
    Route::patch('/admin/accrediation/update/{id}','AccrediationController@update');
    Route::delete('/admin/accrediation/delete/{id}','AccrediationController@destroy');
    Route::get('/admin/accrediation/delete/{id}','AccrediationController@delete');

    //Accomodation section
    Route::get('/admin/accomodation', 'AccomodationController@index');
    Route::get('/admin/accomodation/create','AccomodationController@create');
    Route::post('/admin/accomodation/store','AccomodationController@store');
    Route::get('/admin/accomodation/edit/{id}','AccomodationController@edit');
    Route::patch('/admin/accomodation/update/{id}','AccomodationController@update');    
    Route::get('/admin/accomodation/delete/{id}','AccomodationController@delete');

    //Cuisine section
    Route::get('/admin/cuisine', 'CuisineController@index');
    Route::get('/admin/cuisine/create','CuisineController@create');
    Route::post('/admin/cuisine/store','CuisineController@store');
    Route::get('/admin/cuisine/edit/{id}','CuisineController@edit');
    Route::patch('/admin/cuisine/update/{id}','CuisineController@update');    
    Route::get('/admin/cuisine/delete/{id}','CuisineController@delete');

    //Specific Service section
    Route::get('/admin/specificservice', 'SpecificServiceController@index');
    Route::get('/admin/specificservice/create','SpecificServiceController@create');
    Route::post('/admin/specificservice/store','SpecificServiceController@store');
    Route::get('/admin/specificservice/edit/{id}','SpecificServiceController@edit');
    Route::patch('/admin/specificservice/update/{id}','SpecificServiceController@update');    
    Route::get('/admin/specificservice/delete/{id}','SpecificServiceController@delete');

    //Banner section
    Route::get('/admin/banner', 'BannerController@index');
    Route::get('/admin/banner/create','BannerController@create');
    Route::post('/admin/banner/store','BannerController@store');
    Route::get('/admin/banner/edit/{id}','BannerController@edit');
    Route::patch('/admin/banner/update/{id}','BannerController@update');    
    Route::get('/admin/banner/delete/{id}','BannerController@delete');

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
    Route::get('/admin/degree/delete/{id}','DegreeController@delete');

    //Medical Facility section
    Route::get('/admin/medicalfacility', 'MedicalFacilityController@index');
    Route::get('/admin/medicalfacility/create','MedicalFacilityController@create');
    Route::post('/admin/medicalfacility/store','MedicalFacilityController@store');
    Route::get('/admin/medicalfacility/edit/{id}','MedicalFacilityController@edit');
    Route::patch('/admin/medicalfacility/update/{id}','MedicalFacilityController@update');    
    Route::get('/admin/medicalfacility/delete/{id}','MedicalFacilityController@delete');



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
    Route::get('/admin/providertype/delete/{id}','ProviderTypeController@delete');

    //Payment type section
    Route::get('/admin/paymenttype', 'PaymentTypeController@index');
    Route::get('/admin/paymenttype/create','PaymentTypeController@create');
    Route::post('/admin/paymenttype/store','PaymentTypeController@store');
    Route::get('/admin/paymenttype/edit/{id}','PaymentTypeController@edit');
    Route::patch('/admin/paymenttype/update/{id}','PaymentTypeController@update');    
    Route::get('/admin/paymenttype/delete/{id}','PaymentTypeController@delete');

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
    Route::get('/admin/connectivity/delete/{id}','ConnectivityController@delete');

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
    Route::get('/admin/connectivityservices/delete/{id}','ConnectivityServicesController@delete');

    //hospitals section
    Route::get('/admin/hospitals', 'HospitalController@index');
    Route::get('/admin/hospitals/create','HospitalController@create');
    Route::post('/admin/hospitals/store','HospitalController@store');
    Route::get('/admin/hospitals/edit/{id}','HospitalController@edit');
    Route::patch('/admin/hospitals/update/{id}','HospitalController@update');
    Route::delete('/admin/hospitals/delete/{id}','HospitalController@destroy');
    Route::get('/admin/hospitals/show/{id}','HospitalController@show');
    Route::get('/admin/hospitals/treatment/{id}','HospitalController@treatment');
    Route::post('/admin/hospitals/store_treatment/', 'HospitalController@store_treatment');
    Route::get('/admin/hospitals/medicaltest/{id}','HospitalController@medicaltest');
    Route::post('/admin/hospitals/store_medicaltest/','HospitalController@store_medicaltest');
    Route::post('/admin/ajaxstoremedicaltest/','HospitalController@ajaxstoremedicaltest');
    Route::post('/admin/hospitals/gettestarr/','HospitalController@gettestarr');
    Route::post('/admin/ajaxstoretreatment/','HospitalController@ajaxstoretreatment');
    Route::post('/admin/hospitals/gettreatarr/','HospitalController@gettreatarr');


    //package type section
    Route::get('/admin/package-types/', 'PackageTypeController@index');
    Route::get('/admin/package-types/create', 'PackageTypeController@create');
    Route::post('/admin/package-types/store', 'PackageTypeController@store');
    Route::get('/admin/package-types/edit/{id}', 'PackageTypeController@edit');
    Route::post('/admin/package-types/update/{id}','PackageTypeController@update');
    Route::get('/admin/package-types/delete/{id}','PackageTypeController@delete');



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
	Route::get('/admin/genericmedicine/delete/{id}','genericmedicineController@delete');

     /* medical test categories section */
    Route::get('/admin/medicaltestcategories','MedicalTestCategoriesController@index');
    Route::get('/admin/medicaltestcategories/create','MedicalTestCategoriesController@create');
    Route::post('/admin/medicaltestcategories/store','MedicalTestCategoriesController@store');
    Route::get('/admin/medicaltestcategories/edit/{id}','MedicalTestCategoriesController@edit');
    Route::patch('/admin/medicaltestcategories/update/{id}','MedicalTestCategoriesController@update');
    Route::delete('/admin/medicaltestcategories/delete/{id}','MedicalTestCategoriesController@destroy');
	Route::get('/admin/medicaltestcategories/delete/{id}','MedicalTestCategoriesController@delete');

     /* medical test section */
    Route::get('/admin/medicaltest','MedicaltestController@index');
    Route::get('/admin/medicaltest/create','MedicaltestController@create');
    Route::post('/admin/medicaltest/store','MedicaltestController@store');
    Route::get('/admin/medicaltest/edit/{id}','MedicaltestController@edit');
    Route::patch('/admin/medicaltest/update/{id}','MedicaltestController@update');    
	Route::get('/admin/medicaltest/delete/{id}','MedicaltestController@delete');

     /* contact section */
    Route::get('/admin/contact','ContactUSController@index');
    Route::get('/admin/contact/details/{id}','ContactUSController@details');

    //faq category section
    Route::get('/admin/faqcategories','FaqCategoryController@index');
    Route::get('/admin/faqcategories/create','FaqCategoryController@create');
    Route::post('/admin/faqcategories/store','FaqCategoryController@store');
    Route::get('/admin/faqcategories/edit/{id}','FaqCategoryController@edit');
    Route::patch('/admin/faqcategories/update/{id}','FaqCategoryController@update');
    Route::delete('/admin/faqcategories/delete/{id}','FaqCategoryController@destroy');
    Route::get('/admin/faqcategories/show/{id}','FaqCategoryController@show');

    //faqs  section
    Route::get('/admin/faq','FaqController@index');
    Route::get('/admin/faq/create','FaqController@create');
    Route::post('/admin/faq/store','FaqController@store');
    Route::get('/admin/faq/edit/{id}','FaqController@edit');
    Route::patch('/admin/faq/update/{id}','FaqController@update');    
    Route::get('/admin/faq/show/{id}','FaqController@show');
    Route::get('/admin/faq/delete/{id}','FaqController@delete');

    // home page content
    Route::get('/admin/homepagecontent','HomePageContentController@index');
    Route::patch('/admin/homepagecontent/store','HomePageContentController@store');
    Route::get('/admin/cmspagedetail','CmspageDetailsController@index');
    Route::get('/admin/cmspagedetail/create','CmspageDetailsController@create');
    Route::post('/admin/cmspagedetail/store','CmspageDetailsController@store');
    Route::get('/admin/cmspagedetail/edit/{id}','CmspageDetailsController@edit');
    Route::patch('/admin/cmspagedetail/update/{id}','CmspageDetailsController@update');    
    Route::get('/admin/cmspagedetail/delete/{id}','CmspageDetailsController@delete');

    //Immigration section
    Route::get('/admin/immigration', 'ImmigrationController@index');
    Route::get('/admin/immigration/create','ImmigrationController@create');
    Route::post('/admin/immigration/store','ImmigrationController@store');
    Route::get('/admin/immigration/edit/{id}','ImmigrationController@edit');
    Route::patch('/admin/immigration/update/{id}','ImmigrationController@update');
    Route::delete('/admin/immigration/delete/{id}','ImmigrationController@destroy');

     //Visa section
    Route::get('/admin/countryvisa', 'CountryVisaController@index');
    Route::get('/admin/countryvisa/create','CountryVisaController@create');
    Route::post('/admin/countryvisa/store','CountryVisaController@store');
    Route::get('/admin/countryvisa/edit/{id}','CountryVisaController@edit');
    Route::patch('/admin/countryvisa/update/{id}','CountryVisaController@update');
    Route::delete('/admin/countryvisa/delete/{id}','CountryVisaController@destroy');

});
