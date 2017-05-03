<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
   /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'treatments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','procedure_id','status','created_at','updated_at'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */

     public function procedure() {
       return $this->belongsTo('\App\Procedure');
     }
     public function hospitals()
    {
      return $this->belongsToMany('\App\Hospital','hospital_treatment','treatment_id','hospital_id');
    }
}
