<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'faqs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title','description','faq_category_id','status','created_at','updated_at'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    public function faqcategory() {
       return $this->belongsTo('\App\FaqCategory');
    }
}
