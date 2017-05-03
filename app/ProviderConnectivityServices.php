<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProviderConnectivityServices extends Model
{
    protected $fillable = [
      'provider_connectivity_id','connectivity_service_id'
    ];

    public function connectivityservices() {

      return $this->belongsToMany('\App\ConnectivityServices','provider_connectivity_services','provider_connectivity_id','connectivity_service_id');
    }
}
