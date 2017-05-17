<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
      'name','status'
    ];

    public $timestamps = true;

    public function users() {
      return $this->belongsToMany('App\User', 'user_role','role_id','user_id');
    }

    public function permissions() {
      return $this->hasMany('\App\Permission');
    }
    public function setRoleNameAttribute($value)
    {
        return $this->attributes['role_name'] = strtoupper($value);
    }
}
