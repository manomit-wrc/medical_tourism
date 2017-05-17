<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicalFacility extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'medical_facilities';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','description','facility_image','status','created_at','updated_at'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
}
