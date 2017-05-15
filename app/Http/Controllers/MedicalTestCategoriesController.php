<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MedicalTestCategories;
use Auth;
use Input;
use Redirect;
use Session;
use Validator;

class MedicalTestCategoriesController extends Controller
{
    public function __construct() {
    	
    }
	public function index() {
      $medicaltestcategories = MedicalTestCategories::where('status', '!=', 2)->orderBy('id','desc')->get();
        //echo "<pre>"; print_r($medicaltestcategories); die;
    	return view('admin.medicaltestcategories.index',compact('medicaltestcategories'));
    }

   	public function create()
    {    	
       return view('admin.medicaltestcategories.create');
    }
    
    public function store(Request $request)
    {
      $this->validate($request, [
        'cat_name' => 'required|unique:medical_test_categories'        
      ]);

       	$mtc = new MedicalTestCategories();
       	$mtc->cat_name = $request->cat_name;       	
       	$mtc->save();      	
      	Session::flash('message', 'Successfully added!');
      	return Redirect::to('/admin/medicaltestcategories');
    }
    
    public function edit($id)
    {    	
        $medtestcat = MedicalTestCategories::findOrFail($id);
        /*print_r($medtestcat); die(); */
        $data['medicaltestcategories'] = $medtestcat; 
       /* print_r($data['medicaltestcategories']); die(); */
       	return view('admin.medicaltestcategories.edit',$data);      
    }    

    public function update($id,Request $request)
    {
        //echo $id; die;
        $medtestcat = MedicalTestCategories::find($id);
        // validate
        $this->validate($request, [
        'cat_name' => 'required|unique:medical_test_categories,cat_name,'.$id,        
      ]);
       	$medtestcat->cat_name = $request->cat_name;
        $medtestcat->status = $request->status;       	
       	$medtestcat->save();
        // redirect
        Session::flash('message', 'Successfully updated');
        return Redirect::to('/admin/medicaltestcategories');
    }

    
    /*public function delete(Request $request,$id) {
      if($id) {
        $metcat = MedicalTestCategories::find($id);
        if($metcat) {          
          $metcat->delete();
          $request->session()->flash("message", "Successfully deleted");
          return redirect('/admin/medicaltestcategories');
        }
      }
    }*/
    public function delete(Request $request,$id) {
        if($id) {
            $metcat = MedicalTestCategories::find($id);
            $status = '2';
            $metcat->status = $status; 
            $del = $metcat->save();
            if($del) {      
                $request->session()->flash("message", "Successfully deleted");
                return redirect('/admin/medicaltestcategories');
            }
        }
    }
}
