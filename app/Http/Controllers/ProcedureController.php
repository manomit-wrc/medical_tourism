<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Procedure;
use Auth;
use Input;
use Redirect;
use Session;
use Validator;

class ProcedureController extends Controller
{
    public function __construct() {
    	
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $procedure_lists = Procedure::all();
        //echo "<pre>"; print_r($langcapbes); die;
        return view('admin.procedure.index')->with('procedure_lists',$procedure_lists);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
       return view('admin.procedure.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
        'name' => 'required|unique:procedures'
      ]);

      // Getting all data after success validation.
      //dd($request->all());
      $input = $request->all();

      Procedure::create($input);
      Session::flash('message', 'Successfully added!');
      return Redirect::to('/admin/procedure');
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
        // get the procedure
       $procedures_data = Procedure::findOrFail($id);
       return view('admin.procedure.edit')->with('procedures_data', $procedures_data);
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
        $langcap = Procedure::find($id);
        // validate
        $this->validate($request, [
        'name' => 'required|unique:procedures'
        ]);

        // Getting all data after success validation.
        $input = $request->all();
        //echo "<pre>"; print_r($input); die;
        $langcap->fill($input)->save();


        // redirect
        Session::flash('message', 'Successfully updated');
        return Redirect::to('/admin/procedure');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */

    public function destroy($id)
    {
        //echo $id; die;
       // delete
        $procobj = Procedure::findOrFail($id);
        $procobj->delete();

        // redirect
        Session::flash('message', 'Successfully deleted');
        return Redirect::to('/admin/procedure');
    }
}
