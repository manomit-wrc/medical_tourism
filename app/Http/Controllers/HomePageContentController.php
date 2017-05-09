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
        'medical_category_description' => 'required'
      	]);

      	// Getting all data after success validation.
      
      	$hompacobj = new HomePageContent($request->input()) ;      
      	$hompacobj->medical_category_description = $request->get('medical_category_description');
      	$hompacobj->accomodation_left_title = $request->get('accomodation_left_title');
     	$hompacobj->save() ;
      	Session::flash('message', 'Successfully added!');
      	return Redirect::to('/admin/homepagecontent');
    }
}
