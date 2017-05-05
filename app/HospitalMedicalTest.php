<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HospitalMedicalTest extends Model
{
    protected $table = 'hospital_medicaltests';
    protected $fillable = ['hospital_id','medicaltest_id'];
}
