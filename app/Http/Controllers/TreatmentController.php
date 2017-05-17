<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Procedure;
use App\Treatment;
use Auth;
use Input;
use Redirect;
use Session;
use Validator;

class TreatmentController extends Controller
{
    public function __construct() {

    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
    	$treatment_datas = Treatment::where('status', '!=', 2)->orderBy('id','desc')->get();
        //print_r($treatment_datas[0]->procedure->name); die;
        //echo "<pre>"; print_r($treatment_datas); die;
        return view('admin.treatment.index')->with('treatment_datas',$treatment_datas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
       $procedure_lists = Procedure::where('status', 1)->orderBy('name')->pluck('name', 'id');
       //echo "<pre>"; print_r($procedure_lists); die;
       return view('admin.treatment.create')->with('procedure_lists',$procedure_lists);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
        'name' => 'required|unique:treatments',
        'procedure_id' => 'required'
      ]);

      // Getting all data after success validation.
      //dd($request->all());
      $input = $request->all();

      Treatment::create($input);
      Session::flash('message', 'Successfully added!');
      return Redirect::to('/admin/treatment');
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

       $procedure_lists = Procedure::where('status', 1)->orderBy('name')->pluck('name', 'id');
       //echo "<pre>"; print_r($procedure_lists); die;
       // get the treatment
       $treatment_datas = Treatment::findOrFail($id);
       return view('admin.treatment.edit')->with(array('treatment_datas'=> $treatment_datas,'procedure_lists'=> $procedure_lists));
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
        $trtmnt = Treatment::find($id);
        // validate
        $this->validate($request, [
        'name' => 'required|unique:treatments,name,'.$id,
        'procedure_id' => 'required'
        ]);

        // Getting all data after success validation.
        $input = $request->all();
        //echo "<pre>"; print_r($input); die;
        $trtmnt->fill($input)->save();


        // redirect
        Session::flash('message', 'Successfully updated');
        return Redirect::to('/admin/treatment');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */

   /* public function destroy($id)
    {        
        $trtmntobj = Treatment::findOrFail($id);
        $trtmntobj->delete();

        // redirect
        Session::flash('message', 'Successfully deleted');
        return Redirect::to('/admin/treatment');
    } */
   /* public function delete(Request $request,$id) {
      if($id) {
        $tre_details = Treatment::find($id);
        if($tre_details) {          
          $tre_details->delete();
          $request->session()->flash("message", "Successfully deleted");
          return redirect('/admin/treatment');
        }
      }
    } */
    public function delete(Request $request,$id) {
        if($id) {
            $tre_details = Treatment::find($id);
            $status = '2';
            $tre_details->status = $status; 
            $del = $tre_details->save();
            if($del) {      
                $request->session()->flash("message", "Successfully deleted");
                return redirect('/admin/treatment');
            }
        }
    }
    public function ajaxtreatchangestatus(Request $request) { 
        $id = $request->id;
        $status = $request->status;     
        $mt = Treatment::find($id);
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
