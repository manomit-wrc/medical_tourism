<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
   /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'hotels';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','currency_id','status','created_at','updated_at'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    public function city() {
       return $this->belongsTo('\App\City');
    }

    public function hotelclasstype() {
       return $this->belongsTo('\App\HotelClassType');
    } 

    public function currency() {
       return $this->belongsTo('\App\Currency');
    }
}
