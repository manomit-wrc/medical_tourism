<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\City;
use App\State;
use App\Country;
use App\Treatment;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function __construct() {

    }

    public function search_place(Request $request) {
        if($request->ajax()) {
            $query = $request->term;
        
            /*$cities=City::where('name','LIKE','%'.$query.'%')
                    ->orWhereHas('state', function ($res) use ($query) {
                        $res->where('name', 'like', '%'.$query.'%');
                        $res->orWhereHas('country',function($res) use ($query){
                            $res->where('name', 'like', '%'.$query.'%');                           
                        });
                    })
                    ->orderBy('name')->get();*/
            $cities = Country::select("name")->where('name','LIKE','%'.$query.'%');
            $states = State::select("name")->where('name','LIKE','%'.$query.'%');

            $allcitiesstatescount = City::select("name")->where('name','LIKE','%'.$query.'%')
                    ->union($cities)
                    ->union($states)
                    ->orderBy('name')
                    ->get();        
               
            
            //print_r($allcitiesstatescount); die;
            
            $data=array();
            foreach ($allcitiesstatescount as $citystatecount) {
                    $data[]=array('value'=>$citystatecount->name,'id'=>$citystatecount->id);
            }
            if(count($data))
                 return $data;
            else
                return ['value'=>'No Result Found','id'=>''];
            }
    }

    public function search_treatment(Request $request) {
      
      if($request->ajax()) {
        $procedure_id = $request->procedure_id;
        if($procedure_id) {
          $treatment_list = Treatment::where('procedure_id',$procedure_id)->get()->pluck('name','id')->toArray();
          /*echo "<pre>"; print_r($treatment_list); die;*/
          if($treatment_list) {
            return response()->json(['status' => '1','treatment_list'=>$treatment_list]);
          }
          else {
            return response()->json(['status' => '0','treatment_list'=>array()]);
          }
        }
      }
    }

    public function search_data(Request $request) {
        $select_treatment = $request->select_treatment;
        $select_procedure = $request->select_procedure;
        $txt_search = $request->txt_search;
        //echo $select_treatment." ".$select_procedure." ".$txt_search; die();
        $search_data = \App\Hospital::whereHas('city',function($res) use($txt_search) {
            $res->where('name','like','%'.$txt_search.'%');

        })
        ->orWhereHas('state',function($res) use($txt_search) {
            $res->where('name','like','%'.$txt_search.'%');
        })
         ->orWhereHas('country',function($res) use($txt_search) {
            $res->where('name','like','%'.$txt_search.'%');
        })
        ->orWhereHas('treatments',function($res) use($select_treatment,$select_procedure){
            $res->where('treatments.id',$select_treatment);
            $res->whereHas('procedure', function($res) use($select_procedure){
            $res->where('procedures.id',$select_procedure);
            });
        })->orderBy('hospitals.name')->get();
         //echo "<pre>"; print_r($search_data[0]->city->name); print_r($search_data[0]->country->name); die();
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
            $locations[] = array('hospname'=>$value->name,'lat'=>$value->hosp_latitude,'longi'=>$value->hosp_longitude,'hosid'=>$value->id,'city'=>$value->city->name,'country'=>$value->country->name,'ord'=> $i);
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
       
        //echo $select_treatment." ".$select_procedure." ".$txt_search; die();

        $sql="SELECT hos.id,hos.avators,hos.name,city.name as city_name,stat.name as state_name,cnt.name as country_name FROM hospitals hos";
        if(!empty($select_treatment))
        {
          $sql.=" LEFT JOIN hospital_treatment hostrt ON hos.id=hostrt.hospital_id AND hostrt.treatment_id=".$select_treatment;  
        } 

        if(!empty($select_procedure))
        {
          if(!empty($select_treatment))
          {  
           $sql.="  LEFT JOIN treatments treat ON hostrt.treatment_id=treat.id AND treat.procedure_id=".$select_procedure;  
          }else{
            $sql.=" LEFT JOIN hospital_treatment hostrt ON hos.id=hostrt.hospital_id LEFT JOIN treatments treat ON hostrt.treatment_id=treat.id AND treat.procedure_id=".$select_procedure;  
          }
        }
        if(!empty($txt_search)|| !empty($search_val))
        {
          $sql.=" JOIN countries cnt ON hos.country_id=cnt.id JOIN states stat ON hos.state_id=stat.id  JOIN cities city ON hos.city_id=city.id";  
        }  

        if(!empty($txt_search))
        {
          $sql.="  AND (city.name LIKE  '%".$txt_search."%' OR stat.name LIKE  '%".$txt_search."%' OR cnt.name LIKE  '%".$txt_search."%')";  
        }

        if(!empty($search_val))
        {
          $sql.=" AND (hos.name LIKE  '%".$search_val."%' OR city.name LIKE  '%".$search_val."%' OR stat.name LIKE  '%".$search_val."%' OR cnt.name LIKE  '%".$search_val."%')";  
        }
        //echo $sql; die;
        $search_data = DB::select($sql);
        //echo "<pre>"; print_r($search_data); echo $search_data[0]->id; die;
         
        
        return view('pages.ajaxsearchdata',compact('search_data'));
    }
    public function hospitalsearch_resmap(Request $request) {
        $select_treatment = $request->select_treatment;
        $select_procedure = $request->select_procedure;
        $search_val = $request->search_val;      
        $txt_search = $request->txt_search;
       
        //echo $select_treatment." ".$select_procedure." ".$txt_search; die();

        $sql="SELECT hos.id,hos.avators,hos.name,hos.hosp_latitude,hos.hosp_longitude,city.name as city_name,stat.name as state_name,cnt.name as country_name FROM hospitals hos";
        if(!empty($select_treatment))
        {
          $sql.=" LEFT JOIN hospital_treatment hostrt ON hos.id=hostrt.hospital_id AND hostrt.treatment_id=".$select_treatment;  
        } 

        if(!empty($select_procedure))
        {
          if(!empty($select_treatment))
          {  
           $sql.="  LEFT JOIN treatments treat ON hostrt.treatment_id=treat.id AND treat.procedure_id=".$select_procedure;  
          }else{
            $sql.=" LEFT JOIN hospital_treatment hostrt ON hos.id=hostrt.hospital_id LEFT JOIN treatments treat ON hostrt.treatment_id=treat.id AND treat.procedure_id=".$select_procedure;  
          }
        }
        if(!empty($txt_search)|| !empty($search_val))
        {
          $sql.=" JOIN countries cnt ON hos.country_id=cnt.id JOIN states stat ON hos.state_id=stat.id  JOIN cities city ON hos.city_id=city.id";  
        }  

        if(!empty($txt_search))
        {
          $sql.="  AND (city.name LIKE  '%".$txt_search."%' OR stat.name LIKE  '%".$txt_search."%' OR cnt.name LIKE  '%".$txt_search."%')";  
        }

        if(!empty($search_val))
        {
          $sql.=" AND (hos.name LIKE  '%".$search_val."%' OR city.name LIKE  '%".$search_val."%' OR stat.name LIKE  '%".$search_val."%' OR cnt.name LIKE  '%".$search_val."%')";  
        }
        //echo $sql; die;
        $search_data = DB::select($sql);
      /*  echo "<pre>"; print_r($search_data); die();*/
        $locations = array();
         $i=1;
         foreach($search_data as $key=>$value) {           
            $locations[] = array('hospname'=>$value->name,'lat'=>$value->hosp_latitude,'longi'=>$value->hosp_longitude,'hosid'=>$value->id,'city'=>$value->city_name,'country'=>$value->state_name,'ord'=> $i);
            $i++;
         }
        return view('pages.ajaxsearchmap',compact('locations'));
    }
}
