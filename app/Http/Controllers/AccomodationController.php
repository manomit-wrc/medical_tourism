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
        $accomodation_lists = Accomodation::all();
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
        // validate
        $this->validate($request, [
        'name' => 'required|unique:accomodations'
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

    public function destroy($id)
    {
        //echo $id; die;
       // delete
        $procobj = Accomodation::findOrFail($id);
        $procobj->delete();

        // redirect
        Session::flash('message', 'Successfully deleted');
        return Redirect::to('/admin/accomodation');
    }
}