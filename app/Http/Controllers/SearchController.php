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
    	})->orderBy('hospitals.name')->get();
    	 //echo "<pre>"; print_r($search_data[0]->country->name); die();
        //echo "<pre>"; print_r($search_data); die();
        /*$locations=[
            ['city'=>'kolkata','lat'=> -33.890542,'longi'=> 151.274856,'ord'=> 4],
            ['city'=>'Durgapur','lat'=> -33.923036,'longi'=> 151.259052, 'ord'=> 5],
            ['city'=>'Murarai','lat'=> -34.028249,'longi'=> 151.157507, 'ord'=> 3],
            ['city'=>'Manly Beach','lat'=> -33.80010128657071,'longi'=> 151.28747820854187,'ord'=>  2],
            ['city'=>'Maroubra Beach','lat'=> -33.950198, 'longi'=>151.259302, 'ord'=> 1]
        ];*/

         $locations = array();
         $i=1;
         foreach($search_data as $key=>$value) {
            //echo $value->country->name; die;
            $locations[] = array('city'=>$value->name,'lat'=>$value->hosp_latitude,'longi'=>$value->hosp_longitude,'ord'=> $i);
            $i++;
         }
        //echo "<pre>"; print_r($locations); die();
    	//return view('pages.searchdata')->with('search_data',$search_data);
        return view('pages.searchdata',compact('search_data','locations'));
    }
    public function hospitalsearch_res(Request $request) {
        $select_treatment = $request->select_treatment;
        $select_procedure = $request->select_procedure;
        $search_val = $request->search_val;      
        $txt_search = $request->txt_search;
        /*echo $select_treatment." ".$select_procedure." ".$txt_search;
        die();*/
        if($txt_search!=''){
            $city_data = City::where('name',$txt_search)->get();
            $cityid = $city_data[0]->id;
        }else{
            $cityid ='';
        }
       
        $search_data = \App\Hospital::whereHas('city',function($res) use($txt_search) {
            $res->where('name','like','%'.$txt_search.'%');

        })->where('hospitals.name','like','%'.$search_val.'%')->where('hospitals.city_id',$cityid)->orderBy('hospitals.name')->get();
        $locations = array();
         $i=1;
         foreach($search_data as $key=>$value) {
            //echo $value->country->name; die;
            $locations[] = array('city'=>$value->name,'lat'=>$value->hosp_latitude,'longi'=>$value->hosp_longitude,'ord'=> $i);
            $i++;
         }
        return view('pages.ajaxsearchdata',compact('search_data'));
    }
    public function hospitalsearch_resmap(Request $request) {
        $select_treatment = $request->select_treatment;
        $select_procedure = $request->select_procedure;
        $search_val = $request->search_val;
        $txt_search = $request->txt_search;
        if($txt_search!=''){
            $city_data = City::where('name',$txt_search)->get();
            $cityid = $city_data[0]->id;
        }else{
            $cityid ='';
        }
        $search_data = \App\Hospital::whereHas('city',function($res) use($txt_search) {
            $res->where('name','like','%'.$txt_search.'%');

        })->where('hospitals.name','like','%'.$search_val.'%')->where('hospitals.city_id',$cityid)->orderBy('hospitals.name')->get();
        $locations = array();
         $i=1;
         foreach($search_data as $key=>$value) {
            //echo $value->country->name; die;
            $locations[] = array('city'=>$value->name,'lat'=>$value->hosp_latitude,'longi'=>$value->hosp_longitude,'ord'=> $i);
            $i++;
         }
        return view('pages.ajaxsearchmap',compact('locations'));
    }
}
