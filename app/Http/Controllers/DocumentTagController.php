<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DocumentTag;
use Auth;
use Input;
use Redirect;
use Session;
use Validator;

class DocumentTagController extends Controller
{
    public function index() {
      $documenttag = DocumentTag::where('status', '!=', 2)->orderBy('id','desc')->get();
        //echo "<pre>"; print_r($medicaltestcategories); die;
    	return view('admin.documenttag.index',compact('documenttag'));
    }
    public function create()
    {    	
       return view('admin.documenttag.create');
    }
    public function store(Request $request)
    {
      $this->validate($request, [
        'tag_name' => 'required|unique:document_tags'        
      ]);
       	$docobj = new DocumentTag();
       	$docobj->tag_name = $request->tag_name;       	
       	$docobj->save();      	
      	Session::flash('message', 'Successfully added!');
      	return Redirect::to('/admin/documenttag');
    }
    public function edit($id)
    {    	
        $documenttag = DocumentTag::findOrFail($id);        
        $data['documenttag'] = $documenttag;      
       	return view('admin.documenttag.edit',$data);      
    }
    public function update($id,Request $request)
    {
        //echo $id; die;
        $documenttag = DocumentTag::find($id);
        // validate
        $this->validate($request, [
        'tag_name' => 'required|unique:document_tags,tag_name,'.$id,        
      ]);
       	$documenttag->tag_name = $request->tag_name;
        $documenttag->status = $request->status;       	
       	$documenttag->save();
        // redirect
        Session::flash('message', 'Successfully updated');
        return Redirect::to('/admin/documenttag');
    }
    public function delete(Request $request,$id) {
        if($id) {
            $obj = DocumentTag::find($id);
            $status = '2';
            $obj->status = $status; 
            $del = $obj->save();
            if($del) {      
                $request->session()->flash("message", "Successfully deleted");
                return redirect('/admin/documenttag');
            }
        }
    }
    public function ajaxtagchangestatus(Request $request) { 
        $id = $request->id;
        $status = $request->status;     
        $mt = DocumentTag::find($id);
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
