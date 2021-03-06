<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SpecificService;
use Auth;
use Input;
use Redirect;
use Session;
use Validator;

class SpecificServiceController extends Controller
{
    public function __construct() {
    	
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $langcapabilites = SpecificService::where('status', '!=', 2)->orderBy('name','asc')->get();
        //echo "<pre>"; print_r($langcapbes); die;
    	return view('admin.specificservice.index')->with('langcapabilites',$langcapabilites);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
       return view('admin.specificservice.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
       $this->validate($request, [
        'name' => 'required|unique:specific_services'
      ]);

      // Getting all data after success validation.
      //dd($request->all());
      $input = $request->all();

      SpecificService::create($input);
      Session::flash('message', 'Successfully added!');
      return Redirect::to('/admin/specificservice');
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
       // get the specific services
       $specificsrves = SpecificService::findOrFail($id);
       return view('admin.specificservice.edit')->with('specificsrves', $specificsrves);
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
        $specserv = SpecificService::find($id);
        // validate
        $this->validate($request, [
        'name' => 'required|unique:specific_services,name,'.$id
        ]);

        // Getting all data after success validation.
        $input = $request->all();
        //echo "<pre>"; print_r($input); die;
        $specserv->fill($input)->save();


        // redirect
        Session::flash('message', 'Successfully updated');
        return Redirect::to('/admin/specificservice');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
   
   /* public function delete(Request $request,$id) {
        if($id) {
            $specserv = SpecificService::find($id);
            if($specserv) {                          
                $specserv->delete();
                $request->session()->flash("message", "Successfully deleted");
                return redirect('/admin/specificservice');
            }
        }
    } */
     public function delete(Request $request,$id) {
        if($id) {
            $specserv = SpecificService::find($id);            
            $status = '2';
            $specserv->status = $status; 
            $del = $specserv->save();
            if($del) {                       
                 $request->session()->flash("message", "Successfully deleted");
                return redirect('/admin/specificservice');
            }
        }
    }
    public function ajaxspeserchangestatus(Request $request) { 
        $id = $request->id;
        $status = $request->status;     
        $mt = SpecificService::find($id);
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
