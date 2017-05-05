<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Patient extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
      'first_name','last_name','address','email_id','mobile_no','avators','country_id','state_id','city_id','pincode','status'
    ];
    protected $hidden = [
        'password'
    ];
}
