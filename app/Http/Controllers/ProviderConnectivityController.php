<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ProviderConnectivity;
use App\Connectivity;

use Auth;
use Input;
use Redirect;
use Session;
use Validator;

class ProviderConnectivityController extends Controller
{
    public function __construct() {
    	
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $conn_lists = ProviderConnectivity::where('status', '!=', 2)->get();
        //echo "<pre>"; print_r($conn_lists[0]->connectivity); die;
        return view('admin.providerconnectivity.index')->with('conn_lists',$conn_lists);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
       $connectivity_data = Connectivity::orderBy('name')->pluck('name', 'id')->all();
       return view('admin.providerconnectivity.create', compact('connectivity_data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
      
      $this->validate($request, [
        'connectivity_id' => 'required',
        'name' => 'required',
        'distance' => 'required',
      ]);

      // Getting all data after success validation.
      //dd($request->all());
       $proconnobj = new ProviderConnectivity($request->input()) ;
      
       $proconnobj->connectivity_id = $request->get('connectivity_id') ;
       $proconnobj->user_id = Auth::guard('admin')->user()->id;
       $proconnobj->name = $request->get('name') ;
       $proconnobj->distance = $request->get('distance') ;
       $proconnobj->save() ;

      
      Session::flash('message', 'Successfully added!');
      return Redirect::to('/admin/providerconnectivity');
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

   /* public function destroy($id)
    {
        $procobj = ProviderConnectivity::findOrFail($id);
        $procobj->delete();
        Session::flash('message', 'Successfully deleted');
        return Redirect::to('/admin/providerconnectivity');
    }*/

    public function delete(Request $request,$id) {
        if($id) {
            $procobj = ProviderConnectivity::find($id);
            $status = '2';
            $procobj->status = $status; 
            $del = $procobj->save();
            if($del) {      
                $request->session()->flash("message", "Successfully deleted");
                return redirect('/admin/providerconnectivity');
            }
        }
    }
}
