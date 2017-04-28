<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PackageTypeController extends Controller
{
    public function __construct() {

    }

    public function index() {
      return view('admin.package_types.index');
    }
    public function create() {
      return view('admin.package_types.create');
    }
}
