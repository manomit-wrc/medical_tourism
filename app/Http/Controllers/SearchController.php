<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\City;
use App\State;
use App\Country;

class SearchController extends Controller
{
    public function __construct() {

    }

    public function search_place(Request $request) {
    	if($request->ajax()) {
    		$query = $request->term;
        
	        $cities=City::where('name','LIKE','%'.$query.'%')
	        		->orWhereHas('state', function ($res) use ($query) {
        				$res->where('name', 'like', '%'.$query.'%');
        				$res->orWhereHas('country',function($res) use ($query){
        					$res->where('name', 'like', '%'.$query.'%');
        				});
					})
    				->orderBy('name')->get();
	        
	        $data=array();
	        foreach ($cities as $city) {
	                $data[]=array('value'=>$city->name,'id'=>$city->id);
	        }
	        if(count($data))
	             return $data;
	        else
	            return ['value'=>'No Result Found','id'=>''];
	    	}
    }

    public function search_data(Request $request) {
    	$select_treatment = $request->select_treatment;
    	$select_procedure = $request->select_procedure;
    	$txt_search = $request->txt_search;
    	/*echo $select_treatment." ".$select_procedure." ".$txt_search;
    	die();*/
    	$search_data = \App\Hospital::whereHas('city',function($res) use($txt_search) {
    		$res->where('name','like','%'.$txt_search.'%');

    	})
    	->orWhereHas('treatments',function($res) use($select_treatment,$select_procedure){
    		$res->where('treatments.id',$select_treatment);
    		$res->whereHas('procedure', function($res) use($select_procedure){
    			$res->where('procedures.id',$select_procedure);
    		});
    	})->orderBy('hospitals.name')->get()->toArray();
    	
    	return view('pages.searchdetails')->with('search_data',$search_data);
    }
}
