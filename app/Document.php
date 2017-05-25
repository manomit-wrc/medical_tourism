<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $table = 'documents';
    protected $fillable = ['document','patient_id','status','created_at','updated_at'];
    public function Documenttag()
    {
        return $this->hasMany('App\DocumentdocumentTag');
    }
}
