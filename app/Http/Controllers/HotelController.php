<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Hotel;
use App\HotelClassType;
use App\Country;
use App\State;
use App\City;
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
        $hotels_list = Hotel::where('status', '!=', 2)->orderBy('name','asc')->get();
        //echo "<pre>"; print_r($hotels_list); die; //print_r($hotels_list[0]->city->state->country); die;
        return view('admin.hotel.index',compact('hotels_list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
       $countries = Country::orderBy('name')->pluck('name', 'id')->all();
       $hotelclasstypes = HotelClassType::orderBy('name')->pluck('name', 'id')->all();	
       return view('admin.hotel.create', compact('countries', 'hotelclasstypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'address' => 'required',
            'country_id' => 'required',
            'state_id' => 'required',
            'city_id' => 'required',
            'hotel_class_id' => 'required',
            'no_of_rooms' => 'required|numeric',
            'min_price_per_night' => 'required|numeric',
            'max_price_per_night' => 'required|numeric',
            'booking_url' => 'required|url',
       ],[
        'country_id.required' => 'country field is required',
        'state_id.required' => 'state field is required',
        'city_id.required' => 'city field is required',
        'hotel_class_id.required' => 'hotel class field is required',
        'no_of_rooms.required' => 'rooms field is required'
        ])->validate();

      // Getting all data after success validation.
      /*$input = $request->all();
      dd($input); die();
      Hotel::create($input);*/
      $htl = new Hotel($request->input()) ;
      $htl->name = $request->get('name') ;
      $htl->address = $request->get('address') ;
      $htl->country_id = $request->get('country_id') ;
      $htl->state_id = $request->get('state_id') ;
      $htl->city_id = $request->get('city_id') ;
      $htl->hotel_class_id = $request->get('hotel_class_id') ;
      $htl->no_of_rooms = $request->get('no_of_rooms') ;
      $htl->min_price_per_night = $request->get('min_price_per_night') ;
      $htl->max_price_per_night = $request->get('max_price_per_night') ;
      $htl->booking_url = $request->get('booking_url') ;
      $htl->save() ;

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
        $hotels_data = Hotel::findOrFail($id);
       //echo "<pre>"; print_r($hotels_data->hotelclasstypes); die;
        return view('admin.hotel.show',compact('hotels_data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        // get the Hotel
       $hotels_data = Hotel::findOrFail($id);
       $countries = Country::orderBy('name')->pluck('name', 'id')->all();
       $states = State::orderBy('name')->pluck('name', 'id')->all();
       $cities = City::orderBy('name')->pluck('name', 'id')->all();
       $hotelclasstypes = HotelClassType::orderBy('name')->pluck('name', 'id')->all();    
       return view('admin.hotel.edit', compact('hotels_data','countries','states','cities','hotelclasstypes'));
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
        $htlobj = Hotel::find($id);
        // validate
        Validator::make($request->all(), [
            'name' => 'required',
            'address' => 'required',
            'country_id' => 'required',
            'state_id' => 'required',
            'city_id' => 'required',
            'hotel_class_id' => 'required',
            'no_of_rooms' => 'required|numeric',
            'min_price_per_night' => 'required|numeric',
            'max_price_per_night' => 'required|numeric',
            'booking_url' => 'required|url',
       ],[
        'country_id.required' => 'country field is required',
        'state_id.required' => 'state field is required',
        'city_id.required' => 'city field is required',
        'hotel_class_id.required' => 'hotel class field is required',
        'no_of_rooms.required' => 'rooms field is required'
        ])->validate();

        // Getting all data after success validation.        
        //echo "<pre>"; print_r($request->all()); die;
          $htlobj->name = $request->get('name') ;
          $htlobj->address = $request->get('address') ;
          $htlobj->country_id = $request->get('country_id') ;
          $htlobj->state_id = $request->get('state_id') ;
          $htlobj->city_id = $request->get('city_id') ;
          $htlobj->hotel_class_id = $request->get('hotel_class_id') ;
          $htlobj->no_of_rooms = $request->get('no_of_rooms') ;
          $htlobj->min_price_per_night = $request->get('min_price_per_night') ;
          $htlobj->max_price_per_night = $request->get('max_price_per_night') ;
          $htlobj->booking_url = $request->get('booking_url') ;
          $htlobj->save() ;


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

    /* public function destroy($id)
    {        
        $procobj = Hotel::findOrFail($id);
        $procobj->delete();
        Session::flash('message', 'Successfully deleted');
        return Redirect::to('/admin/hotel');
    } */
    /* public function delete(Request $request,$id) {
        if($id) {
            $procobj = Hotel::find($id);
            if($procobj) {                        
                $procobj->delete();
                $request->session()->flash("message", "Successfully deleted");
                return redirect('/admin/hotel');
            }
        }
    }*/
    public function delete(Request $request,$id) {
        if($id) {
            $procobj = Hotel::find($id);
            $status = '2';
            $procobj->status = $status; 
            $del = $procobj->save();
            if($del) {      
                $request->session()->flash("message", "Successfully deleted");
                return redirect('/admin/hotel');
            }
        }
    }

    public function ajaxhotelchangestatus(Request $request) { 
        $id = $request->id;
        $status = $request->status;     
        $mt = Hotel::find($id);
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
