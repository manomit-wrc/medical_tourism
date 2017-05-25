<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocumentdocumentTag extends Model
{
    protected $table = 'document_document_tags';
   	protected $fillable = ['document_id','documenttag_id','created_at','updated_at'];
    public function document() {
       return $this->belongsTo('\App\Document');
    }
}
