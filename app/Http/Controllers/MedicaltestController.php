<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Medicaltest;
use App\MedicalTestCategories;
use Auth;
use Input;
use Redirect;
use Session;
use Validator;

class MedicaltestController extends Controller
{
    public function __construct() {
    	
    }
	public function index() {
        $medicaltest = Medicaltest::with('medicaltestcategories')->where('status', '!=', 2)->orderBy('medicaltestcategories_id')->get()->toArray();
        
        $data['medicaltest'] = $medicaltest;
        /*echo "<pre>";
        print_r($data['medicaltest']);
        echo $data['medicaltest'][0]['test_name'];
        die();*/
        return view('admin.medicaltest.index',$data); 
    }

   	public function create()
    {
    	$category_list = \App\MedicalTestCategories::get()->pluck('cat_name','id')->toArray();
       //	return view('admin.genericmedicine.create');
       return view('admin.medicaltest.create')->with(['category_list'=>$category_list]);
    }
    
    public function store(Request $request)
    {
      $this->validate($request, [
        'test_name' => 'required|unique:medicaltests',
        'medicaltestcategories_id' => 'required'
      ]);

       	$medt = new Medicaltest();
       	$medt->test_name = $request->test_name;
       	$medt->medicaltestcategories_id = $request->medicaltestcategories_id;       	     
       	$medt->save();      	
      	Session::flash('message', 'Successfully added!');
      	return Redirect::to('/admin/medicaltest');
    }
    
    public function edit($id)
    {
        $medicaltest = Medicaltest::findOrFail($id);
        $data['medicaltest'] = $medicaltest; 
        $data['category_list'] = \App\MedicalTestCategories::get()->pluck('cat_name','id')->toArray();
       	return view('admin.medicaltest.edit',$data);      
    }    

    public function update($id,Request $request)
    {
        //echo $id; die;
        $medtest = Medicaltest::find($id);
        // validate
        $this->validate($request, [
        'test_name' => 'required|unique:medicaltests,test_name,'.$id,
        'medicaltestcategories_id' => 'required'        
      ]);
       	$medtest->test_name = $request->test_name;
        $medtest->status = $request->status;
       	$medtest->medicaltestcategories_id = $request->medicaltestcategories_id;        
       	$medtest->save();       
        Session::flash('message', 'Successfully updated');
        return Redirect::to('/admin/medicaltest'); 
    }     
   /* public function delete(Request $request,$id) {
      if($id) {
        $medtest_details = Medicaltest::find($id);
        if($medtest_details) {          
          $medtest_details->delete();
          $request->session()->flash("message", "Successfully deleted");
          return redirect('/admin/medicaltest');
        }
      }
    }*/

    public function delete(Request $request,$id) {
        if($id) {
            $medtest_details = Medicaltest::find($id);
            $status = '2';
            $medtest_details->status = $status; 
            $del = $medtest_details->save();
            if($del) {      
                $request->session()->flash("message", "Successfully deleted");
                return redirect('/admin/medicaltest');
            }
        }
    }
    public function ajaxmedichangestatus(Request $request) { 
        $id = $request->id;
        $status = $request->status;     
        $mt = Medicaltest::find($id);
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
