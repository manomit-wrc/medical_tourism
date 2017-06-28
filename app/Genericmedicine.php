<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genericmedicine extends Model
{
	protected $table = 'genericmedicines';
	protected $fillable = ['generic_name_of_the_medicine','unit','price','status','created_at','updated_at'];

	public function procedures() {
		return $this->belongsToMany('\App\Procedure','genericmedicine_categories','genericmedicine_id','procedure_id');
    }
}
