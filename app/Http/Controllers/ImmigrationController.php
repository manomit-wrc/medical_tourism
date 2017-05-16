<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Immigration;
use App\Country;
use App\State;
use App\City;
use Auth;
use Input;
use Redirect;
use Session;
use Validator;

class ImmigrationController extends Controller
{
    public function __construct() {

    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $immigration_lists = Immigration::where('status', '!=', 2)->get();
        //echo "<pre>"; print_r($immigration_lists); die;
        return view('admin.immigration.index')->with('immigration_lists',$immigration_lists);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
       $countries = Country::orderBy('name')->pluck('name', 'id')->all();
       //echo "<pre>"; print_r($countries); die;
       return view('admin.immigration.create', compact('countries'));	
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
	      //print_r($request->input()); die;
          $this->validate($request, [
            'name' => 'required',
            'designation' => 'required',
            'address' => 'required',
            'country_id' => 'required',
            'state_id' => 'required',
            'city_id' => 'required',
            'telephone' => 'required',
            'email' => 'required|email',
          ]);


            $immig = new Immigration($request->input()) ;
            $immig->name = $request->get('name') ;
            $immig->designation = $request->get('designation') ;
            $immig->address = $request->get('address') ;
            $immig->country_id = $request->get('country_id') ;
            $immig->state_id = $request->get('state_id') ;
            $immig->city_id = $request->get('city_id') ;
            $immig->telephone = $request->get('telephone') ;
            $immig->email = $request->get('email') ;

            

            $immig->save() ;

          Session::flash('message', 'Successfully added!');
          return Redirect::to('/admin/immigration');
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
        // get the immigration
       $immigration_data = Immigration::findOrFail($id);
       $countries = Country::orderBy('name')->pluck('name', 'id')->all();
       $states = State::orderBy('name')->pluck('name', 'id')->all();
       $cities = City::orderBy('name')->pluck('name', 'id')->all();
       return view('admin.immigration.edit', compact('immigration_data','countries','states','cities'));
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
        $immgi = Immigration::find($id);
        // validate
        $this->validate($request, [
            'name' => 'required',
            'designation' => 'required',
            'address' => 'required',
            'country_id' => 'required',
            'state_id' => 'required',
            'city_id' => 'required',
            'telephone' => 'required',
            'email' => 'required|email',
        ]);

        // Getting all data after success validation.
        $immgi->name = $request->get('name') ;
        $immgi->designation = $request->get('designation') ;
        $immgi->address = $request->get('address') ;
        $immgi->country_id = $request->get('country_id') ;
        $immgi->state_id = $request->get('state_id') ;
        $immgi->city_id = $request->get('city_id') ;
        $immgi->telephone = $request->get('telephone') ;
        $immgi->email = $request->get('email') ;

        

        $immgi->save() ;


        // redirect
        Session::flash('message', 'Successfully updated');
        return Redirect::to('/admin/immigration');
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
        $immigrationobj = Immigration::findOrFail($id);
        $immigrationobj->delete();

        // redirect
        Session::flash('message', 'Successfully deleted');
        return Redirect::to('/admin/immigration');
    }*/
    public function delete(Request $request,$id) {
        if($id) {
            $immigrationobj = Immigration::find($id);
            $status = '2';
            $immigrationobj->status = $status; 
            $del = $immigrationobj->save();
            if($del) {      
                $request->session()->flash("message", "Successfully deleted");
                return redirect('/admin/immigration');
            }
        }
    } 
}
