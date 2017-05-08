<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ContactUS;

use Input;
use Redirect;
use Session;
use Validator;


class ContactUSController extends Controller
{
     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index() {
        $contactusdata = ContactUS::all();
        /* echo "<pre>"; print_r($contactusdata); die;*/
        return view('admin.contact.index')->with('contactusdata',$contactusdata);
    }
    public function contact()
    {
        return view('pages.contact');

    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function contactUSPost(Request $request)
    {

        $this->validate($request, [
        		'name' => 'required',
        		'email' => 'required|email',
        		'mobile_no' => 'required',
        		'subject' => 'required',
        		'message' => 'required'
        	]);


        ContactUS::create($request->all());

        Session::flash('message', 'Thanks for contacting us!');
        return Redirect::to('/contact');
        //return back()->with('success', 'Thanks for contacting us!');

    }
}
