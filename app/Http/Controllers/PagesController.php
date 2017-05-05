<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SuccessStories;

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

		return view('pages.services');
	}
	public function servicedetails()
	{
		return view('pages.servicedetails');
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
		return view('pages.doctors');
	}

	public function contact()
	{
		return view('pages.contact');
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
