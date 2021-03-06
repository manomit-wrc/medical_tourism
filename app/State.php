<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'states';

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

     public function country() {
       return $this->belongsTo('\App\Country');
     }
}
