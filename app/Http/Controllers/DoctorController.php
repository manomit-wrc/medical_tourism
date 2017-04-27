<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Doctor;
use Validator;
use Image;
use Auth;

class DoctorController extends Controller
{
    public function __construct() {

    }

    public function index() {

      $doctor_data = Doctor::all();
      return view('admin.doctors.index')->with('doctor_data',$doctor_data);
    }

    public function create() {
      $country_list = \App\Country::get()->pluck('name','id');
      $degree_list = \App\Degree::get()->pluck('name','id')->toArray();
      $procedure_list = \App\Procedure::get()->pluck('name','id')->toArray();
      return view('admin.doctors.create')->with(['country_list'=>$country_list,'degree_list'=>$degree_list,'procedure_list'=>$procedure_list]);
    }

    public function store(Request $request) {

        Validator::make($request->all(), [
          'first_name' => 'required|max:32',
          'last_name' => 'required|max:32',
          'street_address' => 'required',
          'country_id' => 'required',
          'state_id' => 'required',
          'city_id' => 'required',
          'zipcode' => 'required|min:6|max:6',
          'email' => 'required|email|unique:doctors,email',
          'mobile_no' => 'required|regex:/[0-9]{10}/',
          'phone_no' => 'required',
          'avators' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          'degree_id' => 'required|array',
          'procedure_id' => 'required|array'
      ],[
        'country_id.required' => 'country field is required',
        'state_id.required' => 'state field is required',
        'city_id.required' => 'city field is required',
        'degree_id.required' => 'degree field is required',
        'procedure_id.required' => 'procedure field is required'
        ])->validate();


        if($request->hasFile('avators')) {
          $file = $request->file('avators') ;

          $fileName = time().'_'.$file->getClientOriginalName() ;

          //thumb destination path
          $destinationPath = public_path().'/uploads/doctors/thumb' ;

          $img = Image::make($file->getRealPath());

          $img->resize(100, 100, function ($constraint){
              $constraint->aspectRatio();
          })->save($destinationPath.'/'.$fileName);

          //original destination path
          $destinationPath = public_path().'/uploads/doctors/' ;
          $file->move($destinationPath,$fileName);
        }
        else {
          $fileName = '';
        }
        $doctors = new Doctor();
        $doctors->first_name = $request->first_name;
        $doctors->last_name = $request->last_name;
        $doctors->street_address = $request->street_address;
        $doctors->user_id = Auth::guard('admin')->user()->id;
        $doctors->country_id = $request->country_id;
        $doctors->state_id = $request->state_id;
        $doctors->city_id = $request->city_id;
        $doctors->zipcode = $request->zipcode;
        $doctors->email = $request->email;
        $doctors->mobile_no = $request->mobile_no;
        $doctors->phone_no = $request->phone_no;
        $doctors->avators = $fileName;
        $doctors->save();

        $doctors->procedures()->attach($request->procedure_id);
        $doctors->degrees()->attach($request->degree_id);

        $request->session()->flash("message", "Doctor addedd successfully");
        return redirect('/admin/doctors');
    }

    public function edit($id) {
      if($id) {
        $data['doctor_details'] = Doctor::find($id);
        $data['doctor_procedure_details'] = Doctor::with('procedures')->where('id',$id)->get()->toArray();
        $data['doctor_degree_details'] = Doctor::with('degrees')->where('id',$id)->get()->toArray();

        $data['country_list'] = \App\Country::get()->pluck('name','id');
        $data['state_list'] = \App\State::where('country_id',$data['doctor_details']->country_id)->get()->pluck('name','id');
        $data['city_list'] = \App\City::where('state_id',$data['doctor_details']->state_id)->get()->pluck('name','id');
        $data['degree_list'] = \App\Degree::get()->pluck('name','id')->toArray();
        $data['procedure_list'] = \App\Procedure::get()->pluck('name','id')->toArray();
        foreach ($data['doctor_procedure_details'][0]['procedures'] as $key => $value) {
          $data['procedures_array'][] = $value['id'];
        }
        foreach ($data['doctor_degree_details'][0]['degrees'] as $key => $value) {
          $data['degrees_array'][] = $value['id'];
        }

        return view('admin.doctors.edit',$data);
      }
    }

    public function update(Request $request, $id) {
      Validator::make($request->all(), [
        'first_name' => 'required|max:32',
        'last_name' => 'required|max:32',
        'street_address' => 'required',
        'country_id' => 'required',
        'state_id' => 'required',
        'city_id' => 'required',
        'zipcode' => 'required|min:6|max:6',
        'email' => 'required|email|unique:doctors,email,'.$request->id,
        'mobile_no' => 'required|regex:/[0-9]{10}/',
        'phone_no' => 'required',
        'avators' => 'required_with|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'degree_id' => 'required|array',
        'procedure_id' => 'required|array'
      ],[
        'country_id.required' => 'country field is required',
        'state_id.required' => 'state field is required',
        'city_id.required' => 'city field is required',
        'degree_id.required' => 'degree field is required',
        'procedure_id.required' => 'procedure field is required'
        ])->validate();

        $doctors = Doctor::find($id);

        if($doctors) {
          if($request->hasFile('avators')) {
            $file = $request->file('avators') ;

            $fileName = time().'_'.$file->getClientOriginalName() ;

            //thumb destination path
            $destinationPath = public_path().'/uploads/doctors/thumb' ;

            $img = Image::make($file->getRealPath());

            $img->resize(100, 100, function ($constraint){
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$fileName);

            //original destination path
            $destinationPath = public_path().'/uploads/doctors/' ;
            $file->move($destinationPath,$fileName);
          }
          else {
            $fileName = $doctors->avators;
          }

          $doctors->first_name = $request->first_name;
          $doctors->last_name = $request->last_name;
          $doctors->street_address = $request->street_address;
          $doctors->user_id = Auth::guard('admin')->user()->id;
          $doctors->country_id = $request->country_id;
          $doctors->state_id = $request->state_id;
          $doctors->city_id = $request->city_id;
          $doctors->zipcode = $request->zipcode;
          $doctors->email = $request->email;
          $doctors->mobile_no = $request->mobile_no;
          $doctors->phone_no = $request->phone_no;
          $doctors->avators = $fileName;
          $doctors->save();

          $doctors->procedures()->wherePivot('doctor_id', '=', $request->id)->detach();
          $doctors->procedures()->attach($request->procedure_id);

          $doctors->degrees()->wherePivot('doctor_id', '=', $request->id)->detach();
          $doctors->degrees()->attach($request->degree_id);

          $request->session()->flash("message", "Doctor updated successfully");
          return redirect('/admin/doctors');
        }
    }

    public function delete(Request $request,$id) {
      if($id) {
        $doctor_details = Doctor::find($id);
        if($doctor_details) {
          $doctor_details->procedures()->wherePivot('doctor_id', '=', $id)->detach();
          $doctor_details->degrees()->wherePivot('doctor_id', '=', $id)->detach();
          $doctor_details->delete();
          $request->session()->flash("message", "Doctor deleted successfully");
          return redirect('/admin/doctors');
        }
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


}
