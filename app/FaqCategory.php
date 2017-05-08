<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FaqCategory extends Model
{
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'faq_categories';
    protected $fillable = ['name','status','created_at','updated_at'];
    public function faq()
    {
        return $this->hasMany('App\Faq');
    }
    
}
