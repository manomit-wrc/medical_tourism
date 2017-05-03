<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicaltest extends Model
{
    protected $table = 'medicaltests';
   	protected $fillable = ['test_name','medicaltestcategories_id','status','created_at','updated_at'];
   	public function medicaltestcategories() {
       return $this->belongsTo('\App\MedicalTestCategories');
    }
}
