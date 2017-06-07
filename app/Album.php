<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
   protected $table = 'albums';
   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   protected $fillable = array('name','description','cover_image');
   
   public function Photos(){
    // return $this->has_many('images');
     return $this->hasMany('App\Images');
   }
}
