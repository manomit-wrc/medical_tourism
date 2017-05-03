<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        return view('pages.home');
    }
}
