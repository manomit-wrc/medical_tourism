<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    public function __construct() {

    }

    public function index() {
      $data = \App\Role::all();

      return view('admin.role.index')->with('data',$data);
    }

    public function create() {
      return view('admin.role.create');
    }

    public function add(Request $request) {
      $this->validate($request,[
        'role_name' => 'required|max:25',
        'status' => 'required'
      ],[
        'role_name.required' => 'Please enter role name',
        'status.required' => 'Please enter status'
      ]);

      $role = new \App\Role();
      $role->name = $request->role_name;
      $role->status = $request->status;
      if($role->save()) {
        $request->session()->flash("message", "Role addedd successfully");
        return redirect('/admin/role');
      }
    }

    public function edit($id) {
      if($id) {
        $role_details = \App\Role::where('id',$id)->get();
        return view('admin.role.edit')->with('role_details',$role_details);
      }
    }

    public function update(Request $request, $id) {
      if($id) {
        $this->validate($request,[
          'role_name' => 'required|max:25',
          'status' => 'required'
        ],[
          'role_name.required' => 'Please enter role name',
          'status.required' => 'Please enter status'
        ]);

        $role_update = \App\Role::find($id);
        if($role_update) {
          $role_update->name = $request->role_name;
          $role_update->status = $request->status;
          $role_update->save();
          $request->session()->flash("message", "Role updated successfully");
          return redirect('/admin/role');
        }
      }
    }

    public function delete(Request $request, $id) {
      if(\App\Role::find($id)->delete()) {
        $request->session()->flash("message", "Role deleted successfully");
        return redirect('/admin/role');
      }
    }
}