<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomePageContent extends Model
{
    protected $table = 'homepage_contents';
    protected $fillable = ['medical_category_description','accomodation_left_title','accomodation_left_description','	accomodation_left_image','accomodation_middle_title','accomodation_middle_description','accomodation_middle_image',
    	'accomodation_right_title','accomodation_right_description','accomodation_right_image','created_at','updated_at'];
}
