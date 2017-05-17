<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = [
      'role_id','permission_name'
    ];

    public $timestamps = true;

    
}
