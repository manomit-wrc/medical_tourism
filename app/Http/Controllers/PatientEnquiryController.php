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
    public function index($id)
    {
       $patient_enq_data = PatientEnquiry::where('patient_id', '=',$id)->orderBy('id','desc')->get();
       //echo "<pre>"; print_r($patient_enq_data->patient); die;
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
    public function show($id)
    {
        // get the Patient enquiry
        $sql="SELECT patenq.id,pat.first_name,pat.last_name,patenq.patient_id,patenq.status,patenqdet.id as enq_detail_id,patenqdet.patient_enquiry_id,patenqdet.sender_id,patenqdet.sender_type,patenqdet.reciever_id,patenqdet.reciever_type,patenqdet.subject,patenqdet.message,patenqdet.created_at FROM patient_enquiries patenq";
        $sql.=" JOIN patients pat ON pat.id=patenq.patient_id ";
        $sql.=" JOIN patient_enquiry_details patenqdet ON patenqdet.patient_enquiry_id=patenq.id ";
        $sql.=" WHERE patenq.patient_id=".$id;
        $patient_enq = DB::select($sql);
        //echo "<pre>"; print_r($patient_enq); die;
        $patient_enq_data = array();
        foreach($patient_enq as $keyy => $vall)
        { 
          
          if($vall->sender_type==2)//If sender is patient
          {
              $sender_name = $this->gettusername('Patient',$vall->sender_id);
          }
          else
          {//If sender is admin or hospital
              $sender_name = $this->gettusername('User',$vall->sender_id);
          } 

          if($vall->reciever_type==2)//If reciever is patient
          {
              $reciever_name = $this->gettusername('Patient',$vall->reciever_id);
          }
          else
          {//If reciever is admin or hospital
              $reciever_name = $this->gettusername('User',$vall->reciever_id);
          } 

          $patient_enq_data[] = array(
            'id' => $vall->id,
            'enq_detail_id' => $vall->enq_detail_id,
            'patient_id' => $vall->patient_id,
            'first_name' => $vall->first_name,
            'last_name' => $vall->last_name,
            'sender_name' => $sender_name, 
            'sender_type' => $vall->sender_type,  
            'reciever_name' => $reciever_name, 
            'reciever_type' => $vall->reciever_type, 
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
