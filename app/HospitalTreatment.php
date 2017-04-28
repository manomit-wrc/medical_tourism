<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HospitalTreatment extends Model
{
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'hospital_treatment';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['hospital_id','treatment_id'];
    
}
