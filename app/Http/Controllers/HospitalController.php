<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Hospital;
use App\HotelClassType;
use App\Country;
use App\State;
use App\City;
use App\Procedure;
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
        $hospitals_list = Hospital::where('status', '!=', 2)->get();
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
        Validator::make($request->all(), [
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
       ],[
        'country_id.required' => 'country field is required',
        'state_id.required' => 'state field is required',
        'city_id.required' => 'city field is required'
        ])->validate();

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
      $data = array();
      $proceduredata = Procedure::all();
      $hospitaltreatment = HospitalTreatment::where('hospital_id',$id)->get()->toArray();
      // echo "<pre>"; print_r($hospitaltreatment); die;
      foreach ($hospitaltreatment as $key => $value) {
          $data['hospitaltreatment_array'][] = $value['treatment_id'];
      }
     // echo "<pre>"; print_r($data['hospitaltreatment_array']); die;     
      foreach($proceduredata as $key => $val)
      {      
        $data1[] = array(
          'cat_id' => $val->id,
          'catname' => $val->name,
          'treatarr' => $this->gettreatarr($val->id)
        );
      }
        $data['proctreatdata'] =$data1;
       /* echo "<pre>"; print_r($data1); die;*/
       // echo "<pre>"; print_r($data['proctreatdata']); die;
        //return view('admin.hospitals.treatment',compact('treatment_datas','hos_treat_datas'));
        return view('admin.hospitals.treatment',$data);
    }

    public function gettreatarr($procedure_id) {      
     $tratmentdta = Treatment::where('procedure_id',$procedure_id)->get()->toArray();
        //echo "<pre>"; print_r($tratmentdta); die;
       $data = array();
        foreach($tratmentdta as $keyy => $vall)
        {      
          $data[] = array(
            'id' => $vall['id'],
            'name' => $vall['name'],          
          );
        }
        /*echo "<pre>"; print_r($data); die;*/
       return $data; 
    }

    public function ajaxstoretreatment(Request $request) {      
      $name = $request->name;
      $procedure_id = $request->procedure_id;
      $existRows = \App\Treatment::where('procedure_id', '=', $procedure_id)->where('name', '=', $name)->get();
        /*echo count($existRows); die;*/
       if(count($existRows)>0)
        {
          $returnArr = array('status'=>'3','msg'=>'Treatment name already exists on this Procedure');
        } else{      
        $mt = new Treatment();
        $mt->procedure_id = $procedure_id;
        $mt->name = $name; 
        $mt->created_at = date('Y-m-d H:i:s'); 
        $mt->updated_at = date('Y-m-d H:i:s');         
        $mt->save();
        $lastinsert_id = $mt->id;
        if($lastinsert_id) {              
          $returnArr = array('status'=>'1','lastinsert_id'=>$lastinsert_id,'name'=>$name,'msg'=>'Inserted Successfully');
        }else{
          $returnArr = array('status'=>'0','msg'=>'Inserted Faliure');
        } 
      }    
        echo json_encode($returnArr);
        die(); 
    }

    public function store_treatment(Request $request) {
      //echo "<pre>"; print_r($request->all()); die;
      $hospital_id = $request->hospital_id;
      $proceduretreatmentArr = $request->proceduretreatmentArr;
      if(count($proceduretreatmentArr) > 0){      
        $existRows = \App\HospitalTreatment::where('hospital_id', '=', $hospital_id)->get();
        //echo "<pre>"; print_r($existRows); die;
        if(count($existRows)>0)
        {
          $affectedRows = \App\HospitalTreatment::where('hospital_id', '=', $hospital_id)->delete();        
        }
        foreach ($proceduretreatmentArr as $key => $value) {
          $data[] = [
                'hospital_id' => $hospital_id,
                'treatment_id' => $value               
            ];
        }
        //echo "<pre>"; print_r($data); die;
        $result = \App\HospitalTreatment::insert($data);
        Session::flash('message', 'Successfully added!');
        return Redirect::to('/admin/hospitals/treatment/'.$hospital_id);
      }else{
        Session::flash('error_message', 'Please select Treatment!');
        return Redirect::to('/admin/hospitals/treatment/'.$hospital_id);
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
        Validator::make($request->all(), [
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
       ],[
        'country_id.required' => 'country field is required',
        'state_id.required' => 'state field is required',
        'city_id.required' => 'city field is required'
        ])->validate();

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

   /* public function destroy($id)
    {       
        $hosobj = Hospital::findOrFail($id);
        $hosobj->delete();        
        Session::flash('message', 'Successfully deleted');
        return Redirect::to('/admin/hospitals');
    }*/
    public function delete(Request $request,$id) {
        if($id) {
            $hosobj = Hospital::find($id);
            $status = '2';
            $hosobj->status = $status; 
            $del = $hosobj->save();
            if($del) {      
                $request->session()->flash("message", "Successfully deleted");
                return redirect('/admin/hospitals');
            }
        }
    }

    public function ajaxhoschangestatus(Request $request) { 
        $id = $request->id;
        $status = $request->status;     
        $mt = Hospital::find($id);
       /* if ($status == 1){
            $stat = 0;
        }
        if ($status == 0){
            $stat = 1;
        } */      
        $mt->status = $status; 
        $upd = $mt->save();        
        if($upd) {              
          $returnArr = array('status'=>'1','msg'=>'Updateed Successfully');
        }else{
          $returnArr = array('status'=>'0','msg'=>'Inserted Faliure');
        }          
        echo json_encode($returnArr);
        die();
    }
}
