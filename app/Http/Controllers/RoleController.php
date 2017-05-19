<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

class RoleController extends Controller
{
    public function __construct() {

    }

    public function index() {
      $data = \App\Role::where('status', '!=', 2)->orderBy('id','desc')->get();

      return view('admin.role.index',compact('data'));
    }

    public function create() {
      return view('admin.role.create');
    }

    public function add(Request $request) {
      $this->validate($request,[
        'name' => 'required|max:25|unique:roles',
        'status' => 'required'
      ],[
        'name.required' => 'Please enter role name',
        'status.required' => 'Please enter status'
      ]);

      $role = new \App\Role();
      $role->name = $request->name;
      $role->status = $request->status;

      if($role->save())
      { 
        //when new role is inserted by default admin login logout dashboard permission will be inserted(start here)
        $last_insert_role_id=$role->id;
        $routeCollection = Route::getRoutes();
        $i=0;
        foreach($routeCollection as $key => $rc)
        {

          $var=explode("/",$rc->getPath()); 
         
          if($var[0]=='admin')
          {
            if($i<=3)//Only four rows of admin permission will be inserted
            {  
              $data[]=[
                'role_id' => $last_insert_role_id,
                'permission_id' => 'ch'.$key,
                'permission_name' => $rc->getPath(),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
              ];
              $i++;
            }
          }  
        }  
        $result = \App\Permission::insert($data);
        //logic end here
        
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
          'name' => 'required|max:25|unique:roles,name,'.$id,
          'status' => 'required'
        ],[
          'name.required' => 'Please enter role name',
          'status.required' => 'Please enter status'
        ]);

        $role_update = \App\Role::find($id);
        if($role_update) {
          $role_update->name = $request->name;
          $role_update->status = $request->status;
          $role_update->save();
          $request->session()->flash("message", "Role updated successfully");
          return redirect('/admin/role');
        }
      }
    }

    /* public function delete(Request $request, $id) {
      if(\App\Role::find($id)->delete()) {
        $request->session()->flash("message", "Role deleted successfully");
        return redirect('/admin/role');
      }
    } */

    public function delete(Request $request,$id) {
        if($id) {
            $roleobj = \App\Role::find($id);
            $status = '2';
            $roleobj->status = $status; 
            $del = $roleobj->save();
            if($del) {      
                $request->session()->flash("message", "Successfully deleted");
                return redirect('/admin/role');
            }
        }
    }
    public function ajaxrolechangestatus(Request $request) { 
        $id = $request->id;
        $status = $request->status;     
        $mt = \App\Role::find($id);
       /* if ($status == 1){
            $stat = 0;
        }
        if ($status == 0){
            $stat = 1;
        } */      
        $mt->status = $status; 
        $upd = $mt->save();        
        if($upd) {              
          $returnArr = array('status'=>'1','msg'=>'Updateed Successfully');
        }else{
          $returnArr = array('status'=>'0','msg'=>'Inserted Faliure');
        }          
        echo json_encode($returnArr);
        die();
    }
}
