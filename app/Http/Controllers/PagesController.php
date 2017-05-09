<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;
use App\Http\Controllers\Controller;
use App\MedicalFacility;
use App\News;
use App\Doctor;
use App\FaqCategory;
use App\Faq;
use App\Immigration;


class PagesController extends Controller
{
    public function __construct()
    {

    }

	public function about()
	{
		return view('pages.about');
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
		return view('pages.enquiry');
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
		return view('pages.contact');
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
      $faq_data = Faq::has('FaqCategory')->orderBy('faqcategory_id')->get();
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
        //$faqs_lists = Faq::all();
        //echo "<pre>"; print_r($faqs_lists); die;
        //return view('pages.faqs')->with('faqs_lists',$faqs_lists);
        return view('pages.visa');
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

  public function patient_registration(Request $request) {
    if($request->ajax()) {
      $patient = new \App\Patient();
      $patient->first_name = $request->input('first_name');
      $patient->last_name = $request->input('last_name');
      $patient->email_id = $request->input('email_id');
      $patient->mobile_no = $request->input('mobile_no');
      $patient->password = bcrypt($request->input('password'));
      $patient->status = "1";

      if($patient->save()) {
        return response()->json(['status'=>'1','msg'=>'Registration successfully done. Email activation link is sent to your email']);
      }
      else {
        return response()->json(['status'=>'0','msg'=>'Registration interrupted. Please try again']);
      }
    }
  }

  public function patient_login(Request $request) {
    if($request->ajax()) {

      if(Auth::guard('front')->attempt(['email_id'=>$request->email_id, 'password'=>$request->password], $request->remember_me)) {
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


    return view('pages.profile')->with(['country_list'=>$country_list,'years'=>$years,'state_list'=>$state_list,'city_list'=>$city_list]);
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
      'username' => 'required|unique:patients,username,'.Auth::guard('front')->user()->id,
      'title' => 'required',
      'mobile_no' => ['required','max:10','min:10'],
      'avators' => 'required_with|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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
    if($patients) {
      if($request->hasFile('avators')) {
        $file = $request->file('avators') ;

        $fileName = time().'_'.$file->getClientOriginalName() ;

        //thumb destination path
        $destinationPath = public_path().'/uploads/patients/thumb' ;

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

      }
      else {
        $fileName = $patients->avators;
      }

      $patients->first_name = $request->first_name;
      $patients->last_name = $request->last_name;
      $patients->username = $request->username;
      $patients->mobile_no = $request->mobile_no;
      $patients->email_id = $request->email_id;
      $patients->title = $request->title;
      $patients->biography = $request->biography;
      $patients->sex = $request->sex;
      $patients->country_id = $request->country_id;
      $patients->state_id = $request->state_id;
      $patients->city_id = $request->city_id;
      $patients->date_of_birth = $request->dob_days."-".$request->dob_month."-".$request->dob_year;
      $patients->avators = $fileName;
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
    return view('pages.change_password');
  }

  public function update_password(Request $request) {
    $this->validate($request,[
      'old_password' => 'required|check_old_password',
      'new_password' => 'required',
      'confirm_password' => 'required|same:new_password'
    ],[
      'old_password.required' => 'Please enter old password',
      'old_password.check_old_password' => 'Old password not matched',
      'new_password.required' => 'Please enter new password',
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

}
