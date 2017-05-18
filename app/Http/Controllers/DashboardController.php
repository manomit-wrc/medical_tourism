<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\Hospital;
use App\Doctor;
use App\Patient;

class DashboardController extends Controller
{
    public function __construct() {

    }
    public function index() 
    {
    	$hospital_data = Hospital::all();
    	$total_hospital_count = Hospital::where('status','=','1')->count();

    	$doctor_data = Doctor::all();
    	$total_doctor_count = Doctor::where('status','=','1')->count();
    	
    	$patient_data = Patient::all();
    	$total_patient_count = Patient::where('status','=','1')->count();
    	return view('admin.dashboard', compact('total_hospital_count','hospital_data','doctor_data','total_doctor_count','total_patient_count','patient_data'));
    }
}
