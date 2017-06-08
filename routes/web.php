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
Route::post('/enquiry-us', ['as'=>'enquiry.store','uses'=>'EnquiryController@enquiryPost']);
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
Route::get('/sitemap','PagesController@sitemap');
Route::get('/successstory_details/{id}','PagesController@successstory_details');
Route::get('/searchdetails/{id}','PagesController@searchdetails');
Route::get('/frontend/check_user_exist','PagesController@check_user_exist');
Route::get('/frontend/check_mobile_exist','PagesController@check_mobile_exist');
Route::post('/patient-registration','PagesController@patient_registration');
Route::post('/patient-login','PagesController@patient_login');
Route::post('/patient-forgotpass','PagesController@patient_forgotpass');
Route::get('/search-place','SearchController@search_place');
Route::get('search-data','SearchController@search_data');
Route::post('/hospitalsearch-res','SearchController@hospitalsearch_res');
Route::post('/hospitalsearch-resmap','SearchController@hospitalsearch_resmap');
Route::post('/profile_image_upload','PagesController@profile_image_upload');
Route::get('/changepassword/{url}','PagesController@changepassword');
Route::post('/reset-password/{security_code}','PagesController@reset_password');
Route::get('/successreset','PagesController@successreset');
Route::post('/documentupload','PagesController@documentupload');
Route::get('/document-delete/{id}','PagesController@document_delete');
Route::get('/document-download/{id}','PagesController@document_download');
Route::get('/getattdocumenttags','PagesController@getattdocumenttags');

Route::get('/api/get-state-list','CountryStateCityController@getStateList');
Route::get('/api/get-city-list','CountryStateCityController@getCityList');

Route::group(['middleware' => ['front']], function() {
    Route::get('/profile','PagesController@patient_profile');
    Route::post('/update-profile','PagesController@update_profile');
    Route::get('/patient-logout','PagesController@patient_logout');
    Route::post('/get_state_list','PagesController@get_state_list');
    Route::post('/get_city_list','PagesController@get_city_list');
    Route::get('/change-password','PagesController@change_password');
    Route::post('update-password','PagesController@update_password');
    Route::get('/upload-documents','PagesController@upload_documents');
    Route::get('/my-enquiry','PagesController@my_enquiry');
    
});
//Route::get('/successstory','HelperController@successstory');


//Backend routing start here
Route::get('/admin', 'LoginController@index');
Route::post('/admin/login', 'LoginController@checkLogin');
//Route::get('/admin/dashboard', 'DashboardController@index')->middleware('web');
Route::group(['middleware' => ['admin']], function () {

    Route::get('/admin/logout', array('uses' => 'LoginController@logout'));
    Route::get('/admin/dashboard', 'DashboardController@index');
    Route::get('/admin/profile','AdminUserController@profile');
    Route::post('/admin/update-profile','AdminUserController@update_profile');
    //Write all other routing related admin after these two roouting
    //Language capability section
    Route::get('/admin/languagecapability', 'LanguageCapabilityController@index');
    Route::get('/admin/languagecapability/create','LanguageCapabilityController@create');
    Route::post('/admin/languagecapability/store','LanguageCapabilityController@store');
    Route::get('/admin/languagecapability/edit/{id}','LanguageCapabilityController@edit');
    Route::patch('/admin/languagecapability/update/{id}','LanguageCapabilityController@update');   
    Route::get('/admin/languagecapability/delete/{id}','LanguageCapabilityController@delete');
    Route::post('/admin/languagecapability/changestatus/','LanguageCapabilityController@ajaxlangchangestatus');

    //Procedure section
    Route::get('/admin/procedure', 'ProcedureController@index');
    Route::get('/admin/procedure/create','ProcedureController@create');
    Route::post('/admin/procedure/store','ProcedureController@store');
    Route::get('/admin/procedure/edit/{id}','ProcedureController@edit');
    Route::patch('/admin/procedure/update/{id}','ProcedureController@update');    
    Route::get('/admin/procedure/delete/{id}','ProcedureController@delete');
    Route::post('/admin/procedure/changestatus/','ProcedureController@ajaxprocchangestatus');

    //Treatment section
    Route::get('/admin/treatment', 'TreatmentController@index');
    Route::get('/admin/treatment/create','TreatmentController@create');
    Route::post('/admin/treatment/store','TreatmentController@store');
    Route::get('/admin/treatment/edit/{id}','TreatmentController@edit');
    Route::patch('/admin/treatment/update/{id}','TreatmentController@update');   
    Route::get('/admin/treatment/delete/{id}','TreatmentController@delete');
    Route::post('/admin/treatment/changestatus/','TreatmentController@ajaxtreatchangestatus');

    //genericmedicine section
    Route::get('/admin/genericmedicine','GenericmedicineController@index');
    Route::get('/admin/genericmedicine/create','GenericmedicineController@create');
    Route::post('/admin/genericmedicine/store','GenericmedicineController@store');
    Route::get('/admin/genericmedicine/edit/{id}','GenericmedicineController@edit');
    Route::patch('/admin/genericmedicine/update/{id}','GenericmedicineController@update');    
    Route::get('/admin/genericmedicine/delete/{id}','GenericmedicineController@delete');
    Route::post('/admin/genericmedicine/changestatus/','GenericmedicineController@ajaxgenechangestatus');

    //medical test categories section
    Route::get('/admin/medicaltestcategories','MedicalTestCategoriesController@index');
    Route::get('/admin/medicaltestcategories/create','MedicalTestCategoriesController@create');
    Route::post('/admin/medicaltestcategories/store','MedicalTestCategoriesController@store');
    Route::get('/admin/medicaltestcategories/edit/{id}','MedicalTestCategoriesController@edit');
    Route::patch('/admin/medicaltestcategories/update/{id}','MedicalTestCategoriesController@update');
    Route::delete('/admin/medicaltestcategories/delete/{id}','MedicalTestCategoriesController@destroy');
    Route::get('/admin/medicaltestcategories/delete/{id}','MedicalTestCategoriesController@delete');
    Route::post('/admin/medicaltestcategories/changestatus/','MedicalTestCategoriesController@ajaxmcatchangestatus');

    //medical test section 
    Route::get('/admin/medicaltest','MedicaltestController@index');
    Route::get('/admin/medicaltest/create','MedicaltestController@create');
    Route::post('/admin/medicaltest/store','MedicaltestController@store');
    Route::get('/admin/medicaltest/edit/{id}','MedicaltestController@edit');
    Route::patch('/admin/medicaltest/update/{id}','MedicaltestController@update');    
    Route::get('/admin/medicaltest/delete/{id}','MedicaltestController@delete');
    Route::post('/admin/medicaltest/changestatus/','MedicaltestController@ajaxmedichangestatus');

    //Degree section
    Route::get('/admin/degree', 'DegreeController@index');
    Route::get('/admin/degree/create','DegreeController@create');
    Route::post('/admin/degree/store','DegreeController@store');
    Route::get('/admin/degree/edit/{id}','DegreeController@edit');
    Route::patch('/admin/degree/update/{id}','DegreeController@update');  
    Route::get('/admin/degree/delete/{id}','DegreeController@delete');
    Route::post('/admin/degree/changestatus/','DegreeController@ajaxdegreechangestatus');

    //Medical Provider type section
    Route::get('/admin/providertype', 'ProviderTypeController@index');
    Route::get('/admin/providertype/create','ProviderTypeController@create');
    Route::post('/admin/providertype/store','ProviderTypeController@store');
    Route::get('/admin/providertype/edit/{id}','ProviderTypeController@edit');
    Route::patch('/admin/providertype/update/{id}','ProviderTypeController@update');    
    Route::get('/admin/providertype/delete/{id}','ProviderTypeController@delete');
    Route::post('/admin/providertype/changestatus/','ProviderTypeController@ajaxprotypechangestatus');

    //Accomodation section
    Route::get('/admin/accomodation', 'AccomodationController@index');
    Route::get('/admin/accomodation/create','AccomodationController@create');
    Route::post('/admin/accomodation/store','AccomodationController@store');
    Route::get('/admin/accomodation/edit/{id}','AccomodationController@edit');
    Route::patch('/admin/accomodation/update/{id}','AccomodationController@update');    
    Route::get('/admin/accomodation/delete/{id}','AccomodationController@delete');
    Route::post('/admin/accomodation/changestatus/','AccomodationController@ajaxaccomchangestatus');

    //Cuisine section
    Route::get('/admin/cuisine', 'CuisineController@index');
    Route::get('/admin/cuisine/create','CuisineController@create');
    Route::post('/admin/cuisine/store','CuisineController@store');
    Route::get('/admin/cuisine/edit/{id}','CuisineController@edit');
    Route::patch('/admin/cuisine/update/{id}','CuisineController@update');    
    Route::get('/admin/cuisine/delete/{id}','CuisineController@delete');
    Route::post('/admin/cuisine/changestatus/','CuisineController@ajaxcuisinechangestatus');

    //Payment type section
    Route::get('/admin/paymenttype', 'PaymentTypeController@index');
    Route::get('/admin/paymenttype/create','PaymentTypeController@create');
    Route::post('/admin/paymenttype/store','PaymentTypeController@store');
    Route::get('/admin/paymenttype/edit/{id}','PaymentTypeController@edit');
    Route::patch('/admin/paymenttype/update/{id}','PaymentTypeController@update');    
    Route::get('/admin/paymenttype/delete/{id}','PaymentTypeController@delete');
    Route::post('/admin/paymenttype/changestatus/','PaymentTypeController@ajaxpaymenttypechangestatus');

    //connectivity master section
    Route::get('/admin/connectivity', 'ConnectivityController@index');
    Route::get('/admin/connectivity/create','ConnectivityController@create');
    Route::post('/admin/connectivity/store','ConnectivityController@store');
    Route::get('/admin/connectivity/edit/{id}','ConnectivityController@edit');
    Route::patch('/admin/connectivity/update/{id}','ConnectivityController@update');   
    Route::get('/admin/connectivity/delete/{id}','ConnectivityController@delete');
    Route::post('/admin/connectivity/changestatus/','ConnectivityController@ajaxconchangestatus');

    //connectivityservices master section
    Route::get('/admin/connectivityservices', 'ConnectivityServicesController@index');
    Route::get('/admin/connectivityservices/create','ConnectivityServicesController@create');
    Route::post('/admin/connectivityservices/store','ConnectivityServicesController@store');
    Route::get('/admin/connectivityservices/edit/{id}','ConnectivityServicesController@edit');
    Route::patch('/admin/connectivityservices/update/{id}','ConnectivityServicesController@update');    
    Route::get('/admin/connectivityservices/delete/{id}','ConnectivityServicesController@delete');
    Route::post('/admin/connectivityservices/changestatus/','ConnectivityServicesController@ajaxconserchangestatus');

    //Accrediation section
    Route::get('/admin/accrediation', 'AccrediationController@index');
    Route::get('/admin/accrediation/create','AccrediationController@create');
    Route::post('/admin/accrediation/store','AccrediationController@store');
    Route::get('/admin/accrediation/edit/{id}','AccrediationController@edit');
    Route::patch('/admin/accrediation/update/{id}','AccrediationController@update');
    Route::delete('/admin/accrediation/delete/{id}','AccrediationController@destroy');
    Route::get('/admin/accrediation/delete/{id}','AccrediationController@delete');
    Route::post('/admin/accrediation/changestatus/','AccrediationController@ajaxaccerchangestatus');

    //Specific Service section
    Route::get('/admin/specificservice', 'SpecificServiceController@index');
    Route::get('/admin/specificservice/create','SpecificServiceController@create');
    Route::post('/admin/specificservice/store','SpecificServiceController@store');
    Route::get('/admin/specificservice/edit/{id}','SpecificServiceController@edit');
    Route::patch('/admin/specificservice/update/{id}','SpecificServiceController@update');    
    Route::get('/admin/specificservice/delete/{id}','SpecificServiceController@delete');
    Route::post('/admin/specificservice/changestatus/','SpecificServiceController@ajaxspeserchangestatus');

    //Medical Facility section
    Route::get('/admin/medicalfacility', 'MedicalFacilityController@index');
    Route::get('/admin/medicalfacility/create','MedicalFacilityController@create');
    Route::post('/admin/medicalfacility/store','MedicalFacilityController@store');
    Route::get('/admin/medicalfacility/edit/{id}','MedicalFacilityController@edit');
    Route::patch('/admin/medicalfacility/update/{id}','MedicalFacilityController@update');    
    Route::get('/admin/medicalfacility/delete/{id}','MedicalFacilityController@delete');
    Route::post('/admin/medicalfacility/changestatus/','MedicalFacilityController@ajaxmedfacichangestatus');

    //Banner section
    Route::get('/admin/banner', 'BannerController@index');
    Route::get('/admin/banner/create','BannerController@create');
    Route::post('/admin/banner/store','BannerController@store');
    Route::get('/admin/banner/edit/{id}','BannerController@edit');
    Route::patch('/admin/banner/update/{id}','BannerController@update');    
    Route::get('/admin/banner/delete/{id}','BannerController@delete');
    Route::post('/admin/banner/changestatus/','BannerController@ajaxbannerchangestatus');

    //Role section
    Route::get('/admin/role', 'RoleController@index');
    Route::get('/admin/role/create', ['as' => 'create-role', 'uses' => 'RoleController@create']);
    Route::post('/admin/role/add', 'RoleController@add');
    Route::get('/admin/role/edit/{id}', 'RoleController@edit');
    Route::post('admin/role/update/{id}', 'RoleController@update');
    Route::get('/admin/role/delete/{id}','RoleController@delete');
    Route::post('/admin/role/changestatus/','RoleController@ajaxrolechangestatus');

    //Hotel section
    Route::get('/admin/hotel', 'HotelController@index');
    Route::get('/admin/hotel/create','HotelController@create');
    Route::post('/admin/hotel/store','HotelController@store');
    Route::get('/admin/hotel/edit/{id}','HotelController@edit');
    Route::patch('/admin/hotel/update/{id}','HotelController@update');    
    Route::get('/admin/hotel/delete/{id}','HotelController@delete');
    Route::get('/admin/hotel/show/{id}','HotelController@show');
    Route::post('/admin/hotel/changestatus/','HotelController@ajaxhotelchangestatus');

    //news section
    Route::get('/admin/news','NewsController@index');
    Route::get('/admin/news/create','NewsController@create');
    Route::post('/admin/news/store','NewsController@store');
    Route::get('/admin/news/edit/{id}','NewsController@edit');
    Route::patch('/admin/news/update/{id}','NewsController@update');    
    Route::get('/admin/news/delete/{id}','NewsController@delete');
    Route::post('/admin/news/changestatus/','NewsController@ajaxnewschangestatus');

    //Admin user section
    Route::get('/admin/adminuser','AdminUserController@index');
    Route::get('/admin/adminuser/create', 'AdminUserController@create');
    Route::post('/admin/adminuser/add', 'AdminUserController@add');
    Route::get('/admin/adminuser/edit/{id}','AdminUserController@edit');
    Route::post('/admin/adminuser/update/{id}', 'AdminUserController@update');
    Route::get('/admin/adminuser/delete/{id}','AdminUserController@delete');
    Route::post('/admin/adminuser/changestatus/','AdminUserController@ajaxadminuserchangestatus');

    //Admin permission section
    Route::get('/admin/permission/','AdminUserController@permission');
    Route::post('/admin/permission/store_permission/', 'AdminUserController@store_permission');
    Route::get('/admin/permission/get_permission/','AdminUserController@get_permission');

    //Patient section
    Route::get('/admin/patients','PatientController@index');
    Route::get('/admin/patients/create','PatientController@create');
    Route::post('/admin/patients/store','PatientController@store');
    Route::get('/admin/patients/edit/{id}','PatientController@edit');
    Route::patch('/admin/patients/update/{id}','PatientController@update');
    Route::get('/admin/patients/delete/{id}','PatientController@delete');
    Route::get('/admin/patients/show/{id}','PatientController@show');
    Route::post('/admin/patients/changestatus/','PatientController@ajaxpatientchangestatus');

    //Message section
    Route::get('/admin/messages/{id}','MessagesController@index');
    Route::get('/admin/messages/create/{id}','MessagesController@create');
    Route::post('/admin/messages/store/{id}','MessagesController@store');
    //Route::get('/admin/messages/edit/{id}','PatientController@edit');
    Route::get('/admin/messages/show/{id}','MessagesController@show');
    Route::put('/admin/messages/update/{id}','MessagesController@update');
    //Route::get('/admin/messages/delete/{id}','PatientController@delete');
   
    //Route::post('/admin/messages/changestatus/','PatientController@ajaxpatientchangestatus');

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
    Route::post('/admin/doctors/changestatus/','DoctorController@ajaxdoctorchangestatus');

    //provider connectivitysettings master section
    Route::get('/admin/providerconnectivity', 'ProviderConnectivityController@index');
    Route::get('/admin/providerconnectivity/create','ProviderConnectivityController@create');
    Route::post('/admin/providerconnectivity/store','ProviderConnectivityController@store');
    Route::get('/admin/providerconnectivity/edit/{id}','ProviderConnectivityController@edit');
    Route::patch('/admin/providerconnectivity/update/{id}','ProviderConnectivityController@update');
    Route::get('/admin/providerconnectivity/delete/{id}','ProviderConnectivityController@delete');
    Route::post('/admin/providerconnectivity/changestatus/','ProviderConnectivityController@ajaxproviconchangestatus');

    //Provider connectivity services section
    Route::get('/admin/providerconnectivityservices','ProviderConnectivityServicesController@index');
    Route::get('/admin/providerconnectivityservices/create','ProviderConnectivityServicesController@create');
    Route::post('/admin/providerconnectivityservices/store','ProviderConnectivityServicesController@store');
    Route::get('/admin/providerconnectivityservices/edit/{id}','ProviderConnectivityServicesController@edit');
    Route::patch('/admin/providerconnectivityservices/update/{id}','ProviderConnectivityServicesController@update');
    Route::get('/admin/providerconnectivityservices/delete/{id}','ProviderConnectivityServicesController@delete');
    Route::get('/admin/providerconnectivityservices/show/{id}','ProviderConnectivityServicesController@show');
    Route::post('/admin/providerconnectivityservices/changestatus/','ProviderConnectivityServicesController@ajaxproviconservchangestatus');

    //hospitals section
    Route::get('/admin/hospitals', 'HospitalController@index');
    Route::get('/admin/hospitals/create','HospitalController@create');
    Route::post('/admin/hospitals/store','HospitalController@store');
    Route::get('/admin/hospitals/edit/{id}','HospitalController@edit');
    Route::patch('/admin/hospitals/update/{id}','HospitalController@update');   
    Route::get('/admin/hospitals/delete/{id}','HospitalController@delete');
    Route::get('/admin/hospitals/show/{id}','HospitalController@show');
    Route::get('/admin/hospitals/treatment/{id}','HospitalController@treatment');
    Route::post('/admin/hospitals/store_treatment/', 'HospitalController@store_treatment');
    Route::get('/admin/hospitals/medicaltest/{id}','HospitalController@medicaltest');
    Route::post('/admin/hospitals/store_medicaltest/','HospitalController@store_medicaltest');
    Route::post('/admin/hospitals/ajaxstoremedicaltest/','HospitalController@ajaxstoremedicaltest');
    Route::post('/admin/hospitals/gettestarr/','HospitalController@gettestarr');
    Route::post('/admin/hospitals/ajaxstoretreatment/','HospitalController@ajaxstoretreatment');
    Route::post('/admin/hospitals/gettreatarr/','HospitalController@gettreatarr');
    Route::post('/admin/hospitals/changestatus/','HospitalController@ajaxhoschangestatus');
    Route::post('/admin/hospitals/getLnt/','HospitalController@getLnt');

    //package type section
    Route::get('/admin/package-types/', 'PackageTypeController@index');
    Route::get('/admin/package-types/create', 'PackageTypeController@create');
    Route::post('/admin/package-types/store', 'PackageTypeController@store');
    Route::get('/admin/package-types/edit/{id}', 'PackageTypeController@edit');
    Route::post('/admin/package-types/update/{id}','PackageTypeController@update');
    Route::get('/admin/package-types/delete/{id}','PackageTypeController@delete');
    Route::post('/admin/treatment/changestatus/','PackageTypeController@ajaxpacktypechangestatus');

    //success story section
    Route::get('/admin/successstories','SuccessStoryController@index');
    Route::get('/admin/successstories/create','SuccessStoryController@create');
    Route::post('/admin/successstories/store','SuccessStoryController@store');
    Route::get('/admin/successstories/edit/{id}','SuccessStoryController@edit');
    Route::patch('/admin/successstories/update/{id}','SuccessStoryController@update');    
    Route::get('/admin/successstories/delete/{id}','SuccessStoryController@delete');
    Route::get('/admin/successstories/show/{id}','SuccessStoryController@show');
    Route::post('/admin/successstories/changestatus/','SuccessStoryController@ajaxsuccchangestatus');
    
    //Enquiry section
    Route::get('/admin/enquiry','EnquiryController@index');
    Route::get('/admin/enquiry/details/{id}','EnquiryController@details');
    Route::get('/admin/enquiry/sendmail/{id}','EnquiryController@sendmail');
    Route::patch('/admin/enquiry/send/{id}','EnquiryController@send');

    //contact section
    Route::get('/admin/contact','ContactUSController@index');
    Route::get('/admin/contact/details/{id}','ContactUSController@details');
    Route::get('/admin/contact/sendmail/{id}','ContactUSController@sendmail');
    Route::patch('/admin/contact/send/{id}','ContactUSController@send');

    //faq category section
    Route::get('/admin/faqcategories','FaqCategoryController@index');
    Route::get('/admin/faqcategories/create','FaqCategoryController@create');
    Route::post('/admin/faqcategories/store','FaqCategoryController@store');
    Route::get('/admin/faqcategories/edit/{id}','FaqCategoryController@edit');
    Route::patch('/admin/faqcategories/update/{id}','FaqCategoryController@update');    
    Route::get('/admin/faqcategories/show/{id}','FaqCategoryController@show');
    Route::get('/admin/faqcategories/delete/{id}','FaqCategoryController@delete');
    Route::post('/admin/faqcategories/changestatus/','FaqCategoryController@ajaxfaqcatchangestatus');

    //faqs  section
    Route::get('/admin/faq','FaqController@index');
    Route::get('/admin/faq/create','FaqController@create');
    Route::post('/admin/faq/store','FaqController@store');
    Route::get('/admin/faq/edit/{id}','FaqController@edit');
    Route::patch('/admin/faq/update/{id}','FaqController@update');    
    Route::get('/admin/faq/show/{id}','FaqController@show');
    Route::get('/admin/faq/delete/{id}','FaqController@delete');
    Route::post('/admin/faq/changestatus/','FaqController@ajaxfaqchangestatus');

    //Immigration section
    Route::get('/admin/immigration', 'ImmigrationController@index');
    Route::get('/admin/immigration/create','ImmigrationController@create');
    Route::post('/admin/immigration/store','ImmigrationController@store');
    Route::get('/admin/immigration/edit/{id}','ImmigrationController@edit');
    Route::patch('/admin/immigration/update/{id}','ImmigrationController@update');
    Route::get('/admin/immigration/delete/{id}','ImmigrationController@delete');
    Route::post('/admin/immigration/changestatus/','ImmigrationController@ajaximmchangestatus');

    //Visa section
    Route::get('/admin/countryvisa', 'CountryVisaController@index');
    Route::get('/admin/countryvisa/create','CountryVisaController@create');
    Route::post('/admin/countryvisa/store','CountryVisaController@store');
    Route::get('/admin/countryvisa/edit/{id}','CountryVisaController@edit');
    Route::patch('/admin/countryvisa/update/{id}','CountryVisaController@update');
    Route::get('/admin/countryvisa/delete/{id}','CountryVisaController@delete');
    Route::post('/admin/countryvisa/changestatus/','CountryVisaController@ajaxcouvisachangestatus');

    //Country State city
    /*Route::get('/admin/api/dependent-dropdown','APIController@index');
    Route::get('/admin/api/get-state-list','APIController@getStateList');
    Route::get('/admin/api/get-city-list','APIController@getCityList');*/

    Route::get('/admin/api/dependent-dropdown','CountryStateCityController@index');
    Route::get('/admin/api/get-state-list','CountryStateCityController@getStateList');
    Route::get('/admin/api/get-city-list','CountryStateCityController@getCityList');
   

    // home page content
    Route::get('/admin/homepagecontent','HomePageContentController@index');
    Route::patch('/admin/homepagecontent/store','HomePageContentController@store');
    Route::get('/admin/cmspagedetail','CmspageDetailsController@index');
    Route::get('/admin/cmspagedetail/create','CmspageDetailsController@create');
    Route::post('/admin/cmspagedetail/store','CmspageDetailsController@store');
    Route::get('/admin/cmspagedetail/edit/{id}','CmspageDetailsController@edit');
    Route::patch('/admin/cmspagedetail/update/{id}','CmspageDetailsController@update');    
    Route::get('/admin/cmspagedetail/delete/{id}','CmspageDetailsController@delete');

   //document tag categories section
    Route::get('/admin/documenttag','DocumentTagController@index');
    Route::get('/admin/documenttag/create','DocumentTagController@create');
    Route::post('/admin/documenttag/store','DocumentTagController@store');
    Route::get('/admin/documenttag/edit/{id}','DocumentTagController@edit');
    Route::patch('/admin/documenttag/update/{id}','DocumentTagController@update');    
    Route::get('/admin/documenttag/delete/{id}','DocumentTagController@delete');
    Route::post('/admin/documenttag/changestatus/','DocumentTagController@ajaxtagchangestatus');

    
});
