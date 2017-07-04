<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientEnquiryDetail extends Model
{
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'patient_enquiry_details';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['patient_enquiry_id','sender_id','sender_type','reciever_id','reciever_type','subject','message','status','created_at','updated_at'];
     /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    public function patientenquiry() {
       return $this->belongsTo('\App\PatientEnquiry');
    }

   /* public function user(){
      return $this->belongsTo('App\Profile', 'user_id');
    }*/
}
