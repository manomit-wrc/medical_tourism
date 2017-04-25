<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Country;
use App\State;
use App\City;

class CountryStateCityController extends Controller
{
    public function index()
    { 
        $countries = Country::orderBy('name')->pluck('name', 'id')->all();
        return view('admin.api.index',compact('countries'));
    }
    public function getStateList(Request $request)
    {
        $states = State::where("country_id",$request->country_id)->orderBy('name')->pluck('name', 'id')->all();
        return response()->json($states);
    }
    public function getCityList(Request $request)
    {
        $cities = City::where("state_id",$request->state_id)->orderBy('name')->pluck('name', 'id')->all();
        return response()->json($cities);
    }
}
