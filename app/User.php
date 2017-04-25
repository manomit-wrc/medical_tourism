<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles() {
      return $this->belongsToMany('App\Role', 'user_role','user_id','role_id');
    }



    public function hasRole($action,$user_id)
    {
      $roles = $this->roles()->where('user_id',$user_id)->first();
      if(\App\Permission::where(['permission_name'=>$action,'role_id'=>$roles->role_id])->first()) {
	       return true;
      }
      else {
       return false;
      }
    }
}
