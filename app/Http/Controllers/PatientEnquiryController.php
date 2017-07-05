<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Patient;
use App\PatientEnquiry;
use App\PatientEnquiryDetail;
use Illuminate\Support\Facades\DB;

class PatientEnquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //$patient_enq_data = PatientEnquiry::orderBy('id','desc')->get();
       // get the Patient enquiry table
      $sql="SELECT patenq.*,pat.first_name,pat.last_name FROM patient_enquiries patenq";
      $sql.=" JOIN patients pat ON pat.id=patenq.patient_id ";
      $sql.=" ORDER BY patenq.id DESC";
      $patient_enq_data_obj = DB::select($sql);
      //echo "<pre>"; print_r($patient_enq_data_obj); die;
      $patient_enq_data=array();
      foreach($patient_enq_data_obj AS $key=>$val){
        //total count from enquiry details
        $sqlnw="SELECT count(id) AS total FROM patient_enquiry_details WHERE patient_enquiry_id=".$val->id;
        $pat_data = DB::select($sqlnw);
        //echo "<pre>"; print_r($pat_data[0]->total);
        //echo "<pre>"; print_r($val->id); 
        $patient_enq_data[$key]['id']=$val->id;
        $patient_enq_data[$key]['subject'] = $val->subject;
        $patient_enq_data[$key]['patient_id'] = $val->patient_id;
        $patient_enq_data[$key]['status'] = $val->status;
        $patient_enq_data[$key]['created_at'] = $val->created_at;
        $patient_enq_data[$key]['updated_at'] = $val->updated_at;
        $patient_enq_data[$key]['first_name'] = $val->first_name;
        $patient_enq_data[$key]['last_name'] = $val->last_name;
        $patient_enq_data[$key]['total'] = $pat_data[0]->total;
            
      }
     // echo "<pre>"; print_r($patient_enq_data); die;
       return view('admin.patientenquiry.index', compact('patient_enq_data'));
    }

    public function gettusername($table,$id) { //echo $table; die;
       $data ='';  
      if($table=='Patient')
      {
        $userdata = Patient::where('id',$id)->get()->toArray();
         $data =$userdata[0]['first_name'].' '.$userdata[0]['last_name'];
      }else{
        $userdata = User::where('id',$id)->get()->toArray();
        $data =$userdata[0]['name'];
       } 
     
        return $data;
    }

     public function gettuserimage($table,$id)
    { //echo $table; die;
       $data ='';  
      if($table=='Patient')
      {
        $userdata = Patient::where('id',$id)->get()->toArray();
         $data =$userdata[0]['avators'];
      }else{
         $data =null;
      } 
     
        return $data;
    }


    public function showfullmessage(Request $request)
    {      
      $msgdtl_id = $request->msgdtl_id; 
      $patient_enq_dtl_data = PatientEnquiryDetail::findOrFail($msgdtl_id);
      //echo "<pre>"; print_r($patient_enq_dtl_data->message); die;
      echo json_encode($patient_enq_dtl_data->message);
      die(); 
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($enq_id)
    {
        // get the Patient enquiry details
        $sql="SELECT patenq.id,pat.avators as images,pat.first_name,pat.last_name,patenq.patient_id,patenq.status,patenqdet.id as enq_detail_id,patenqdet.patient_enquiry_id,patenqdet.sender_id,patenqdet.sender_type,patenqdet.reciever_id,patenqdet.reciever_type,patenqdet.subject,patenqdet.message,patenqdet.created_at FROM patient_enquiries patenq";
        $sql.=" JOIN patients pat ON pat.id=patenq.patient_id ";
        $sql.=" JOIN patient_enquiry_details patenqdet ON patenqdet.patient_enquiry_id=patenq.id ";
        $sql.=" WHERE patenqdet.patient_enquiry_id=".$enq_id;
        $patient_enq = DB::select($sql);
        //echo "<pre>"; print_r($patient_enq); die;
        $patient_enq_data = array();
        foreach($patient_enq as $keyy => $vall)
        { 
          
          if($vall->sender_type==2)//If sender is patient
          {
              $sender_name = $this->gettusername('Patient',$vall->sender_id);
              $sender_image = $this->gettuserimage('Patient',$vall->sender_id);
              
          }
          else
          {//If sender is admin or hospital
              $sender_name = $this->gettusername('User',$vall->sender_id);
              $sender_image ='';
          } 

          if($vall->reciever_type==2)//If reciever is patient
          {
              $reciever_name = $this->gettusername('Patient',$vall->reciever_id);
              $reciever_image = $this->gettuserimage('Patient',$vall->reciever_id);
          }
          else
          {//If reciever is admin or hospital
              $reciever_name = $this->gettusername('User',$vall->reciever_id);
              $reciever_image ='';
          } 

          $patient_enq_data[] = array(
            'id' => $vall->id,
            'enq_detail_id' => $vall->enq_detail_id,
            'patient_id' => $vall->patient_id,
            'first_name' => $vall->first_name,
            'last_name' => $vall->last_name,
            'sender_name' => $sender_name, 
            'sender_type' => $vall->sender_type,
            'sender_image' => $sender_image,  
            'reciever_name' => $reciever_name, 
            'reciever_type' => $vall->reciever_type, 
            'reciever_image' => $reciever_image, 
            'subject' => $vall->subject,
            'message' => $vall->message,
            'created_at' => $vall->created_at                    
          );
        }
        //echo "<pre>"; print_r($patient_enq_data); die;
       return view('admin.patientenquiry.show', compact('patient_enq_data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
