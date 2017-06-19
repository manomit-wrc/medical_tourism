<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Genericmedicine;
use Auth;
use Input;
use Redirect;
use Session;
use Validator;

class GenericmedicineController extends Controller
{
    public function __construct() {
    	
    }
	public function index() {
      $genericmedicine = Genericmedicine::where('status', '!=', 2)->orderBy('id','desc')->get();
      //echo "<pre>"; print_r($langcapbes); die;
    	return view('admin.genericmedicine.index')->with('genericmedicine',$genericmedicine);
  }

   	public function create()
    {
    	$procedure_list = \App\Procedure::get()->pluck('name','id')->toArray();
       //	return view('admin.genericmedicine.create');
       return view('admin.genericmedicine.create')->with(['procedure_list'=>$procedure_list]);
    }
    
    public function store(Request $request)
    {
      $this->validate($request, [
        'generic_name_of_the_medicine' => 'required',
        'brand_name' => 'required',
        'unit' => 'required',
        'price' => 'required',
        'procedure_id' => 'required'
      ]);

       	$gems = new Genericmedicine();
       	$gems->generic_name_of_the_medicine = $request->generic_name_of_the_medicine;
        $gems->brand_name = $request->brand_name;
       	$gems->unit = $request->unit;
       	$gems->price = $request->price;
       	$gems->save();
      	$gems->procedures()->attach($request->procedure_id);
      	Session::flash('message', 'Successfully added!');
      	return Redirect::to('/admin/genericmedicine');
    }
    
    public function edit($id)
    {
        $genericmedicine = Genericmedicine::find($id);
        $data['genericmedicine'] = $genericmedicine;       
       	$data['genericmedicine_procedure_details'] = Genericmedicine::with('procedures')->where('id',$id)->get()->toArray(); 
       	$data['procedure_list'] = \App\Procedure::get()->pluck('name','id')->toArray();
       //echo '<pre>'; print_r($data['procedure_list']); die();  
       	foreach ($data['genericmedicine_procedure_details'][0]['procedures'] as $key => $value) {
          	$data['procedures_array'][] = $value['id'];
        }       
       	return view('admin.genericmedicine.edit',$data);      
    }    

    public function update($id,Request $request)
    {
        //echo $id; die;
        $gems = Genericmedicine::find($id);
        // validate
        $this->validate($request, [
        'generic_name_of_the_medicine' => 'required',
        'brand_name' => 'required',
        'unit' => 'required',
        'price' => 'required',
        'procedure_id' => 'required'
      ]);
       	$gems->generic_name_of_the_medicine = $request->generic_name_of_the_medicine;
        $gems->brand_name = $request->brand_name;
       	$gems->unit = $request->unit;
       	$gems->price = $request->price;
        $gems->status = $request->status; 
       	$gems->save();
        $gems->procedures()->wherePivot('genericmedicine_id', '=', $request->id)->detach();
        $gems->procedures()->attach($request->procedure_id);


        // redirect
        Session::flash('message', 'Successfully updated');
        return Redirect::to('/admin/genericmedicine');
    }   

   /*  public function destroy($id)
    {     
       	if($id) {
        	$genmed_details = Genericmedicine::find($id);
        	if($genmed_details) {
          		$genmed_details->procedures()->wherePivot('genericmedicine_id', '=', $id)->detach();          
          		$genmed_details->delete();
         		Session::flash('message', 'Deleted successfully');
          		return redirect('/admin/genericmedicine');
        	}
      	}
    } */
    /* public function delete(Request $request,$id) {
      if($id) {
        $genmed_details = Genericmedicine::find($id);
        if($genmed_details) { 
         $genmed_details->procedures()->wherePivot('genericmedicine_id', '=', $id)->detach();          
          $genmed_details->delete();
          $request->session()->flash("message", "Successfully deleted");
          return redirect('/admin/genericmedicine');
        }
      }
    }*/
    public function delete(Request $request,$id) {
        if($id) {
            $genmed_details = Genericmedicine::find($id);
            $status = '2';
            $genmed_details->status = $status; 
            $del = $genmed_details->save();
            if($del) {      
                $request->session()->flash("message", "Successfully deleted");
                return redirect('/admin/genericmedicine');
            }
        }
    }

    public function ajaxgenechangestatus(Request $request) { 
        $id = $request->id;
        $status = $request->status;     
        $mt = Genericmedicine::find($id);
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
