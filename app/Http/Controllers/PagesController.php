<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SuccessStories;

class PagesController extends Controller
{
    private $successstory_list;
    public function __construct()
    {
        $this->successstory_list = SuccessStories::all();
    }

	public function about()
	{
		$successstory_lists = $this->successstory_list;
        //return view('pages.about');
		return view('pages.about', compact('successstory_lists'));
	}

	public function services()
	{
		$successstory_lists = $this->successstory_list;
        //return view('pages.services');
		return view('pages.services', compact('successstory_lists'));
	}
	public function servicedetails()
	{
		$successstory_lists = $this->successstory_list;
        //return view('pages.servicedetails');
		return view('pages.servicedetails', compact('successstory_lists'));
	}
	public function enquiry()
	{
		$successstory_lists = $this->successstory_list;
        //return view('pages.enquiry');
		return view('pages.enquiry', compact('successstory_lists'));
	}

	public function facilities()
	{
		$successstory_lists = $this->successstory_list;
        //return view('pages.facilities');
		return view('pages.facilities', compact('successstory_lists'));
	}

	public function doctors()
	{
		$successstory_lists = $this->successstory_list;
        //return view('pages.doctors');
		return view('pages.doctors', compact('successstory_lists'));
	}

	public function contact()
	{
		$successstory_lists = $this->successstory_list;
        //return view('pages.contact');
		return view('pages.contact', compact('successstory_lists'));
	}
}
