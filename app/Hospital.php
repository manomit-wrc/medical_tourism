<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    /*protected $fillable = [
      'name','description','phone','email','website','street_address','city_id','state_id','country_id','zipcode','number_of_beds','number_of_icu_beds','number_of_operating_rooms','number_of_avg_international_patients','avators'
    ];*/
    protected $fillable = [
      'name','description','email','street_address','city_id','state_id','country_id','zipcode',
      'avators'
    ];

    public function city() {
       return $this->belongsTo('\App\City');
    }
    public function country() {
       return $this->belongsTo('\App\Country');
    }
    public function state() {
       return $this->belongsTo('\App\State');
    }
    public function treatments()
    {
      return $this->belongsToMany('\App\Treatment','hospital_treatment','hospital_id','treatment_id');
    }    
    
}
