<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\HomePageContent;
use App\Banner;
use App\Procedure;
use App\MedicalFacility;


class HomeController extends Controller
{
    public function __construct() {

    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $homepagecondata = HomePageContent::all();
        //echo "<pre>"; print_r($homepagecondata[0]->medical_category_description); die;
        $banner_lists = Banner::all();
        //echo "<pre>"; print_r($banner_lists); die;
        $procedure_lists = Procedure::all();
        //echo "<pre>"; print_r($langcapbes); die;
        $medicalfacility_lists = MedicalFacility::all();
        //echo "<pre>"; print_r($medicalfacility_lists); die;
        return view('pages.home', compact('banner_lists', 'procedure_lists','medicalfacility_lists','homepagecondata'));
    }
}
