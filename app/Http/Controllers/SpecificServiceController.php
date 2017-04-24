<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SpecificService;
use Auth;
use Input;
use Redirect;
use Session;
use Validator;

class SpecificServiceController extends Controller
{
    public function __construct() {
    	
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $langcapabilites = SpecificService::all();
        //echo "<pre>"; print_r($langcapbes); die;
    	return view('admin.specificservice.index')->with('langcapabilites',$langcapabilites);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
       return view('admin.specificservice.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
       $this->validate($request, [
        'name' => 'required|unique:specific_services'
      ]);

      // Getting all data after success validation.
      //dd($request->all());
      $input = $request->all();

      SpecificService::create($input);
      Session::flash('message', 'Successfully added!');
      return Redirect::to('/admin/specificservice');
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
       // get the specific services
       $specificsrves = SpecificService::findOrFail($id);
       return view('admin.specificservice.edit')->with('specificsrves', $specificsrves);
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
        $specserv = SpecificService::find($id);
        // validate
        $this->validate($request, [
        'name' => 'required|unique:specific_services'
        ]);

        // Getting all data after success validation.
        $input = $request->all();
        //echo "<pre>"; print_r($input); die;
        $specserv->fill($input)->save();


        // redirect
        Session::flash('message', 'Successfully updated');
        return Redirect::to('/admin/specificservice');
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
        $specserv = SpecificService::findOrFail($id);
        $specserv->delete();

        // redirect
        Session::flash('message', 'Successfully deleted');
        return Redirect::to('/admin/specificservice');
    }
}
