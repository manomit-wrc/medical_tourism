<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProviderConnectivity extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'provider_connectivities';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['connectivity_id','user_id','name','distance','status','created_at','updated_at'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    public function connectivity() {
      return $this->belongsTo('\App\Connectivity');
    }
    public function user() {
      return $this->belongsToMany('\App\Users');
    }
}
