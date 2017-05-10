<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cmspage extends Model
{
    protected $table = 'cmspages';
   	protected $fillable = ['pagename','status','created_at','updated_at'];
   	public function cms()
    {
        return $this->hasMany('App\CmsPageDetail');
    }
}
