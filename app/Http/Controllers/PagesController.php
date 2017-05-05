<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MedicalFacility;
use App\News;
use App\Doctor;

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
		$doctor_data = Doctor::findOrFail($id);
        return view('pages.doctordetail')->with('doctor_data',$doctor_data);
		//return view('pages.doctors');
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

}
