<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;

class ProcedureController extends Controller
{
    public function __construct() {
    	$this->middleware('auth');
    }
    public function index() {
    	//$user_data = Auth::user();
        //Session::put('name',$user_data->name);
    	return view('admin.procedure.index');
    }
}
