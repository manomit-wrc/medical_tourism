<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Immigration extends Model
{
   /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'immigrations';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','designation','address','city_id','telephone','email','status','created_at','updated_at'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    public function city() {
       return $this->belongsTo('\App\City');
    }

    public function hotelclasstypes() {
       return $this->belongsTo('\App\HotelClassType');
    } 

    public function currency() {
       return $this->belongsTo('\App\Currency');
    }
}
