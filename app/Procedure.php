<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Procedure extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'procedures';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','status','created_at','updated_at'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    public function treatments()
    {
        return $this->hasMany('App\Treatment');
    }

    public function doctors() {

      return $this->belongsToMany('\App\Doctor','doctor_procedure','procedure_id','doctor_id');
    }
}
