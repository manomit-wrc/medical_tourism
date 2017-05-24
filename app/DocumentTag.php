<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocumentTag extends Model
{
	protected $table = 'document_tags';
   	protected $fillable = ['tag_name','status','created_at','updated_at'];
    public function document() {
       return $this->belongsTo('\App\Document');
    }
}
