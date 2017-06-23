<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testcentre extends Model
{
    protected $table = 'testcenters';
   	protected $fillable = ['name','address','email_id','mobile_no','country_id','state_id','city_id','pincode','status','created_at','updated_at'];
}
