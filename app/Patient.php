<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\Patient as Authenticatable;
use Auth;
class Patient extends Authenticatable
{

    use Notifiable;

    protected $hidden = [
        'password'
    ];

    public function photo()
   {
      if(file_exists( public_path() . '/uploads/patients/' . Auth::guard('front')->user()->avators) && Auth::guard('front')->user()->avators != "") {
          return url('uploads/patients/' . Auth::guard('front')->user()->avators);
      } else {
          return url('storage/frontend/images/patient.jpg');
      }
   }
   public function thumb()
  {
     if(file_exists( public_path() . '/uploads/patients/thumb/' . Auth::guard('front')->user()->avators) && Auth::guard('front')->user()->avators != "") {
         return url('uploads/patients/thumb/' . Auth::guard('front')->user()->avators);
     } else {
         return url('storage/frontend/images/patient.jpg');
     }
  }
}
