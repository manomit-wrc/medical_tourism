<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CentreMedicalTest extends Model
{
   	protected $table = 'centre_medicaltests';
    protected $fillable = ['testcentre_id','medicaltest_id','test_price'];
}
