<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuccessStories extends Model
{
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'success_stories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'title','description','user_id','story_image'
    ];
}
