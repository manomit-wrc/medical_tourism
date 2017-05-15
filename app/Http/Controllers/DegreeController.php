<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Degree;
use Auth;
use Input;
use Redirect;
use Session;
use Validator;

class DegreeController extends Controller
{
    public function __construct() {
    	
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $deg_lists = Degree::where('status', '!=', 2)->get();
        //echo "<pre>"; print_r($langcapbes); die;
        return view('admin.degree.index')->with('deg_lists',$deg_lists);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
       return view('admin.degree.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
        'name' => 'required|unique:degrees'
      ]);

      // Getting all data after success validation.
      //dd($request->all());
      $input = $request->all();

      Degree::create($input);
      Session::flash('message', 'Successfully added!');
      return Redirect::to('/admin/degree');
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
       $degrees_data = Degree::findOrFail($id);
       return view('admin.degree.edit')->with('degrees_data', $degrees_data);
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
        $langcap = Degree::find($id);
        // validate
        $this->validate($request, [
        'name' => 'required|unique:degrees,name,'.$id
        ]);

        // Getting all data after success validation.
        $input = $request->all();
        //echo "<pre>"; print_r($input); die;
        $langcap->fill($input)->save();


        // redirect
        Session::flash('message', 'Successfully updated');
        return Redirect::to('/admin/degree');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
   
    /*public function delete(Request $request,$id) {
        if($id) {
            $procobj = Degree::find($id);
            if($procobj) {                         
                $procobj->delete();
                $request->session()->flash("message", "Successfully deleted");
                return redirect('/admin/degree');
            }
        }
    }*/
    public function delete(Request $request,$id) {
        if($id) {
            $procobj = Degree::find($id);
            $status = '2';
            $procobj->status = $status; 
            $del = $procobj->save();
            if($del) {      
                $request->session()->flash("message", "Successfully deleted");
                return redirect('/admin/degree');
            }
        }
    }

    public function ajaxdegreechangestatus(Request $request) { 
        $id = $request->id;
        $status = $request->status;     
        $mt = Degree::find($id);
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
