<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ProviderConnectivityServices;
use App\Connectivity;
use App\ConnectivityServices;
use App\ProviderConnectivity;
use Auth;
use Input;
use Redirect;
use Session;
use Validator;


class ProviderConnectivityServicesController extends Controller
{
    public function __construct() {
    	
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $conn_services_lists = ProviderConnectivityServices::where('status', '!=', 2)->get();
        //echo "<pre>"; print_r($conn_lists); die;
        return view('admin.providerconnectivityservices.index')->with('conn_services_lists',$conn_services_lists);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
       //$pro_conn_data = ProviderConnectivity::all();
       //echo "<pre>"; print_r($pro_conn_data[0]); print_r($pro_conn_data[0]->connectivity); die;
       $pro_conn_data = ProviderConnectivity::orderBy('name')->pluck('name', 'id')->all();
       //echo "<pre>"; print_r($pro_conn_data); die;
       $connectivity_serv_data = ConnectivityServices::orderBy('name')->pluck('name', 'id')->all();
       //echo "<pre>"; print_r($connectivity_serv_data); die;
       return view('admin.providerconnectivityservices.create', compact('pro_conn_data','connectivity_serv_data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
      //echo "<pre>"; print_r($request->all()); die;
    	/*echo "<pre>"; print_r($request->get('connectivity_service_id')); die;*/
      $this->validate($request, [
        'provider_connectivity_id' => 'required',
        'connectivity_service_id' => 'required',
        'description' => 'required',
      ]);

      // Getting all data after success validation.
       
       $proconnserobj = new ProviderConnectivityServices($request->input()) ;
      
       $proconnserobj->provider_connectivity_id = $request->get('provider_connectivity_id') ;
       $proconnserobj->connectivityservices()->attach($request->get('connectivity_service_id'));
       $proconnserobj->description = attach($request->get('description'));
       $proconnserobj->save() ;

      
      Session::flash('message', 'Successfully added!');
      return Redirect::to('/admin/providerconnectivityservices');
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
        // get the degree
       $connectivity_data = Connectivity::orderBy('name')->pluck('name', 'id')->all(); 
       $provconn_data = ProviderConnectivity::findOrFail($id);
       return view('admin.providerconnectivity.edit', compact('connectivity_data','provconn_data'));
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
        $proconnobj = ProviderConnectivity::find($id);
        // validate
           $this->validate($request, [
            'connectivity_id' => 'required',
            'name' => 'required',
            'distance' => 'required',
          ]);

        // Getting all data after success validation.
       $proconnobj->connectivity_id = $request->get('connectivity_id') ;
       $proconnobj->name = $request->get('name') ;
       $proconnobj->distance = $request->get('distance') ;
       $proconnobj->save() ;


        // redirect
        Session::flash('message', 'Successfully updated');
        return Redirect::to('/admin/providerconnectivity');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */

    public function delete(Request $request,$id) {
        if($id) {
            $procobj = ProviderConnectivityServices::find($id);
            $status = '2';
            $procobj->status = $status; 
            $del = $procobj->save();
            if($del) {      
                $request->session()->flash("message", "Successfully deleted");
                return redirect('/admin/providerconnectivityservices');
            }
        }
    }

     public function ajaxproviconservchangestatus(Request $request) { 
        $id = $request->id;
        $status = $request->status;     
        $mt = ProviderConnectivityServices::find($id);
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
