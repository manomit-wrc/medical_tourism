<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Hospital;
use App\HotelClassType;
use App\Country;
use App\State;
use App\City;
use App\Treatment;
use App\HospitalTreatment;
use App\MedicalTestCategories;
use App\Medicaltest;  
use App\HospitalMedicalTest;
use Auth;
use Input;
use Redirect;
use Session;
use Validator;
use Image;
use File;
use Illuminate\Support\Facades\Route;

class HospitalController extends Controller
{
    public function __construct() {
    	
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $hospitals_list = Hospital::all();
        return view('admin.hospitals.index')->with('hospitals_list',$hospitals_list);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
       $countries = Country::orderBy('name')->pluck('name', 'id')->all();
       return view('admin.hospitals.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        //echo "<pre>"; print_r($request->all()); die;
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'website' => 'required|url',
            'street_address' => 'required',
            'phone' => 'required',
            'country_id' => 'required',
            'state_id' => 'required',
            'city_id' => 'required',
            'zipcode' => 'required',
            'number_of_beds' => 'required|numeric',
            'number_of_icu_beds' => 'required|numeric',
            'number_of_operating_rooms' => 'required|numeric',
            'number_of_avg_international_patients' => 'required|numeric',
            'avators' => 'required|image|mimes:jpeg,png,jpg,gif,svg|dimensions:min_width=745,min_height=214'
       ]);

      // Getting all data after success validation.
      
      $hptl = new Hospital($request->input()) ;
      $hptl->name = $request->get('name') ;
      $hptl->description = $request->get('description') ;
      $hptl->email = $request->get('email') ;
      $hptl->phone = $request->get('phone') ;
      $hptl->website = $request->get('website') ;
      $hptl->street_address = $request->get('street_address') ;
      $hptl->phone = $request->get('phone') ;
      $hptl->country_id = $request->get('country_id') ;
      $hptl->state_id = $request->get('state_id') ;
      $hptl->zipcode = $request->get('zipcode') ;
      $hptl->number_of_beds = $request->get('number_of_beds') ;
      $hptl->number_of_icu_beds = $request->get('number_of_icu_beds') ;
      $hptl->number_of_operating_rooms = $request->get('number_of_operating_rooms') ;
      $hptl->number_of_avg_international_patients = $request->get('number_of_avg_international_patients') ;
     

      if($file = $request->hasFile('avators')) {

            $file = $request->file('avators') ;

            $fileName = time().'_'.$file->getClientOriginalName() ;

            //thumb destination path
            $destinationPath = public_path().'/uploads/hospitals/thumb' ;

            $img = Image::make($file->getRealPath());

            $img->resize(745, 214, function ($constraint){
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$fileName);

            //original destination path
            $destinationPath = public_path().'/uploads/hospitals/' ;
            $file->move($destinationPath,$fileName);

            $hptl->avators = $fileName ;
        }
      $hptl->save() ;

      Session::flash('message', 'Successfully added!');
      return Redirect::to('/admin/hospitals');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $hosptl_data = Hospital::findOrFail($id);
       //echo "<pre>"; print_r($hotels_data->hotelclasstypes); die;
        return view('admin.hospitals.show',compact('hosptl_data'));
    }
    /**
     * Display the treatment resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function treatment($id)
    {
        $treatment_datas = Treatment::all();
        //echo "<pre>"; print_r($treatment_datas); die();
        $hospital_treatment_datas = Hospital::with('treatments')->where('id',$id)->get()->toArray();
        //echo "<pre>"; print_r($hospital_treatment_datas); die();
        foreach ($hospital_treatment_datas[0]['treatments'] as $key => $value) {
          $hos_treat_datas['treatment_array'][] = $value['id'];
        }
        //echo "<pre>"; print_r($hos_treat_datas); die();
        return view('admin.hospitals.treatment',compact('treatment_datas','hos_treat_datas'));
    }

    public function store_treatment(Request $request) {
      if($request->ajax()) { 
        //echo $request->hospital_id;  die;
        //echo "<pre>"; print_r($request->treatmentArr); die;
        $hospital_id = $request->hospital_id;
        //echo $hospital_id; die;
        $existRows = \App\HospitalTreatment::where('hospital_id', '=', $hospital_id)->get();
        //echo "<pre>"; print_r($existRows); die;
        if(count($existRows)>0)
        {
          $affectedRows = \App\HospitalTreatment::where('hospital_id', '=', $hospital_id)->delete();
        //echo "<pre>"; print_r($affectedRows); die;
        }  
        
        $treatmentArr = $request->treatmentArr;
        foreach ($treatmentArr as $key => $value) {
          $data[] = [
                'hospital_id' => $hospital_id,
                'treatment_id' => $value['treatment_id']
            ];
        }
        //echo "<pre>"; print_r($data); die;
        $result = \App\HospitalTreatment::insert($data);
        //echo "<pre>"; print_r($result); die;

        if($result) {
          return response()->json(['status' => '1']);
        }
        else {
          return response()->json(['status' => '0']);
        }
      }
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        // get the Hotel
       $hosptl_data = Hospital::findOrFail($id);
       $countries = Country::orderBy('name')->pluck('name', 'id')->all();
       $states = State::orderBy('name')->pluck('name', 'id')->all();
       $cities = City::orderBy('name')->pluck('name', 'id')->all();
       $hotelclasstypes = HotelClassType::orderBy('id')->pluck('name', 'id')->all();    
       return view('admin.hospitals.edit', compact('hosptl_data','countries','states','cities','hotelclasstypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */

    public function update($id,Request $request)
    {
        //echo $id; die;
        $hptl = Hospital::find($id);
        // validate
        //echo "<pre>"; print_r($request->all()); die;
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'website' => 'required|url',
            'street_address' => 'required',
            'phone' => 'required',
            'country_id' => 'required',
            'state_id' => 'required',
            'city_id' => 'required',
            'zipcode' => 'required',
            'number_of_beds' => 'required|numeric',
            'number_of_icu_beds' => 'required|numeric',
            'number_of_operating_rooms' => 'required|numeric',
            'number_of_avg_international_patients' => 'required|numeric',
            'avators' => 'image|mimes:jpeg,png,jpg,gif,svg|dimensions:min_width=745,min_height=214'
       ]);

      // Getting all data after success validation.
      $hptl->name = $request->get('name') ;
      $hptl->description = $request->get('description') ;
      $hptl->email = $request->get('email') ;
      $hptl->phone = $request->get('phone') ;
      $hptl->website = $request->get('website') ;
      $hptl->street_address = $request->get('street_address') ;
      $hptl->phone = $request->get('phone') ;
      $hptl->country_id = $request->get('country_id') ;
      $hptl->state_id = $request->get('state_id') ;
      $hptl->zipcode = $request->get('zipcode') ;
      $hptl->number_of_beds = $request->get('number_of_beds') ;
      $hptl->number_of_icu_beds = $request->get('number_of_icu_beds') ;
      $hptl->number_of_operating_rooms = $request->get('number_of_operating_rooms') ;
      $hptl->number_of_avg_international_patients = $request->get('number_of_avg_international_patients') ;
     

      if($file = $request->hasFile('avators')) {

            $file = $request->file('avators') ;

            $fileName = time().'_'.$file->getClientOriginalName() ;

            //thumb destination path
            $destinationPath = public_path().'/uploads/hospitals/thumb' ;

            $img = Image::make($file->getRealPath());

            $img->resize(745, 214, function ($constraint){
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$fileName);

            //original destination path
            $destinationPath = public_path().'/uploads/hospitals/' ;
            $file->move($destinationPath,$fileName);

            $hptl->avators = $fileName ;
        }
      $hptl->save() ;


        // redirect
        Session::flash('message', 'Successfully updated');
        return Redirect::to('/admin/hospitals');
    }
    public function medicaltest($id)
    { 
      $medicaltestcatdata = MedicalTestCategories::all();
      $hospitalmedicaltest = HospitalMedicalTest::where('hospital_id',$id)->get()->toArray();
      //echo "<pre>"; print_r($hospitalmedicaltest); die;
      foreach ($hospitalmedicaltest as $key => $value) {
          $data['medicaltest_array'][] = $value['medicaltest_id'];
      }
      //echo "<pre>"; print_r($data['medicaltest_array']); die;
     /* $data['medicaltestdata'] = array();
      foreach($medicaltestcatdata as $key => $val)
      {
        //$data['medicaltestdata']['catid'] = $val->id;
        //$data['medicaltestdata']['catname'] = $val->cat_name;
        
        $medicaltest = Medicaltest::where('medicaltestcategories_id',$val->id)->get()->toArray();
        //echo "<pre>"; print_r($medicaltest); die;
        foreach($medicaltest as $keyy => $vall)
        {
          $data['medicaltestdata'][$key]['catid'] =$vall['medicaltestcategories_id'];
          $data['medicaltestdata'][$key]['catname'] =$val->cat_name;
          $data['medicaltestdata'][$key]['id'][] =$vall['id'];
          $data['medicaltestdata'][$key]['testname'][] =$vall['test_name'];
        }
          
      } */
      foreach($medicaltestcatdata as $key => $val)
      {
        //$data['medicaltestdata']['catid'] = $val->id;
        //$data['medicaltestdata']['catname'] = $val->cat_name;
        $data1[] = array(
          'cat_id' => $val->id,
          'catname' => $val->cat_name,
          'testarr' => $this->gettestarr($val->id)
        );
      }
      $data['medicaltestdata'] =$data1;
    // echo "<pre>"; print_r($data1); die;
      //echo "<pre>"; print_r($data['medicaltestdata']); die;
      //echo "<pre>"; print_r($medicaltestdata[0]->medicaltestcategories); die;        
      return view('admin.hospitals.medicaltest',$data);
    }

    public function gettestarr($cat_id) {
      $medicaltest = Medicaltest::where('medicaltestcategories_id',$cat_id)->get()->toArray();
        //echo "<pre>"; print_r($medicaltest); die;
        foreach($medicaltest as $keyy => $vall)
        {      
          $data[] = array(
            'id' => $vall['id'],
            'testname' => $vall['test_name'],          
          );
        }
        return $data;
    }

    public function store_medicaltest(Request $request) {
      //echo "<pre>"; print_r($request->all()); die;
      $hospital_id = $request->hospital_id;
      $medicaltestArr = $request->medicaltestArr;
      if(count($medicaltestArr) > 0){
      // print_r($medicaltestArr); die();
      //echo $request->hospital_id;  die;
      //echo "<pre>"; print_r($request->treatmentArr); die;      
        //echo $hospital_id; die;
        $existRows = \App\HospitalMedicalTest::where('hospital_id', '=', $hospital_id)->get();
        //echo "<pre>"; print_r($existRows); die;
        if(count($existRows)>0)
        {
          $affectedRows = \App\HospitalMedicalTest::where('hospital_id', '=', $hospital_id)->delete();        
        }
        foreach ($medicaltestArr as $key => $value) {
          $data[] = [
                'hospital_id' => $hospital_id,
                'medicaltest_id' => $value,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];
        }
        //echo "<pre>"; print_r($data); die;
        $result = \App\HospitalMedicalTest::insert($data);
        Session::flash('message', 'Successfully added!');
        return Redirect::to('/admin/hospitals/medicaltest/'.$hospital_id);
      }else{
        Session::flash('error_message', 'Please select medical test!');
        return Redirect::to('/admin/hospitals/medicaltest/'.$hospital_id);
      }
    }

    public function ajaxstoremedicaltest(Request $request) {      
      $test_name = $request->test_name;
      $medicaltestcategories_id = $request->medicaltestcategories_id;
      $existRows = \App\Medicaltest::where('medicaltestcategories_id', '=', $medicaltestcategories_id)->where('test_name', '=', $test_name)->get();
        /*echo count($existRows); die;*/
       if(count($existRows)>0)
        {
          $returnArr = array('status'=>'3','msg'=>'Test name already exists on this category');
        } else{
      /*$data = [          
          'medicaltestcategories_id' => $medicaltestcategories_id,
          'test_name' => $test_name,
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s')
      ];         
      $result = \App\Medicaltest::insert($data);
      echo "<pre>"; print_r($result); die; */
        $mt = new Medicaltest();
        $mt->medicaltestcategories_id = $medicaltestcategories_id;
        $mt->test_name = $test_name; 
        $mt->created_at = date('Y-m-d H:i:s'); 
        $mt->updated_at = date('Y-m-d H:i:s');         
        $mt->save();
        $lastinsert_id = $mt->id;
        if($lastinsert_id) {              
          $returnArr = array('status'=>'1','lastinsert_id'=>$lastinsert_id,'test_name'=>$test_name,'msg'=>'Inserted Successfully');
        }else{
          $returnArr = array('status'=>'0','msg'=>'Inserted Faliure');
        } 
      }    
        echo json_encode($returnArr);
        die(); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */

    public function destroy($id)
    {
        //echo $id; die;
       // delete
        $hosobj = Hospital::findOrFail($id);
        $hosobj->delete();

        // redirect
        Session::flash('message', 'Successfully deleted');
        return Redirect::to('/admin/hospitals');
    }
}
