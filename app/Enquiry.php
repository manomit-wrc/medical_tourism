<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    public $table = 'enquiries';

	  public $fillable = ['full_name','email','mobile_no','treatment_id','procedure_id','country_id','state_id','city_id','comments','status'];
    public function country() {
       return $this->belongsTo('\App\Country');
    }
    public function state() {
       return $this->belongsTo('\App\State');
    }
	  public function city() {
       return $this->belongsTo('\App\City');
    }
    public function treatment() {
       return $this->belongsTo('\App\Treatment');
    }
    public function procedure() {
       return $this->belongsTo('\App\Procedure');
    }
}
