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
        $medicaltest = Medicaltest::all();
        //echo "<pre>"; print_r($medicaltest[0]->medicaltestcategories->cat_name); die;        
        $data['medicaltest'] = $medicaltest; 
        $data['cat_name'] = $medicaltest[0]->medicaltestcategories->cat_name;
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
        'test_name' => 'required',
        'medicaltestcategories_id' => 'required'
      ]);

       	$medt = new Medicaltest();
       	$medt->test_name = $request->test_name;
       	$medt->medicaltestcategories_id = $request->medicaltestcategories_id;
       	$medt->cat_id = $request->medicaltestcategories_id;       
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
        'test_name' => 'required',
        'medicaltestcategories_id' => 'required'        
      ]);
       	$medtest->test_name = $request->test_name;
        $medtest->status = $request->status;
       	$medtest->medicaltestcategories_id = $request->medicaltestcategories_id;        
       	$medtest->save();       
        Session::flash('message', 'Successfully updated');
        return Redirect::to('/admin/medicaltest'); 
    }   

    public function destroy($id)
    {
       //echo $id; die; 
       	if($id) {
        	$medtest_details = Medicaltest::find($id); 
        	if($medtest_details) {          		         
          		$medtest_details->delete();
         		Session::flash('message', 'Deleted successfully');
          		return redirect('/admin/medicaltest');
        	}
      	}
    }
}
