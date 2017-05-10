<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CountryVisa extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'country_visa';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['country_id','upload_pdf','status','created_at','updated_at'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    public function country() {
       return $this->belongsTo('\App\Country');
     }
}
