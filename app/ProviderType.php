<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProviderType extends Model
{
      /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'provider_types';

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
