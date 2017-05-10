<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CmsPageDetail extends Model
{
   	protected $table = 'cmspage_details';
   	protected $fillable = ['slag','description','cmspage_id','status','created_at','updated_at'];

   	public function cmspage() {
       return $this->belongsTo('\App\Cmspage');
    }
}
