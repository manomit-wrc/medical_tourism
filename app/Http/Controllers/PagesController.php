<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    
	public function about()
	{
		return view('pages.about');
	}

	public function services()
	{
		return view('pages.services');
	}
	public function servicedetails()
	{
		return view('pages.servicedetails');
	}
	public function enquiry()
	{
		return view('pages.enquiry');
	}

	public function facilities()
	{
		return view('pages.facilities');
	}

	public function doctors()
	{
		return view('pages.doctors');
	}

	public function contact()
	{
		return view('pages.contact');
	}
}
