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
   
    //all statelist according as country
    public function getStateList(Request $request)
    {
        $states = State::where("country_id",$request->country_id)->orderBy('name')->pluck('name', 'id')->all();
        return response()->json($states);
    }
     //all citylist according as state
    public function getCityList(Request $request)
    {
        $cities = City::where("state_id",$request->state_id)->orderBy('name')->pluck('name', 'id')->all();
        return response()->json($cities);
    }
     //all country list
    public function getCountry()
    {
        $countries = Country::orderBy('name')->pluck('name', 'id')->all();
        return response()->json($countries);
    }
    //all State list
    public function getState()
    {
        $states = State::orderBy('name')->pluck('name', 'id')->all();
        return response()->json($states);
    }
    //all City list
    public function getCity()
    {
        $cities = City::orderBy('name')->pluck('name', 'id')->all();
        return response()->json($cities);
    }
}
