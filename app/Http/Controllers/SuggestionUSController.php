<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SuggestionUS;
use Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\SuggestionMail;
use Input;
use Redirect;
use Session;
use Validator;

class SuggestionUSController extends Controller
{
     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index() {
        $suggusdata = SuggestionUS::all();
        /* echo "<pre>"; print_r($suggusdata); die;*/
        return view('admin.suggestion.index')->with('suggusdata',$suggusdata);
    }
    public function details($id)
    {
        $suggestiondata = SuggestionUS::where('id',$id)->get()->toArray();
        $data['contactdata'] =$suggestiondata; 
        /*print_r($data['contactdata']); die();   */   
        return view('admin.suggestion.edit',$data);      
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function suggestionUSPost(Request $request)
    {

        $this->validate($request, [
        		'name' => 'required',
        		'email' => 'required|email',
        		'mobile_no' => 'required',
        		'subject' => 'required',
        		'message' => 'required'
        	]);


        $save=SuggestionUS::create($request->all());
        if($save->id>0)
        {
            $sendmail = $request->input('email');
            $name = $request->input('name');
            $sendmessage='Thank you for your valuable suggestions.';
            Mail::to($sendmail)->send(new SuggestionMail($sendmessage,$name));
            Session::flash('message', 'Thanks for your suggestion!');
            return Redirect::to('/suggestion'); 
        }
    }
}
