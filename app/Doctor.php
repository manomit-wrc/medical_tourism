<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = [
      'first_name','last_name','street_address','city_id','state_id','country_id','zipcode','phone_no','mobile_no','email','avators'
    ];

    public $timestamps = true;

    public function degrees() {

      return $this->belongsToMany('\App\Degree','doctor_degree','doctor_id','degree_id');
    }

    public function procedures() {

      return $this->belongsToMany('\App\Procedure','doctor_procedure','doctor_id','procedure_id');
    }

    public function cities() {
      return $this->belongsTo('\App\City');
    }
}
