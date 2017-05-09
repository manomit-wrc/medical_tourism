<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\HomePageContent;
use Auth;
use Input;
use Redirect;
use Session;
use Validator;
use Image;
use File;
class HomePageContentController extends Controller
{
   	public function index() {
       	$homepagecondata = HomePageContent::all();
        /*echo "<pre>"; print_r($homepagecondata); die;*/
        return view('admin.homepagecontent.index')->with('homepagecondata',$homepagecondata);
        /*return view('admin.homepagecontent.index');*/
    }

    public function store(Request $request)
    {    	
        $this->validate($request, [
        'medical_category_description' => 'required',
        'accomodation_left_title' => 'required',
        'accomodation_left_description' => 'required',
        'accomodation_middle_title' => 'required',
        'accomodation_middle_description' => 'required',
        'accomodation_right_title' => 'required',
        'accomodation_right_description' => 'required',
        'accomodation_left_image' => 'image|mimes:jpeg,png,jpg,gif,svg|dimensions:min_width=360,min_height=167',
        'accomodation_middle_image' => 'image|mimes:jpeg,png,jpg,gif,svg|dimensions:min_width=360,min_height=167',
        'accomodation_right_image' => 'image|mimes:jpeg,png,jpg,gif,svg|dimensions:min_width=360,min_height=167',
      	]);
      	$id = $request->id;
      	$existRows = \App\HomePageContent::where('id', '=', $id)->get();
       /* echo count($existRows); die;*/
       	if(count($existRows)>0)
        {
          	$hompacobj =  HomePageContent::find($id);
          	$hompacobj->medical_category_description = $request->medical_category_description;
      		$hompacobj->accomodation_left_title = $request->accomodation_left_title;
      		$hompacobj->accomodation_left_description = $request->accomodation_left_description;
      		$hompacobj->accomodation_middle_title = $request->accomodation_middle_title;
      		$hompacobj->accomodation_middle_description = $request->accomodation_middle_description;
      		$hompacobj->accomodation_right_title = $request->accomodation_right_title;
      		$hompacobj->accomodation_right_description = $request->accomodation_right_description;
      		if($file = $request->hasFile('accomodation_left_image')) {
            	$file = $request->file('accomodation_left_image') ;
            	$fileName = time().'_'.$file->getClientOriginalName() ;
            	//thumb destination path
            	$thumbdestinationPath = public_path().'/uploads/homepagecontent/thumb_360_167' ;
            	$img = Image::make($file->getRealPath());
            	$img->resize(560, 167, function ($constraint){
                $constraint->aspectRatio();
            })->save($thumbdestinationPath.'/'.$fileName);

            //original destination path
            $originaldestinationPath = public_path().'/uploads/homepagecontent/' ;
            $file->move($originaldestinationPath,$fileName);
            $hompacobj->accomodation_left_image = $fileName ;
        	}
	        if($file = $request->hasFile('accomodation_right_image')) {
	            	$file = $request->file('accomodation_right_image') ;
	            	$fileName = time().'_'.$file->getClientOriginalName() ;
	            	//thumb destination path
	            	$thumbdestinationPath = public_path().'/uploads/homepagecontent/thumb_360_167' ;
	            	$img = Image::make($file->getRealPath());
	            	$img->resize(560, 167, function ($constraint){
	                $constraint->aspectRatio();
	            })->save($thumbdestinationPath.'/'.$fileName);

	            //original destination path
	            $originaldestinationPath = public_path().'/uploads/homepagecontent/' ;
	            $file->move($originaldestinationPath,$fileName);
	            $hompacobj->accomodation_right_image = $fileName ;
	        }
	        if($file = $request->hasFile('accomodation_middle_image')) {
	            	$file = $request->file('accomodation_middle_image') ;
	            	$fileName = time().'_'.$file->getClientOriginalName() ;
	            	//thumb destination path
	            	$thumbdestinationPath = public_path().'/uploads/homepagecontent/thumb_360_167' ;
	            	$img = Image::make($file->getRealPath());
	            	$img->resize(560, 167, function ($constraint){
	                $constraint->aspectRatio();
	            })->save($thumbdestinationPath.'/'.$fileName);

	            //original destination path
	            $originaldestinationPath = public_path().'/uploads/homepagecontent/' ;
	            $file->move($originaldestinationPath,$fileName);
	            $hompacobj->accomodation_middle_image = $fileName ;
        	}
     		$hompacobj->save() ; 
        } else{
      		// Getting all data after success validation.      
      		$hompacobj = new HomePageContent($request->input()) ;
      		$hompacobj->medical_category_description = $request->get('medical_category_description');
      		$hompacobj->accomodation_left_title = $request->get('accomodation_left_title');
      		$hompacobj->accomodation_left_description = $request->get('accomodation_left_description');
      		$hompacobj->accomodation_middle_title = $request->get('accomodation_middle_title');
      		$hompacobj->accomodation_middle_description = $request->get('accomodation_middle_description');
      		$hompacobj->accomodation_right_title = $request->get('accomodation_right_title');
      		$hompacobj->accomodation_right_description = $request->get('accomodation_right_description');
      		if($file = $request->hasFile('accomodation_left_image')) {
            	$file = $request->file('accomodation_left_image') ;
            	$fileName = time().'_'.$file->getClientOriginalName() ;
            	//thumb destination path
            	$thumbdestinationPath = public_path().'/uploads/homepagecontent/thumb_360_167' ;
            	$img = Image::make($file->getRealPath());
            	$img->resize(560, 167, function ($constraint){
                $constraint->aspectRatio();
            })->save($thumbdestinationPath.'/'.$fileName);

            //original destination path
            $originaldestinationPath = public_path().'/uploads/homepagecontent/' ;
            $file->move($originaldestinationPath,$fileName);
            $hompacobj->accomodation_left_image = $fileName ;
        	}
	        if($file = $request->hasFile('accomodation_right_image')) {
	            	$file = $request->file('accomodation_right_image') ;
	            	$fileName = time().'_'.$file->getClientOriginalName() ;
	            	//thumb destination path
	            	$thumbdestinationPath = public_path().'/uploads/homepagecontent/thumb_360_167' ;
	            	$img = Image::make($file->getRealPath());
	            	$img->resize(560, 167, function ($constraint){
	                $constraint->aspectRatio();
	            })->save($thumbdestinationPath.'/'.$fileName);

	            //original destination path
	            $originaldestinationPath = public_path().'/uploads/homepagecontent/' ;
	            $file->move($originaldestinationPath,$fileName);
	            $hompacobj->accomodation_right_image = $fileName ;
	        }
	        if($file = $request->hasFile('accomodation_middle_image')) {
	            	$file = $request->file('accomodation_middle_image') ;
	            	$fileName = time().'_'.$file->getClientOriginalName() ;
	            	//thumb destination path
	            	$thumbdestinationPath = public_path().'/uploads/homepagecontent/thumb_360_167' ;
	            	$img = Image::make($file->getRealPath());
	            	$img->resize(560, 167, function ($constraint){
	                $constraint->aspectRatio();
	            })->save($thumbdestinationPath.'/'.$fileName);

	            //original destination path
	            $originaldestinationPath = public_path().'/uploads/homepagecontent/' ;
	            $file->move($originaldestinationPath,$fileName);
	            $hompacobj->accomodation_middle_image = $fileName ;
        	}
     		$hompacobj->save() ; 
      	}      
      	    	
      	Session::flash('message', 'Successfully added!');
      	return Redirect::to('/admin/homepagecontent');
    }
}
