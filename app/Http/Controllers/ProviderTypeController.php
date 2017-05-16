<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ProviderType;
use Auth;
use Input;
use Redirect;
use Session;
use Validator;

class ProviderTypeController extends Controller
{
    public function __construct() {
    	
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $providertype_data = ProviderType::where('status', '!=',2)->orderBy('id','desc')->get();
        //echo "<pre>"; print_r($providertype_lists); die;
        return view('admin.providertype.index',compact('providertype_data'));
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
       return view('admin.providertype.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
       $this->validate($request, [
        'name' => 'required|unique:provider_types'
      ]);

      // Getting all data after success validation.
      //dd($request->all());
      $input = $request->all();

      ProviderType::create($input);
      Session::flash('message', 'Successfully added!');
      return Redirect::to('/admin/providertype');
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
       // get the provider types
       $providertypes_data = ProviderType::findOrFail($id);
       return view('admin.providertype.edit')->with('providertypes_data', $providertypes_data);
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
        $provdrtp = ProviderType::find($id);
        // validate
        $this->validate($request, [
        'name' => 'required|unique:provider_types,name,'.$id
        ]);

        // Getting all data after success validation.
        $input = $request->all();
        //echo "<pre>"; print_r($input); die;
        $provdrtp->fill($input)->save();


        // redirect
        Session::flash('message', 'Successfully updated');
        return Redirect::to('/admin/providertype');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */

   /* public function destroy($id)
    {
       //echo $id; die;
       // delete
        $provdrtp = ProviderType::findOrFail($id);
        $provdrtp->delete();
        Session::flash('message', 'Successfully deleted');
        return Redirect::to('/admin/providertype');
    }*/
   /* public function delete(Request $request,$id) {
        if($id) {
            $provdrtp = ProviderType::find($id);
            if($provdrtp) {                         
                $provdrtp->delete();
                $request->session()->flash("message", "Successfully deleted");
                return redirect('/admin/providertype');
            }
        }
    } */
    public function delete(Request $request,$id) {
        if($id) {
            $provdrtp = ProviderType::find($id);
            $status = '2';
            $provdrtp->status = $status; 
            $del = $provdrtp->save();
            if($del) {      
                $request->session()->flash("message", "Successfully deleted");
                return redirect('/admin/providertype');
            }
        }
    }
    public function ajaxprotypechangestatus(Request $request) { 
        $id = $request->id;
        $status = $request->status;     
        $mt = ProviderType::find($id);
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
