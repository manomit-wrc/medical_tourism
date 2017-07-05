<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientEnquiryAttachment extends Model
{
   protected $table = 'patient_enquiry_attachments';
    protected $fillable = ['patient_enquiry_details_id','attachment','created_at','updated_at'];
}
