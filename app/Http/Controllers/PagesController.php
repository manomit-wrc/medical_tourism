<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Image;
use App\Http\Controllers\Controller;
use App\MedicalFacility;
use App\News;
use App\Doctor;
use App\FaqCategory;
use App\Faq;
use App\Procedure;
use App\Treatment;
use App\Country;
use App\State;
use App\City;

use Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegistrationEmail;
use App\Mail\ForgotPasswordMail;
use App\SuccessStories;
use App\Immigration;
use App\CountryVisa;
use App\Cmspage;
use App\CmsPageDetail;
use App\Hospital;
use App\Album;
use App\Images;

class PagesController extends Controller
{
  public function __construct()
  {

  }

	public function about()
	{
    $cmspage_data = Cmspage::select(['id'])->where('pagename', '=', 'aboutus')->get();
    //echo "<pre>"; echo $cmspage_data[0]->id; die;
    $cmspagedtls_data = CmsPageDetail::where('cmspage_id', '=',$cmspage_data[0]->id)->get();
    //echo "<pre>"; print_r($cmspagedtls_data); die;
    $aboutpage_data=array();
    foreach($cmspagedtls_data as $key=>$value)
    {
      $aboutpage_data[$value->slag]=$value->description;
    }  
    //echo "<pre>"; print_r($aboutpage_data); die;
		return view('pages.about',compact('aboutpage_data'));
	}

	public function services()
	{
      $service_lists = MedicalFacility::all();
      //echo "<pre>"; print_r($service_lists); die;
      return view('pages.services')->with('service_lists',$service_lists);
	}

	public function servicedetails($id)
	{
		$service_data = MedicalFacility::findOrFail($id);
		//echo "<pre>"; print_r($service_data); die;
      	return view('pages.servicedetails')->with('service_data', $service_data);
	}

	public function enquiry()
	{
   
    $treat_list= Treatment::where('status', 1)->orderBy('name')->pluck('name', 'id');
    //echo "<pre>"; print_r($treat_list); die;
    $proc_list = Procedure::where('status', 1)->orderBy('name')->pluck('name', 'id');
    //echo "<pre>"; print_r($proc_list); die;
    $countries = Country::orderBy('name')->pluck('name', 'id')->all();
    return view('pages.enquiry',compact('treat_list','proc_list','countries'));
	}

	public function facilities()
	{
		return view('pages.facilities');
	}

	public function doctors()
	{
		$doctor_data = Doctor::all();
		//echo "<pre>"; print_r($doctor_data); die;
    	return view('pages.doctors')->with('doctor_data',$doctor_data);
		//return view('pages.doctors');
	}

	public function doctordetail($id)
	{
		$data['doctor_details'] = Doctor::findOrFail($id);
		$data['doctor_procedure_details'] = Doctor::with('procedures')->where('id',$id)->get()->toArray();
    	$data['doctor_degree_details'] = Doctor::with('degrees')->where('id',$id)->get()->toArray();
		//echo "<pre>"; print_r($data); die;
    	return view('pages.doctordetail',$data);
	}

	public function contact()
	{
    $cmspage_data = Cmspage::select(['id'])->where('pagename', '=', 'contactus')->get();
    //echo "<pre>"; echo $cmspage_data[0]->id; die;
    $cmspagedtls_data = CmsPageDetail::where('cmspage_id', '=',$cmspage_data[0]->id)->get();
    //echo "<pre>"; print_r($cmspagedtls_data); die;
    $contactpage_data=array();
    foreach($cmspagedtls_data as $key=>$value)
    {
      $contactpage_data[$value->slag]=$value->description;
    }  
    //echo "<pre>"; print_r($contactpage_data); die;
    /* $response = \GoogleMaps::load('geocoding')
          ->setParam (['address' =>'santa cruz'])
          ->get(); 
      echo "<pre>"; print_r($response); die;*/
    return view('pages.contact',compact('contactpage_data'));
	}

  public function suggestion()
  {
    $cmspage_data = Cmspage::select(['id'])->where('pagename', '=', 'contactus')->get();
    //echo "<pre>"; echo $cmspage_data[0]->id; die;
    $cmspagedtls_data = CmsPageDetail::where('cmspage_id', '=',$cmspage_data[0]->id)->get();
    //echo "<pre>"; print_r($cmspagedtls_data); die;
    $contactpage_data=array();
    foreach($cmspagedtls_data as $key=>$value)
    {
      $contactpage_data[$value->slag]=$value->description;
    }  
    //echo "<pre>"; print_r($contactpage_data); die;
    /* $response = \GoogleMaps::load('geocoding')
          ->setParam (['address' =>'santa cruz'])
          ->get(); 
      echo "<pre>"; print_r($response); die;*/
    return view('pages.suggestion',compact('contactpage_data'));
  }

  public function gallery()
  {
    $albums = Album::with('Photos')->get();
    //echo "<pre>"; print_r($albums); die;
    return view('pages.gallery',compact('albums'));
  }

  public function gallerysearch(Request $request)
  {   
       $gallery_id = $request->galid;
       $album = Album::with('Photos')->find($gallery_id);
       //echo "<pre>"; print_r($album); die;
       return view('pages.ajaxgallerydata',compact('album'));
  }

  public function news()
	{
      $news_lists = News::all();
        //echo "<pre>"; print_r($news_lists); die;
      return view('pages.news')->with('news_lists',$news_lists);
	}

	public function newsdetails($id)
	{
		  $news_data = News::findOrFail($id);
		  //echo "<pre>"; print_r($news_data); die;
      return view('pages.newsdetails')->with('news_data',$news_data);
	}

	public function faqs()
	{  
      $faq_data = Faq::has('FaqCategory')->where('status', '=', 1)->orderBy('faqcategory_id')->get();
      //echo "<pre>"; print_r($faq_data); die;
      return view('pages.faqs')->with('faq_data',$faq_data);
	}

	public function connectivity()
	{
      //$faqs_lists = Faq::all();
      //echo "<pre>"; print_r($faqs_lists); die;
      //return view('pages.faqs')->with('faqs_lists',$faqs_lists);
      return view('pages.connectivity');
	}

	public function immigration()
	{
      $immigration_lists = Immigration::all();
      //echo "<pre>"; print_r($immigration_lists); die;
      return view('pages.immigration')->with('immigration_lists',$immigration_lists);
	}

	public function visa()
	{
      $cntvisa_lists = CountryVisa::all();
     //echo "<pre>"; print_r($cntvisa_lists); die;
      return view('pages.visa')->with('cntvisa_lists',$cntvisa_lists);
	}

  public function successstory_details($id)
  {
      $succstory_data = SuccessStories::findOrFail($id);
     //echo "<pre>"; print_r($succstory_data); die;
      return view('pages.successstorydetails')->with('succstory_data',$succstory_data);
  }

  public function disclaimer()
  {
        $cmspage_data = Cmspage::select(['id'])->where('pagename', '=', 'disclaimer')->get();
        //echo "<pre>"; echo $cmspage_data[0]->id; die;
        $cmspagedtls_data = CmsPageDetail::where('cmspage_id', '=',$cmspage_data[0]->id)->get();
        //echo "<pre>"; print_r($cmspagedtls_data); die;
        $disclaimer_data=array();
        foreach($cmspagedtls_data as $key=>$value)
        {
          $disclaimer_data[$value->slag]=$value->description;
        }  
        //echo "<pre>"; print_r($disclaimer_data); die;
        
        return view('pages.disclaimer',compact('disclaimer_data'));
  }

  public function privacypolicy()
  {
       $cmspage_data = Cmspage::select(['id'])->where('pagename', '=', 'privacypolicy')->get();
        //echo "<pre>"; echo $cmspage_data[0]->id; die;
        $cmspagedtls_data = CmsPageDetail::where('cmspage_id', '=',$cmspage_data[0]->id)->get();
        //echo "<pre>"; print_r($cmspagedtls_data); die;
        $privacy_policy_data=array();
        foreach($cmspagedtls_data as $key=>$value)
        {
          $privacy_policy_data[$value->slag]=$value->description;
        }  
        //echo "<pre>"; print_r($privacy_policy_data); die;
        
        return view('pages.privacypolicy',compact('privacy_policy_data'));
  }
  public function sitemap()
  {
        $cmspage_data = Cmspage::select(['id'])->where('pagename', '=', 'sitemap')->get();
        //echo "<pre>"; echo $cmspage_data[0]->id; die;
        $cmspagedtls_data = CmsPageDetail::where('cmspage_id', '=',$cmspage_data[0]->id)->get();
        //echo "<pre>"; print_r($cmspagedtls_data); die;
        $sitemap_data=array();
        foreach($cmspagedtls_data as $key=>$value)
        {
          $sitemap_data[$value->slag]=$value->description;
        }  
        //echo "<pre>"; print_r($sitemap_data); die;
        
        return view('pages.sitemap',compact('sitemap_data'));
  }

  public function searchdetails($id)
  {
      $hospital_data = Hospital::findOrFail($id);
      //echo "<pre>"; print_r($hospital_data); die;
      /* if(isset($hospital_data) && count($hospital_data) > 0){
        $hospital_data = $hospital_data;
      }else{
          return redirect('/');
      }*/
      return view('pages.searchdetails',compact('hospital_data'));
  }
  public function check_user_exist(Request $request) {
    $email_id = $request->input('email_id');
    $patient = \App\Patient::where('email_id',$email_id)->first();
    if($patient) {
      return json_encode(false);
    }
    else {
      return json_encode(true);
    }
  }
  public function check_mobile_exist(Request $request) {
    $mobile_no = $request->input('mobile_no');
    $patient = \App\Patient::where('mobile_no',$mobile_no)->first();
    if($patient) {
      return json_encode(false);
    }
    else {
      return json_encode(true);
    }
  }

  public function patient_registration(Request $request) {
    if($request->ajax()) {
      $patient = new \App\Patient();
      $patient->first_name = $request->input('first_name');
      $patient->last_name = $request->input('last_name');
      $patient->email_id = $request->input('email_id');
      $patient->mobile_no = $request->input('mobile_no');
      $patient->password = bcrypt($request->input('password'));
      $patient->remember_token = str_replace("/","",Hash::make(str_random(30)));
      $patient->status = "0";

      if($patient->save()) {
        $activation_link = config('app.url').'activate/'.$patient->remember_token."/".time();
        Mail::to($request->input('email_id'))->send(new RegistrationEmail($activation_link));
        return response()->json(['status'=>'1','msg'=>'Registration successfully done. Email activation link is sent to your email']);
      }
      else {
        return response()->json(['status'=>'0','msg'=>'Registration interrupted. Please try again']);
      }
    }
  }

  public function patient_login(Request $request) {
    if($request->ajax()) {
      if(Auth::guard('front')->attempt(['email_id'=>$request->email_id, 'password'=>$request->password, 'status'=> '1'], $request->remember_me)) {
    		return response()->json(['status'=>'1']);
    	}else if(Auth::guard('front')->attempt(['mobile_no'=>$request->email_id, 'password'=>$request->password, 'status'=> '1'], $request->remember_me)) {
        return response()->json(['status'=>'1']);
      }
    	else {
    		return response()->json(['status'=>'0']);
    	}
    }
  }

  public function patient_profile(Request $request) {

    $country_list = \App\Country::pluck('name','id')->toArray();
    $state_list = \App\State::where('country_id',Auth::guard('front')->user()->country_id)->pluck('name','id')->toArray();
    $city_list = \App\City::where('state_id',Auth::guard('front')->user()->state_id)->pluck('name','id')->toArray();
    $years = array_combine(range(date("Y"), 1910), range(date("Y"), 1910));

    $country_details = \App\Patient::with('countries')->find(Auth::guard('front')->user()->id)->toArray();
    $state_details = \App\Patient::with('states')->find(Auth::guard('front')->user()->id)->toArray();
    $city_details = \App\Patient::with('cities')->find(Auth::guard('front')->user()->id)->toArray();

    /*print_r($country_details);
    exit();*/
    return view('pages.profile')->with(['country_list'=>$country_list,'years'=>$years,'state_list'=>$state_list,'city_list'=>$city_list,'country_details'=>$country_details,'state_details'=>$state_details,'city_details'=>$city_details]);
  }

  public function patient_logout() {
    Auth::guard('front')->logout();
    return redirect('/');
  }

  public function update_profile(Request $request) {
    $this->validate($request,[      
      'first_name' => 'required|max:50',
      'last_name' => 'required|max:50',
      'email_id' => 'required|email|unique:patients,email_id,'.Auth::guard('front')->user()->id,
      /*'username' => 'required|unique:patients,username,'.Auth::guard('front')->user()->id,
      'title' => 'required',*/
      'mobile_no' => ['required','max:10','min:10'],      
      'sex' => 'required',
      'country_id' => 'required',
      'state_id' => 'required',
      'city_id' => 'required',
      'dob_year' => 'required',
      'dob_month' => 'required',
      'dob_days' => 'required',
      'biography' => 'required'
    ]);

    $patients = \App\Patient::find(Auth::guard('front')->user()->id);
    if($patients->is_patient ==''){
        $this->validate($request,[
        'are_you_patient' => 'required'      
      ]);
    }  
    if($patients) { 
        $patients->first_name = $request->first_name;
        $patients->last_name = $request->last_name;
       /* $patients->username = $request->username; */
        $patients->mobile_no = $request->mobile_no;
        $patients->email_id = $request->email_id;
       /* $patients->title = $request->title;*/
        $patients->biography = $request->biography;
        $patients->sex = $request->sex;
        $patients->country_id = $request->country_id;
        $patients->state_id = $request->state_id;
        $patients->city_id = $request->city_id;        
        if($request->are_you_patient =='N'){
          $patients->is_patient = $request->are_you_patient;  
          $patients->patient_first_name = $request->patient_first_name;
          $patients->patient_last_name = $request->patient_last_name;
          $patients->relation_with = $request->relation_with;
        }else if(!empty($patients->is_patient) && $patients->is_patient =='N'){
          $patients->is_patient = $patients->is_patient; 
          $patients->patient_first_name = $request->patient_first_name;
          $patients->patient_last_name = $request->patient_last_name;
          $patients->relation_with = $request->relation_with;
        }else if($request->are_you_patient =='Y'){
          $patients->is_patient = $request->are_you_patient;   
          $patients->patient_first_name = $request->first_name;
          $patients->patient_last_name = $request->last_name;
        }
        $patients->date_of_birth = $request->dob_days."-".$request->dob_month."-".$request->dob_year;     
        $patients->save();
        $request->session()->flash("message", "Profile updated successfully");
        return redirect('/profile');
      
    }
  }

  public function get_state_list(Request $request) {
    if($request->ajax()) {
      $country_id = $request->country_id;
      if($country_id) {
        $state_list = \App\State::where('country_id',$country_id)->get()->pluck('name','id')->toArray();
        if($state_list) {
          return response()->json(['status' => '1','state_list'=>$state_list]);
        }
        else {
          return response()->json(['status' => '0','state_list'=>array()]);
        }
      }
    }
  }

  public function get_city_list(Request $request) {
    if($request->ajax()) {
      $state_id = $request->state_id;
      if($state_id) {
        $city_list = \App\City::where('state_id',$state_id)->get()->pluck('name','id')->toArray();
        if($city_list) {
          return response()->json(['status' => '1','city_list'=>$city_list]);
        }
        else {
          return response()->json(['status' => '0','city_list'=>array()]);
        }
      }
    }
  }

  public function change_password(Request $request) {
    $country_details = \App\Patient::with('countries')->find(Auth::guard('front')->user()->id)->toArray();
    $state_details = \App\Patient::with('states')->find(Auth::guard('front')->user()->id)->toArray();
    $city_details = \App\Patient::with('cities')->find(Auth::guard('front')->user()->id)->toArray();
    return view('pages.change_password')->with(['country_details'=>$country_details,'state_details'=>$state_details,'city_details'=>$city_details]);
  }

  public function update_password(Request $request) {
    $this->validate($request,[
      'old_password' => 'required|check_old_password',
      'new_password' => ['max:32','min:6','regex:/^(?=.*[a-z|A-Z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/'],
      'confirm_password' => 'required|same:new_password'
    ],[
      'old_password.required' => 'Please enter old password',
      'old_password.check_old_password' => 'Old password not matched',
      'new_password.regex' => 'Password should contain atleast one uppercase/lowercase letter,one number and one special character',
      'confirm_password.required' => 'Please enter confirm password',
      'confirm_password.same' => 'New password and confirm password should matched'
    ]);

    $patients = \App\Patient::find(Auth::guard('front')->user()->id);
    if($patients) {
      $patients->password = bcrypt($request->new_password);
      $patients->save();
      $request->session()->flash("message", "Password updated successfully");
      return redirect('/change-password');
    }
  }

  public function activate($token,$current_time) {
    $start_time = time();
    $time_diff = ($start_time-$current_time)/60/1000;
    if(number_format((float)$time_diff, 2, '.', '') > 1440) {
      $message = "Activation link is expired";
    }
    else {
      $patient_details = \App\Patient::where('remember_token',$token)->first();
      if($patient_details) {
        if($patient_details->status == "0") {
          $patient_details->status = "1";
          $patient_details->save();
          $message = "Your account has been activated. Please click on login to further process.";
        }
        else {
          $message = "Account already activated";
        }
      }
      else {
        $message = "Invalid activation token";
      }
    }

    return view('pages.activation')->with('message',$message);
  }

  public function upload_documents() {
    $documentdata = \App\Document::where('status', '!=', 2)->where('patient_id', '=', Auth::guard('front')->user()->id)->orderBy('id','desc')->get();
    $country_details = \App\Patient::with('countries')->find(Auth::guard('front')->user()->id)->toArray();
    $state_details = \App\Patient::with('states')->find(Auth::guard('front')->user()->id)->toArray();
    $city_details = \App\Patient::with('cities')->find(Auth::guard('front')->user()->id)->toArray();
    return view('pages.upload_document')->with(['country_details'=>$country_details,'state_details'=>$state_details,'city_details'=>$city_details,'documentdata'=>$documentdata]);    
  }
  public function my_enquiry() {
    $country_details = \App\Patient::with('countries')->find(Auth::guard('front')->user()->id)->toArray();
    $state_details = \App\Patient::with('states')->find(Auth::guard('front')->user()->id)->toArray();
    $city_details = \App\Patient::with('cities')->find(Auth::guard('front')->user()->id)->toArray();
    return view('pages.my_enquiry')->with(['country_details'=>$country_details,'state_details'=>$state_details,'city_details'=>$city_details]);    
  }

  public function profile_image_upload(Request $request) {   
    $fielava = $_FILES['avators']['name']; 
    $arr = explode('.',$fielava);
    $end = end($arr);       
    $patients = \App\Patient::find(Auth::guard('front')->user()->id);    
    if($patients) {
      if($fielava !=''){
      $allowed2 = array('bmp','gif','jpg','jpeg','png');
      if (!in_array($end, $allowed2)) {        
        $returnArr = array('status'=>'2','msg'=>'The type of file you are trying to upload is not allowed');
      } else {
      if($request->hasFile('avators')) {
        $file = $request->file('avators');
        $fileName = time().'_'.$file->getClientOriginalName();
        //thumb destination path
        $destinationPath = public_path().'/uploads/patients/thumb';
        $img = Image::make($file->getRealPath());
        $img->resize(25, 25, function ($constraint){
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$fileName);

        //original destination path
        $destinationPath = public_path().'/uploads/patients/' ;
        $img = Image::make($file->getRealPath());

        $img->resize(150, 150, function ($constraint){
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$fileName);
        if($patients->avators !=''){
          unlink(public_path().'/uploads/patients/thumb'.'/'.$patients->avators);
          unlink(public_path().'/uploads/patients'.'/'.$patients->avators);
        }
      }
      else {
        $fileName = $patients->avators;
      }      
      $patients->avators = $fileName;
      $save= $patients->save();
      if($save) {              
          $returnArr = array('status'=>'1','image_name'=>$fileName,'msg'=>'Inserted Successfully');
      }else{
          $returnArr = array('status'=>'0','msg'=>'Inserted Faliure');
      }
    }
  }else{
    $returnArr = array('status'=>'3','msg'=>'Please select an image');
  }
  }
    echo json_encode($returnArr);
    die(); 
  }
  public function patient_forgotpass(Request $request){
      $email_id = $request->email_id;
      $existRows = \App\Patient::where('email_id', '=', $email_id)->get();      
       if(count($existRows)== 0)
        {
          $returnArr = array('status'=>'3','msg'=>'Invalid Email');
        } else{        
          $security_code = $this->securitycode($email_id);
          $url = $security_code.time();
          $getpassword_link = config('app.url').'changepassword/'.base64_encode($security_code.time());
          $name = $existRows[0]['first_name'].' '.$existRows[0]['last_name'];
          Mail::to($email_id)->send(new ForgotPasswordMail($name,$getpassword_link));
          $returnArr = array('status'=>'1','msg'=>'Your request successfully sent. Please check mail.');
        }
    echo json_encode($returnArr);
    die();
  }
  public function securitycode($email_id) {            
      do{
        $sec_code = rand(10000000, 99999999);
        $seccode = base64_encode($sec_code.time());       
        $r = \App\Patient::where('security_code',$seccode)->get()->toArray();       
        if(count($r)== 0) 
        {
          break;  
        }
        }while(1);     
        $rr = \App\Patient::where('email_id',$email_id)->get()->toArray();
        $patobj = \App\Patient::find($rr[0]['id']);            
        $patobj->security_code = $seccode; 
        $patobj->save();        
        return $sec_code;
  }

  public function changepassword($url) {
    $existRows = \App\Patient::where('security_code', '=', $url)->get();     
     if(count($existRows)== 0)
        {                
          return redirect('/');
        } else{    
          return view('pages.forgot_password')->with('url',$url);
        }
  }
  public function reset_password($security_code,Request $request) {   
  $this->validate($request,[      
      'new_password' => ['max:32','min:6','regex:/^(?=.*[a-z|A-Z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/'],
      'confirm_password' => 'required|same:new_password'
    ],[           
      'new_password.regex' => 'Password should contain atleast one uppercase/lowercase letter,one number and one special character',
      'confirm_password.required' => 'Please enter confirm password',
      'confirm_password.same' => 'New password and confirm password should matched'
    ]); 
    $existRows = \App\Patient::where('security_code', '=', $security_code)->get();     
     
       if(count($existRows)== 0)
        {                
         $request->session()->flash('error_message', 'Security code not match!');
          return redirect('/successreset');
        } else{ 
      $patients = \App\Patient::find($existRows[0]->id);
    if($patients) {
      $patients->password = bcrypt($request->new_password);
      $patients->security_code = '';
      $patients->save();           
     $request->session()->flash("message", "Password updated successfully. please login");
      return redirect('/successreset');
    }
  }
}

public function documentupload(Request $request) {    
    $fielava = $_FILES['document']['name'];    
    if($request->existings_tag_name !=''){
      $existings_tag_name = $request->existings_tag_name;
    }
    if($request->new_tag !=''){
      $new_tag = $request->new_tag;
      $objtag = new \App\DocumentTag();
      $objtag->tag_name = $new_tag;
      $objtag->save();
      $insert_id = $objtag->id; 
    } 
    $file_name = $request->file_name.' on '.date('Y-m-d'); 
    $arr = explode('.',$fielava);
    $end = end($arr);       
    $documents = new \App\Document();   
    if($documents) {
      if($fielava !=''){
        $allowed2 =array('bmp','gif','jpg','jpeg','png','mp4','flv','avi','wmv','asf','webm','ogv','txt','pdf','psd','doc','rtf','ppt','docx');
        if (!in_array($end, $allowed2)) {        
          $returnArr = array('status'=>'2','msg'=>'The type of file you are trying to upload is not allowed');
        } else {
        if($request->hasFile('document')) {
          $file = $request->file('document');
          $fileName = time().'_'.$file->getClientOriginalName();

          //original destination path
          $destinationPath = public_path().'/uploads/drop/' ;       
          $file->move($destinationPath,$fileName);
        }else {
          $fileName = $documents->document;
        }      
        $documents->document = $fileName;
        $documents->file_name = $file_name;
        $documents->patient_id = Auth::guard('front')->user()->id;
        $save= $documents->save();
        $lastinsert_id = $documents->id;

        if($save) {           
            if(isset($existings_tag_name) && !empty($existings_tag_name)){
              $objdoctag = new \App\DocumentdocumentTag();
              $extagarr = explode(',',$existings_tag_name);
              foreach($extagarr as $key => $val ){              
                $objdoctag->document_id = $lastinsert_id;
                $objdoctag->documenttag_id = $val;
                $objdoctag->save();
              }
            }
            if(isset($insert_id) && !empty($insert_id)){            
                $objdtag = new \App\DocumentdocumentTag();          
                $objdtag->document_id = $lastinsert_id;
                $objdtag->documenttag_id = $insert_id;
                $objdtag->save();            
            }              
            $returnArr = array('status'=>'1','msg'=>'Inserted Successfully');
        }else{
            $returnArr = array('status'=>'0','msg'=>'Inserted Faliure');
        }
      }
    }else{
      $returnArr = array('status'=>'3','msg'=>'Please select an document');
    }
  }
    echo json_encode($returnArr);
    die();      
}
public function successreset() {    
    return view('pages.reset');
}
	public function document_delete(Request $request,$id) {
	  if($id) {
	      $docu_cat = \App\Document::find($id);
	      $status = '2';
	      $docu_cat->status = $status; 
	      $del = $docu_cat->save();
	      if($del) {      
	          $request->session()->flash("message", "Successfully deleted");
	          return redirect('/upload-documents');
	      }
	  }
	}
    public function document_download(Request $request,$id) {
        if($id) {
            $docu_cat = \App\Document::find($id);
            $file_path = public_path('/uploads/drop').'/'.$docu_cat->document;
            return response()->download($file_path); 
        }
    }

    function getattdocumenttags(){
      $data = array();
      $documenttag_list = \App\DocumentTag::where('status', '!=', 2)->get();
      if(count($documenttag_list)>0)
      {
        foreach ($documenttag_list as $key => $value) {       
           $data[] = array(
            'value' => $value->id,
            'text' => $value->tag_name
          );
        }
      }else{
        $data[] = array();
      } 
      echo json_encode($data);
    /*$json = '[ { "value": 1 , "text": "Amsterdam"},
      { "value": 2 , "text": "London"},
      { "value": 3 , "text": "Paris"},
      { "value": 4 , "text": "Washington"},
      { "value": 5 , "text": "Mexico City"},
      { "value": 6 , "text": "Buenos Aires"},
      { "value": 7 , "text": "Sydney"},
      { "value": 8 , "text": "Wellington"},
      { "value": 9 , "text": "Canberra"},
      { "value": 10, "text": "Beijing"},
      { "value": 11, "text": "New Delhi"},
      { "value": 12, "text": "Kathmandu"},
      { "value": 13, "text": "Cairo"},
      { "value": 14, "text": "Cape Town"},
      { "value": 15, "text": "Kinshasa"}
    ]';
    echo  $json; */
  }
}
