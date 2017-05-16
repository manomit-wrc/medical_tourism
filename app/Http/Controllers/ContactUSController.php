<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ContactUS;
use Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactSendMail;
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
    public function details($id)
    {
        $conus = ContactUS::find($id);
        $status = '2';
        $conus->status = $status; 
        $conus->save();
        $contactdata = ContactUS::where('id',$id)->get()->toArray();
        $data['contactdata'] =$contactdata; 
        /*print_r($data['contactdata']); die();   */   
        return view('admin.contact.edit',$data);      
    }
    public function sendmail($id)
    {
        if($id){
            $contactdata = ContactUS::where('id',$id)->get()->toArray();
            $data['contactdata'] =$contactdata; 
           /* print_r($data['contactdata']); die(); */ 
            return view('admin.contact.sendmail',$data);
            /* $sendmail = 'sujit@wrctechnologies.com';
            Mail::to($sendmail)->send(new ContactSendMail());
            return Redirect::to('/admin/contact');*/
        }    
    }
    public function send($id,Request $request)
    {
        if($id){
            $contactobj = ContactUS::find($id);
            $this->validate($request, [
                'send_message' => 'required'                
            ]);
            $sendmessage = $request->input('send_message');            
            $contactobj->send_message = $request->input('send_message');           
            $contactobj->send_status = 0;
            if($contactobj->save()) {
                $sendmessage = $sendmessage;
                $contactdata = ContactUS::where('id',$id)->get()->toArray();
                /*print_r($contactdata[0]['email']); die();*/
                $sendmail = $contactdata[0]['email'];
                Mail::to($sendmail)->send(new ContactSendMail($sendmessage));
                Session::flash('message', 'Successfully updated');
                return Redirect::to('/admin/contact');
            }
        }    
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
