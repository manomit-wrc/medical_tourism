<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Connectivity;
use Auth;
use Input;
use Redirect;
use Session;
use Validator;

class ConnectivityController extends Controller
{
    public function __construct() {

    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
    	$connectivity_data = Connectivity::where('status', '!=', 2)->get();
        //echo "<pre>"; print_r($connectivity_data); die;
        return view('admin.connectivity.index')->with('connectivity_data',$connectivity_data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
       return view('admin.connectivity.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
        'name' => 'required|unique:connectivities'
      ]);

      // Getting all data after success validation.
      //dd($request->all());
      $input = $request->all();

      Connectivity::create($input);
      Session::flash('message', 'Successfully added!');
      return Redirect::to('/admin/connectivity');
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
       $connectivity_data = Connectivity::findOrFail($id);
       return view('admin.connectivity.edit')->with(array('connectivity_data'=> $connectivity_data));
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
        $connectivity = Connectivity::find($id);
        // validate
        $this->validate($request, [
        'name' => 'required|unique:connectivities,name,'.$id
        ]);

        // Getting all data after success validation.
        $input = $request->all();
        //echo "<pre>"; print_r($input); die;
        $connectivity->fill($input)->save();


        // redirect
        Session::flash('message', 'Successfully updated');
        return Redirect::to('/admin/connectivity');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    
   /* public function delete(Request $request,$id) {
        if($id) {
            $con_details = Connectivity::find($id);
            if($con_details) {                         
                $con_details->delete();
             $request->session()->flash("message", "Successfully deleted");
                return redirect('/admin/connectivity');
            }
        }
    }*/

    public function delete(Request $request,$id) {
        if($id) {
            $con_details = Connectivity::find($id);
            $status = '2';
            $con_details->status = $status; 
            $del = $con_details->save();
            if($del) {      
                $request->session()->flash("message", "Successfully deleted");
                return redirect('/admin/connectivity');
            }
        }
    }
}
