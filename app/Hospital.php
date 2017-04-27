<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    protected $fillable = [
      'name','description','phone','email','website','street_address','city_id','state_id','country_id','zipcode','number_of_beds','number_of_icu_beds','number_of_operating_rooms','number_of_avg_international_patients','avators'
    ];

    public function city() {
       return $this->belongsTo('\App\City');
    }

    
}
