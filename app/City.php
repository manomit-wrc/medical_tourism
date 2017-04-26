<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cities';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','state_id','created_at','updated_at'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */

     public function state() {
       return $this->belongsTo('\App\State');
     }
}
