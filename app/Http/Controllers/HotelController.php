<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Hotel;
use App\HotelClassType;
use App\Country;
use Auth;
use Input;
use Redirect;
use Session;
use Validator;


class HotelController extends Controller
{
    public function __construct() {
    	
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $hotels_list = Hotel::all();
        //echo "<pre>"; print_r($hotels_list); die;
        return view('admin.hotel.index')->with('hotels_list',$hotels_list);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
       $countries = Country::orderBy('name')->pluck('name', 'id')->all();
       $hotelclasstypes = HotelClassType::orderBy('id')->pluck('name', 'id')->all();	
       return view('admin.hotel.create', compact('countries', 'hotelclasstypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
        'name' => 'required',
        'address' => 'required',
        'country_id' => 'required',
        'state_id' => 'required',
        'city_id' => 'required',
        'hotel_class_id' => 'required',
        'no_of_rooms' => 'required|numeric',
        'min_price_per_night' => 'required',
        'max_price_per_night' => 'required',
      ]);

      // Getting all data after success validation.
      //dd($request->all());
      $input = $request->all();

      Hotel::create($input);
      Session::flash('message', 'Successfully added!');
      return Redirect::to('/admin/hotel');
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
       $accomodations_data = Hotel::findOrFail($id);
       return view('admin.hotel.edit')->with('accomodations_data', $accomodations_data);
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
        $langcap = Hotel::find($id);
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
        return Redirect::to('/admin/hotel');
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
        $procobj = Hotel::findOrFail($id);
        $procobj->delete();

        // redirect
        Session::flash('message', 'Successfully deleted');
        return Redirect::to('/admin/hotel');
    }
}
