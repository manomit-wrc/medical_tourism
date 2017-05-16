<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Route;


class AdminUserController extends Controller
{
    public function __construct(Request $request) {

    }

    public function index() {
      $user_data = User::with('roles')->where('status', '!=', 2)->get();     
      return view('admin.users.index')->with('user_data',$user_data);
    }

    public function create() {

      $role_list = Role::get()->pluck('name','id');
      return view('admin.users.create')->with('role_list', $role_list);
    }

    public function add(Request $request) {
      $this->validate($request,[
        'name' => 'required|max:50',
        'email' => 'required|email|unique:users,email',
        'password' => ['required','max:32','min:6','regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/'],
        'confirm_password' => 'same:password',
        'role' => 'required'
      ],[
        'name.required' => 'Please enter name',
        'name.max' => 'Name maximum have 50 characters',
        'password.regex' => 'Password least one uppercase/lowercase letters and one number',
        'role.required' => 'Please select role'
      ]);

      $user = new User();
      $user->name = $request->name;
      $user->email = $request->email;
      $user->password = bcrypt($request->password);
      $user->save();
      $role_user = Role::where('id',$request->role)->first();

      $user->roles()->attach($role_user);
      $request->session()->flash("message", "User addedd successfully");
      return redirect('/admin/adminuser');
    }

    public function edit($id) {
      $user_data = User::with('roles')->where('id',$id)->get();
      $role_list = Role::get()->pluck('name','id');
      return view('admin.users.edit')->with(['role_list'=> $role_list,'user_data' => $user_data]);
    }

    public function update(Request $request, $id) {
      $this->validate($request,[
        'name' => 'required|max:50',
        'email' => 'required|email|unique:users,email,'.$request->id,
        'password' => ['max:32','min:6','regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/'],
        'confirm_password' => 'same:password',
        'role' => 'required'
      ],[
        'name.required' => 'Please enter name',
        'name.max' => 'Name maximum have 50 characters',
        'password.regex' => 'Password least one uppercase/lowercase letters and one number',
        'role.required' => 'Please select role'
      ]);

      $user_details = User::find($id);
      $user_details->name = $request->name;
      $user_details->email = $request->email;
      if($request->password) {
        $user_details->password = bcrypt($request->password);
      }
      $user_details->save();

      $user_details->roles()->wherePivot('user_id', '=', $request->id)->detach();
      $role_user = Role::where('id',$request->role)->first();

      $user_details->roles()->attach($role_user);

      $request->session()->flash("message", "User updated successfully");
      return redirect('/admin/adminuser');
    }

    /*public function delete(Request $request, $id) {
       $user_details = User::find($id);
      if($user_details->delete()) {
        $user_details->roles()->wherePivot('user_id', '=', $id)->detach();
        $request->session()->flash("message", "Role deleted successfully");
        return redirect('/admin/adminuser');
      }
    }*/
    public function delete(Request $request,$id) {
        if($id) {
            $user_details = User::find($id);
            $status = '2';
            $user_details->status = $status; 
            $del = $user_details->save();
            if($del) {      
                $request->session()->flash("message", "Successfully deleted");
                return redirect('/admin/adminuser');
            }
        }
    }

    public function permission() {
      $routeCollection = Route::getRoutes();
      $role_list = Role::get()->pluck('name','id');
      return view('admin.users.permission')->with(['routeCollection' => $routeCollection,'role_list' => $role_list]);
    }

    public function store_permission(Request $request) {
      if($request->ajax()) {
        $role = $request->role;
        $affectedRows = \App\Permission::where('role_id', '=', $role)->delete();
        $permissionArr = $request->permissionArr;
        foreach ($permissionArr as $key => $value) {
          $data[] = [
                'role_id' => $role,
                'permission_id' => $value['permission_id'],
                'permission_name' => $value['permission_name'],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];
        }

        $result = \App\Permission::insert($data);
        if($result) {
          return response()->json(['status' => '1']);
        }
        else {
          return response()->json(['status' => '0']);
        }
      }
    }

    public function get_permission(Request $request) {
      if($request->ajax()) {
        $data = [];
        $role_id = $request->role_id;
        $permission_details = Role::find($role_id)->permissions;
        foreach ($permission_details as $key => $permission) {
          $data[] = [
                'permission_id' => $permission->permission_id,
                'permission_name' => $permission->permission_name
            ];
        }

        if($data) {
          return response()->json(['status' => '1','data'=>$data]);
        }
        else {
          return response()->json(['status' => '0','data'=>array()]);
        }
      }
    }
}
