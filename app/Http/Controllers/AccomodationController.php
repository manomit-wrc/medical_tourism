<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Accomodation;
use Auth;
use Input;
use Redirect;
use Session;
use Validator;

class AccomodationController extends Controller
{
    public function __construct() {
    	
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $accomodation_lists = Accomodation::where('status', '!=', 2)->get();
        //echo "<pre>"; print_r($accomodation_lists); die;
        return view('admin.accomodation.index')->with('accomodation_lists',$accomodation_lists);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
       return view('admin.accomodation.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
        'name' => 'required|unique:accomodations'
      ]);

      // Getting all data after success validation.
      //dd($request->all());
      $input = $request->all();

      Accomodation::create($input);
      Session::flash('message', 'Successfully added!');
      return Redirect::to('/admin/accomodation');
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
        // get the Accomodation
       $accomodations_data = Accomodation::findOrFail($id);
       return view('admin.accomodation.edit')->with('accomodations_data', $accomodations_data);
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
        $langcap = Accomodation::find($id);
        //echo $id; die;
        // validate
        $this->validate($request, [
        'name' => 'required|unique:accomodations,name,'.$id,
        ]);

        // Getting all data after success validation.
        $input = $request->all();
        //echo "<pre>"; print_r($input); die;
        $langcap->fill($input)->save();


        // redirect
        Session::flash('message', 'Successfully updated');
        return Redirect::to('/admin/accomodation');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */

    /* public function destroy($id)
    {        
        $procobj = Accomodation::findOrFail($id);
        $procobj->delete();        
        Session::flash('message', 'Successfully deleted');
        return Redirect::to('/admin/accomodation');
    } */
   /* public function delete(Request $request,$id) {
        if($id) {
            $procobj = Accomodation::find($id);
            if($procobj) {                        
                $procobj->delete();
                $request->session()->flash("message", "Successfully deleted");
                return redirect('/admin/accomodation');
            }
        }
    }*/
    public function delete(Request $request,$id) {
        if($id) {
            $procobj = Accomodation::find($id);
            $status = '2';
            $procobj->status = $status; 
            $del = $procobj->save();
            if($del) {      
                $request->session()->flash("message", "Successfully deleted");
                return redirect('/admin/accomodation');
            }
        }
    }

    public function ajaxaccomchangestatus(Request $request) { 
        $id = $request->id;
        $status = $request->status;     
        $mt = Accomodation::find($id);
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
