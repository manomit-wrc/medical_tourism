<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuggestionUS extends Model
{
    public $table = 'suggestionus';

	public $fillable = ['name','email','mobile_no','subject','message','status'];
}
