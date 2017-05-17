<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accrediation extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'accrediations';

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
}
