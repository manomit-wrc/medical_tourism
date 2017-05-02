<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Genericmedicine;
use Auth;
use Input;
use Redirect;
use Session;
use Validator;

class GenericmedicineController extends Controller
{
    public function __construct() {
    	
    }
	public function index() {
        $genericmedicine = Genericmedicine::all();
        //echo "<pre>"; print_r($langcapbes); die;
    	return view('admin.genericmedicine.index')->with('genericmedicine',$genericmedicine);
    }

   public function create()
    {
    	$procedure_list = \App\Procedure::get()->pluck('name','id')->toArray();
       //	return view('admin.genericmedicine.create');
       return view('admin.genericmedicine.create')->with(['procedure_list'=>$procedure_list]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
        'generic_name_of_the_medicine' => 'required|unique:genericmedicines',
        'unit' => 'required',
        'price' => 'required',
        'procedure_id' => 'required'
      ]);

       	$gems = new Genericmedicine();
       	$gems->generic_name_of_the_medicine = $request->generic_name_of_the_medicine;
       	$gems->unit = $request->unit;
       	$gems->price = $request->price;
       	$gems->save();
      	$gems->procedures()->attach($request->procedure_id);
      	Session::flash('message', 'Successfully added!');
      	return Redirect::to('/admin/genericmedicine');
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
       // get the language capability
       $langcapabilites = LanguageCapability::findOrFail($id);
       return view('admin.languagecapability.edit')->with('langcapabilites', $langcapabilites);
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
        $langcap = LanguageCapability::find($id);
        // validate
        $this->validate($request, [
        'name' => 'required|unique:language_capabilities'
        ]);

        // Getting all data after success validation.
        $input = $request->all();
        //echo "<pre>"; print_r($input); die;
        $langcap->fill($input)->save();


        // redirect
        Session::flash('message', 'Successfully updated');
        return Redirect::to('/admin/languagecapability');
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
        $langcap = LanguageCapability::findOrFail($id);
        $langcap->delete();

        // redirect
        Session::flash('message', 'Successfully deleted');
        return Redirect::to('/admin/languagecapability');
    }
}
