<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Accrediation;
use Auth;
use Input;
use Redirect;
use Session;
use Validator;

class AccrediationController extends Controller
{
     public function __construct() {
    	$this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $accrediation_lists = Accrediation::all();
        //echo "<pre>"; print_r($accrediation_lists); die;
        return view('admin.accrediation.index')->with('accrediation_lists',$accrediation_lists);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
       return view('admin.accrediation.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
	       $this->validate($request, [
	        'name' => 'required|unique:accrediations',
	        'accrediation_logo' => 'required'
	      ]);
       
        $imageName =  rand(11111, 99999) .'.' . $request->file('accrediation_logo')->getClientOriginalExtension();
        //echo $imageName; die;
	    $request->file('accrediation_logo')->move(
	        base_path() . '/uploads/accrediations/', $imageName
	    );
        //echo $imageName; die;
        $accrd = new Accrediation(array(
	      'name' => $request->get('name'),
	      'accrediation_logo' =>$imageName
	    ));

	    $accrd->save();

	    
      
      Session::flash('message', 'Successfully added!');
      return Redirect::to('/admin/accrediation');
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
        // get the Accrediation
       $accrediations_data = Accrediation::findOrFail($id);
       return view('admin.accrediation.edit')->with('accrediations_data', $accrediations_data);
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
        $langcap = Accrediation::find($id);
        // validate
        $this->validate($request, [
        'name' => 'required|unique:accrediations'
        ]);
      
        // Getting all data after success validation. 
        $input = $request->all();
        //echo "<pre>"; print_r($input); die;
        $langcap->fill($input)->save();
         

        // redirect
        Session::flash('message', 'Successfully updated');
        return Redirect::to('/admin/accrediation');
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
        $procobj = Accrediation::findOrFail($id);
        $procobj->delete();

        // redirect
        Session::flash('message', 'Successfully deleted');
        return Redirect::to('/admin/accrediation');
    }
}
