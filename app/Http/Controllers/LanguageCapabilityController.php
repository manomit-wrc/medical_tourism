<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\LanguageCapability;
use Auth;
use Input;
use Redirect;
use Session;
use Validator;



class LanguageCapabilityController extends Controller
{
    public function __construct() {
    	
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $langcapabilites = LanguageCapability::where('status', '!=', 2)->orderBy('name','asc')->get();
        //echo "<pre>"; print_r($langcapbes); die;
    	return view('admin.languagecapability.index')->with('langcapabilites',$langcapabilites);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
       return view('admin.languagecapability.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:language_capabilities'
        ]);

        // Getting all data after success validation.
        //dd($request->all());
        $input = $request->all();

        LanguageCapability::create($input);
        Session::flash('message', 'Successfully added!');
        return Redirect::to('/admin/languagecapability');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
       // get the language capability
       $langcapabilites = LanguageCapability::findOrFail($id);
       return view('admin.languagecapability.edit')->with('langcapabilites', $langcapabilites);
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
        $langcap = LanguageCapability::find($id);
        // validate
        $this->validate($request, [
        'name' => 'required|unique:language_capabilities,name,'.$id,  
        ]);

        // Getting all data after success validation.
        $input = $request->all();
        //echo "<pre>"; print_r($input); die;
        $langcap->fill($input)->save();


        // redirect
        Session::flash('message', 'Successfully updated');
        return Redirect::to('/admin/languagecapability');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */    
    /* public function delete(Request $request,$id) {
        if($id) {
            $lng_details = LanguageCapability::find($id);
            if($lng_details) {          
            $lng_details->delete();
            $request->session()->flash("message", "Successfully deleted");
            return redirect('/admin/languagecapability');
            }
        }
    } */
    public function delete(Request $request,$id) {
        if($id) {
            $lng_details = LanguageCapability::find($id);
            $status = '2';
            $lng_details->status = $status; 
            $del = $lng_details->save();
            if($del) {      
                $request->session()->flash("message", "Successfully deleted");
                return redirect('/admin/languagecapability');
            }
        }
    }
    public function ajaxlangchangestatus(Request $request) { 
        $id = $request->id;
        $status = $request->status;     
        $mt = LanguageCapability::find($id);
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
