<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cuisine;
use Auth;
use Input;
use Redirect;
use Session;
use Validator;

class CuisineController extends Controller
{
    public function __construct() {
    	
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $cuisine_lists = Cuisine::where('status', '!=', 2)->orderBy('id','desc')->get();
        //echo "<pre>"; print_r($cuisine_lists); die;
        return view('admin.cuisine.index',compact('cuisine_lists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
       return view('admin.cuisine.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
        'name' => 'required|unique:cuisines'
      ]);

      // Getting all data after success validation.
      //dd($request->all());
      $input = $request->all();

      Cuisine::create($input);
      Session::flash('message', 'Successfully added!');
      return Redirect::to('/admin/cuisine');
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
        // get the cuisines_data
       $cuisines_data = Cuisine::findOrFail($id);
       return view('admin.cuisine.edit')->with('cuisines_data', $cuisines_data);
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
        $langcap = Cuisine::find($id);
        // validate
        $this->validate($request, [
        'name' => 'required|unique:cuisines,name,'.$id
        ]);

        // Getting all data after success validation.
        $input = $request->all();
        //echo "<pre>"; print_r($input); die;
        $langcap->fill($input)->save();


        // redirect
        Session::flash('message', 'Successfully updated');
        return Redirect::to('/admin/cuisine');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */

   /* public function destroy($id)
    {        
        $procobj = Cuisine::findOrFail($id);
        $procobj->delete();
        Session::flash('message', 'Successfully deleted');
        return Redirect::to('/admin/cuisine');
    } */
   /* public function delete(Request $request,$id) {
        if($id) {
            $procobj = Cuisine::find($id);
            if($procobj) {                        
                $procobj->delete();
                $request->session()->flash("message", "Successfully deleted");
                return redirect('/admin/cuisine');
            }
        }
    }*/

    public function delete(Request $request,$id) {
        if($id) {
            $procobj = Cuisine::find($id);
            $status = '2';
            $procobj->status = $status; 
            $del = $procobj->save();
            if($del) {      
                $request->session()->flash("message", "Successfully deleted");
                return redirect('/admin/cuisine');
            }
        }
    }

    public function ajaxcuisinechangestatus(Request $request) { 
        $id = $request->id;
        $status = $request->status;     
        $mt = Cuisine::find($id);
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
