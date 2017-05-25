<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    public $table = 'enquiries';

	public $fillable = ['full_name','email','mobile_no','treatment_id','procedure_id','country_id','state_id','city_id','comments','status'];
}
