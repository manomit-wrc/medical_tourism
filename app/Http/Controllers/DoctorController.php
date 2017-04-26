<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Doctor;
use Validator;

class DoctorController extends Controller
{
    public function __construct() {

    }

    public function index() {
      $doctor_data = Doctor::with('cities')->get();
      return view('admin.doctors.index')->with('doctor_data',$doctor_data);
    }

    public function create() {
      $country_list = \App\Country::get()->pluck('name','id');
      $degree_list = \App\Degree::get()->pluck('name','id')->toArray();
      return view('admin.doctors.create')->with(['country_list'=>$country_list,'degree_list'=>$degree_list]);
    }

    public function store(Request $request) {
       print_r($request->degree_id);
       die();
        Validator::make($request->all(), [
          'first_name' => 'required|max:32',
          'last_name' => 'required|max:32',
          'street_address' => 'required',
          'country_id' => 'required',
          'state_id' => 'required',
          'city_id' => 'required',
          'zipcode' => 'required|min:7|max:7',
          'email' => 'required|email|unique:doctors,email',
          'mobile_no' => 'required|regex:/(01)[0-9]{10}/',
          'phone_no' => 'required',
          'avators' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          'degree_id' => 'min_array_size'
      ])->validate();

    }
}
