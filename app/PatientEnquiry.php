<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientEnquiry extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'patient_enquiries';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['subject','status','created_at','updated_at'];   
   
    public function patientenquirydetails()
    {
       return $this->hasMany('App\PatientEnquiryDetail', 'patient_enquiry_id', 'id');
    }
    public function patient() {
       return $this->belongsTo('\App\Patient');
    }
}
