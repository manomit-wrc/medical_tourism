<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicalTestCategories extends Model
{
    protected $table = 'medical_test_categories';
   	protected $fillable = ['cat_name','status','created_at','updated_at'];
   	public function medicaltest()
    {
        return $this->hasMany('App\Medicaltest');
    }
}
