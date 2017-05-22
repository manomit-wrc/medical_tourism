<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use App\Mail\AdminUserRegistrationMail;
use Illuminate\Support\Facades\Route;
use Auth;


class AdminUserController extends Controller
{
    public function __construct(Request $request) {
     
    }

    public function index() {
      $login_user_id=Auth::guard('admin')->user()->id;
      if($login_user_id==1)//If admin login
      {
       $user_data = User::with('roles')->where('status', '!=', 2)->where('id', '!=', 1)->orderBy('id','desc')->get(); //Admin user will not be displayed    
      }
      else
      {
       $user_data = User::with('roles')->where('status', '!=', 2)->where('id', '!=', 1)->where('added_by','=',$login_user_id)->orderBy('id','desc')->get(); //Admin user will not be displayed     
      }
      return view('admin.users.index',compact('user_data'));
    }

    public function create() {

      $role_list = Role::get()->pluck('name','id');
      return view('admin.users.create')->with('role_list', $role_list);
    }

    public function add(Request $request) {
      $this->validate($request,[
        'name' => 'required|max:50',
        'email' => 'required|email|unique:users,email',
        'password' => ['required','max:32','min:6','regex:/^(?=.*[a-z|A-Z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/'],
        'confirm_password' => 'same:password',
        'role' => 'required'
      ],[
        'name.required' => 'Please enter name',
        'name.max' => 'Name maximum have 50 characters',
        'password.required' => 'Please enter password',
        'password.regex' => 'Password should contain atleast one uppercase/lowercase letter,one number and one special character',
        'role.required' => 'Please select role'
      ]);
      
      $login_user_id=Auth::guard('admin')->user()->id; //Login user id
      $namevar=$request->name;
      $emailvar=$request->email;
      $passvar=$request->password;

      $user = new User();
      $user->name = $request->name;
      $user->email = $request->email;
      $user->password = bcrypt($request->password);

      if($login_user_id!=1)//Login user other than super admin
      {
        $user->added_by =$login_user_id;
        $added_user_data = User::with('roles')->where('id',$id)->get();
        //echo "<pre>"; print_r($added_user_data[0]->name); die;
        //echo "<pre>"; print_r($added_user_data[0]->roles[0]->name); die;
        $adminname=$added_user_data[0]->roles[0]->name.'('.$added_user_data[0]->name.')';
      }else{
        $adminname='Swasthya Bandhav Admin';
      }  
      
      $user->save();
      $role_user = Role::where('id',$request->role)->first();
      $user->roles()->attach($role_user);
      $rolename=$role_user->name;
      Mail::to($p)->send(new AdminUserRegistrationMail($namevar,$adminname,$rolename,$emailvar,$passvar));
      $request->session()->flash("message", "User addedd successfully");
      return redirect('/admin/adminuser');
    }

    public function edit($id) {
      $user_data = User::with('roles')->where('id',$id)->get();
      //echo "<pre>"; print_r($user_data[0]->roles[0]->name); die;
      $role_list = Role::get()->pluck('name','id');
      return view('admin.users.edit')->with(['role_list'=> $role_list,'user_data' => $user_data]);
    }

    public function update(Request $request, $id) {
      $this->validate($request,[
        'name' => 'required|max:50',
        'email' => 'required|email|unique:users,email,'.$request->id,
        'password' => ['max:32','min:6','regex:/^(?=.*[a-z|A-Z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/'],
        'confirm_password' => 'same:password',
        'role' => 'required'
      ],[
        'name.required' => 'Please enter name',
        'name.max' => 'Name maximum have 50 characters',
        'password.regex' => 'Password should contain atleast one uppercase/lowercase letter,one number and one special character',
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

    public function ajaxadminuserchangestatus(Request $request) { 
        $id = $request->id;
        $status = $request->status;     
        $mt = User::find($id);  
        $mt->status = $status; 
        $upd = $mt->save();        
        if($upd) {              
          $returnArr = array('status'=>'1','msg'=>'Updated Successfully');
        }else{
          $returnArr = array('status'=>'0','msg'=>'Updated Faliure');
        }          
        echo json_encode($returnArr);
        die();
    }

    public function permission() {
      //echo "<pre>"; print_r(Auth::guard('admin')->user()); die;
      $login_user_id=Auth::guard('admin')->user()->id; 
      $routeCollection = Route::getRoutes(); 
      //echo "<pre>"; print_r($routeCollection); die; 

      if($login_user_id==1)//If admin login
      {  
        $role_list = Role::get()->pluck('name','id');
      }else{
        $role_list = Role::where('id','!=',1)->get()->pluck('name','id');
      } 
      //echo "<pre>"; print_r($role_list); die; 
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
