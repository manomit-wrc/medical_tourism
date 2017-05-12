<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PackageType;
use Validator;
use Auth;

class PackageTypeController extends Controller
{
    public function __construct() {

    }

    public function index() {
      $package_type_list = PackageType::where('status', '!=', 2)->get();
      return view('admin.package_types.index')->with('package_type_list',$package_type_list);
    }
    public function create() {
      return view('admin.package_types.create');
    }
    public function store(Request $request) {
      Validator::make($request->all(), [
        'name' => 'required|max:200',
        'ckeditor' => 'required'
    ],[
      'name.required' => 'Please enter package type name',
      'ckeditor.required' => 'Please enter description'
      ])->validate();

      $package = new PackageType();
      $package->name = $request->name;
      $package->description = $request->ckeditor;
      $package->user_id = Auth::guard('admin')->user()->id;

      if($package->save()) {
        $request->session()->flash("message", "Package type addedd successfully");
        return redirect('/admin/package-types');
      }

    }

    public function edit($id) {
      if($id) {
        $package_details = PackageType::find($id);
        return view('admin.package_types.edit')->with('package_details',$package_details);
      }
    }

    public function update(Request $request, $id) {
      Validator::make($request->all(), [
        'name' => 'required|max:200',
        'ckeditor' => 'required'
      ],[
      'name.required' => 'Please enter package type name',
      'ckeditor.required' => 'Please enter description'
      ])->validate();

      $package_details = PackageType::find($id);
      if($package_details) {
        $package_details->name = $request->name;
        $package_details->description = $request->ckeditor;
        $package_details->status = $request->status;
        $package_details->user_id = Auth::guard('admin')->user()->id;

        $package_details->save();

        $request->session()->flash("message", "Package type updated successfully");
        return redirect('/admin/package-types');
      }
    }

    /*public function delete(Request $request, $id) {
      if($id) {
        if(PackageType::find($id)->delete()) {
          $request->session()->flash("message", "Package type deleted successfully");
          return redirect('/admin/package-types');
        }
      }
    }*/
    public function delete(Request $request,$id) {
        if($id) {
            $PackageType = PackageType::find($id);
            $status = '2';
            $PackageType->status = $status; 
            $del = $PackageType->save();
            if($del) {      
                $request->session()->flash("message", "Successfully deleted");
                return redirect('/admin/package-types');
            }
        }
    }
}
