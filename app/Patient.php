<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\Patient as Authenticatable;
use Auth;
class Patient extends Authenticatable
{

    use Notifiable;
    protected $table = 'patients';
    protected $hidden = [
        'password'
    ];

    public function photo()
   {
      if(file_exists( public_path() . '/uploads/patients/' . Auth::guard('front')->user()->avators) && Auth::guard('front')->user()->avators != "") {
          return url('uploads/patients/' . Auth::guard('front')->user()->avators);
      } else {
          return url('uploads/patients/patient.jpg');
      }
   }
   public function thumb()
  {
     if(file_exists( public_path() . '/uploads/patients/thumb/' . Auth::guard('front')->user()->avators) && Auth::guard('front')->user()->avators != "") {
         return url('uploads/patients/thumb/' . Auth::guard('front')->user()->avators);
     } else {
         return url('uploads/patients/patient.jpg');
     }
  }

  public function countries() {
    return $this->belongsTo('\App\Country','country_id');
  }
  public function states() {
    return $this->belongsTo('\App\State','state_id');
  }
  public function cities() {
    return $this->belongsTo('\App\City','city_id');
  }
}
