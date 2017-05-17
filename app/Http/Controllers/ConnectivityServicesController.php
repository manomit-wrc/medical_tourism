<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ConnectivityServices;
use Auth;
use Input;
use Redirect;
use Session;
use Validator;

class ConnectivityServicesController extends Controller
{
    public function __construct() {

    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
    	$con_srv_data = ConnectivityServices::where('status', '!=', 2)->orderBy('id','desc')->get();
        //echo "<pre>"; print_r($con_srv_data); die;
        return view('admin.connectivityservices.index',compact('con_srv_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
       return view('admin.connectivityservices.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
        'name' => 'required|unique:connectivity_services'
      ]);

      // Getting all data after success validation.
      //dd($request->all());
      $input = $request->all();

      ConnectivityServices::create($input);
      Session::flash('message', 'Successfully added!');
      return Redirect::to('/admin/connectivityservices');
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

       // get the Connectivity
       $conn_srvc_data = ConnectivityServices::findOrFail($id);
       return view('admin.connectivityservices.edit')->with(array('conn_srvc_data'=> $conn_srvc_data));
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
        $connectivity = ConnectivityServices::find($id);
        // validate
        $this->validate($request, [
        'name' => 'required|unique:connectivity_services,name,'.$id
        ]);

        // Getting all data after success validation.
        $input = $request->all();
        //echo "<pre>"; print_r($input); die;
        $connectivity->fill($input)->save();


        // redirect
        Session::flash('message', 'Successfully updated');
        return Redirect::to('/admin/connectivityservices');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */

   /* public function delete(Request $request,$id) {
        if($id) {
            $con_serv_obj = ConnectivityServices::find($id);
            if($con_serv_obj) {                        
                $con_serv_obj->delete();
                $request->session()->flash("message", "Successfully deleted");
                return redirect('/admin/connectivityservices');
            }
        }
    }*/
    public function delete(Request $request,$id) {
        if($id) {
            $con_serv_obj = ConnectivityServices::find($id);
            $status = '2';
            $con_serv_obj->status = $status; 
            $del = $con_serv_obj->save();
            if($del) {      
                $request->session()->flash("message", "Successfully deleted");
                return redirect('/admin/connectivityservices');
            }
        }
    }
    public function ajaxconserchangestatus(Request $request) { 
        $id = $request->id;
        $status = $request->status;     
        $mt = ConnectivityServices::find($id);
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
