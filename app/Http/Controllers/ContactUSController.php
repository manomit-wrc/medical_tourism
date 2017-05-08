<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ContactUS;

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
    public function contactUS()

    {

        return view('contactUS');

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

        		'message' => 'required'

        	]);


        ContactUS::create($request->all());


        return back()->with('success', 'Thanks for contacting us!');

    }
}
