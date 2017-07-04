<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Enquiry;
use Input;
use Redirect;
use Session;
use Validator;

class EnquiryController extends Controller
{
   /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index() {
        $enqdata = Enquiry::where('status', '!=', 2)->orderBy('full_name','asc')->get();
        /* echo "<pre>"; print_r($enqdata); die;*/
        return view('admin.enquiry.index')->with('enqdata',$enqdata);
    }
    public function enquiry()
    {
        return view('pages.enquiry');

    }
     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function details($id)
    {
        $enqobj = Enquiry::find($id);
        $enqobj->status = 2; //Status 2 for viewed
        $enqobj->save();

        $data['enqdata'] = Enquiry::find($id);
        
        //echo "<pre>"; print_r($enqobj->procedure); die();
        //echo "<pre>"; print_r($enqobj->treatment->name); die();    
        return view('admin.enquiry.edit',$data);      
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function enquiryPost(Request $request)
    {
        //echo "<pre>"; print_r($request); die;
        $this->validate($request, [
        		'full_name' => 'required',
        		'email' => 'required|email',
        		'mobile_no' => 'required',
        		'treatment_id' => 'required',
        		'procedure_id' => 'required',
                'country_id' => 'required',
                'state_id' => 'required',
                'city_id' => 'required',
                'comments' => 'required'
        	]);


        Enquiry::create($request->all());

        Session::flash('message', 'Thanks for enquiry through Swaasthya Bandhav!');
        return Redirect::to('/enquiry');
        //return back()->with('success', 'Thanks for contacting us!');

    }
}
