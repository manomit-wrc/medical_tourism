<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MedicalFacility;
use App\News;

class PagesController extends Controller
{
    public function __construct()
    {

    }

	public function about()
	{
		return view('pages.about');
	}

	public function services()
	{
        $service_lists = MedicalFacility::all();
        //echo "<pre>"; print_r($service_lists); die;
        return view('pages.services')->with('service_lists',$service_lists);
	}
	public function servicedetails($id)
	{
		$service_data = MedicalFacility::findOrFail($id);
		//echo "<pre>"; print_r($service_data); die;
        return view('pages.servicedetails')->with('service_data', $service_data);
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
    public function news()
	{
        $news_lists = News::all();
        //echo "<pre>"; print_r($news_lists); die;
        return view('pages.news')->with('news_lists',$news_lists);
	}
	
	public function newsdetails($id)
	{
		$news_data = News::findOrFail($id);
		//echo "<pre>"; print_r($news_data); die;
        return view('pages.newsdetails')->with('news_data',$news_data);
	}
}
