<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Patient;
use App\PatientEnquiry;
use App\PatientEnquiryDetail;
use App\PatientEnquiryAttachment;
use Auth;

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
       //get the Patient enquiry table
      $login_user_id=Auth::guard('admin')->user()->id;
      if($login_user_id==1)//If admin login
      {

      }
      else
      {

      } 

      $sql="SELECT patenq.*,pat.first_name,pat.last_name FROM patient_enquiries patenq";
      $sql.=" JOIN patients pat ON pat.id=patenq.patient_id ";
      $sql.=" ORDER BY patenq.id DESC";
      //echo $sql; die;
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

    public function gettusername($table,$id) { //echo $table; $id; die;
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

     public function gettuseremail($table,$id) { //echo $table; die;
       $data ='';  
      if($table=='Patient')
      {
         $userdata = Patient::where('id',$id)->get()->toArray();
         $data =$userdata[0]['email_id'].' '.$userdata[0]['last_name'];
      }else{
        $userdata = User::where('id',$id)->get()->toArray();
        $data =$userdata[0]['email'];
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
      //get the Patient enquiry details
      $login_user_id=Auth::guard('admin')->user()->id;
      if($login_user_id==1)//If admin login
      {
         $var="";
      }
      else
      {
         $var=" AND patenqdet.sender_type!=2 AND patenqdet.reciever_type!=2";
        //$var=" AND patenqdet.sender_type!=2 AND patenqdet.reciever_type!=2 AND  patenqdet.sender_id=".$login_user_id." AND patenqdet.reciever_id=".$login_user_id."";
      }
        $sql="SELECT patenq.id,pat.avators as images,pat.first_name,pat.last_name,patenq.patient_id,patenq.status,patenqdet.id as enq_detail_id,patenqdet.patient_enquiry_id,patenqdet.sender_id,patenqdet.sender_type,patenqdet.reciever_id,patenqdet.reciever_type,patenqdet.subject,patenqdet.message,patenqdet.created_at FROM patient_enquiries patenq";
        $sql.=" JOIN patients pat ON pat.id=patenq.patient_id ";
        $sql.=" JOIN patient_enquiry_details patenqdet ON patenqdet.patient_enquiry_id=patenq.id ".$var;
        $sql.=" WHERE patenqdet.patient_enquiry_id=".$enq_id;

        //echo $sql; die;
        $patient_enq = DB::select($sql);
        //echo "<pre>"; print_r($patient_enq); die;
        $patient_enq_data = array();
        foreach($patient_enq as $keyy => $vall)
        { 
          
          if($vall->sender_type==2)//If sender is patient
          {
              $sender_name = $this->gettusername('Patient',$vall->sender_id);
              $sender_email = $this->gettuseremail('Patient',$vall->sender_id);
              $sender_image = $this->gettuserimage('Patient',$vall->sender_id);
              
          }
          else
          {//If sender is admin or hospital
              $sender_name = $this->gettusername('User',$vall->sender_id);
              $sender_email = $this->gettuseremail('User',$vall->sender_id);
              $sender_image ='';
          } 

          if($vall->reciever_type==2)//If reciever is patient
          {
              $reciever_name = $this->gettusername('Patient',$vall->reciever_id);
              $reciever_email = $this->gettuseremail('Patient',$vall->reciever_id);
              $reciever_image = $this->gettuserimage('Patient',$vall->reciever_id);
          }
          else
          {//If reciever is admin or hospital
              $reciever_name = $this->gettusername('User',$vall->reciever_id);
              $reciever_email = $this->gettuseremail('User',$vall->reciever_id);
              $reciever_image ='';
          } 

          $patient_enq_data[] = array(
            'id' => $vall->id,
            'enq_detail_id' => $vall->enq_detail_id,
            'patient_id' => $vall->patient_id,
            'first_name' => $vall->first_name,
            'last_name' => $vall->last_name,
            'sender_name' => $sender_name,
            'sender_email' => $sender_email, 
            'sender_type' => $vall->sender_type,
            'sender_image' => $sender_image,  
            'reciever_name' => $reciever_name, 
            'reciever_email' => $reciever_email, 
            'reciever_type' => $vall->reciever_type, 
            'reciever_image' => $reciever_image, 
            'subject' => $vall->subject,
            'message' => $vall->message,
            'allattachment' => $this->attachment($vall->enq_detail_id), 
            'created_at' => $vall->created_at                    
          );
        }
        //echo "<pre>"; print_r($patient_enq_data); die;
        $hospital_list = \App\Hospital::orderBy('name','asc')->get()->pluck('name','user_id')->toArray();
        //echo "<pre>"; print_r($hospital_list); die;
       return view('admin.patientenquiry.show', compact('patient_enq_data','hospital_list'));
    }
    public function reply(Request $request) {
      //echo "<pre>"; print_r($request->input()); die;
      if($request->ajax()) {
         $pat_enq_id=$request->input('pat_enq_id');
         $patient_enq_data = PatientEnquiry::findOrFail($pat_enq_id);
         //echo $patient_enq_data->subject; die;
         date_default_timezone_set('Asia/Kolkata');
         $timestamp = date("Y-m-d H:i:s");
        if($request->input('reply_to_user_type')==1)//For user
        {
          $patientenqdtls = new \App\PatientEnquiryDetail();
          $patientenqdtls->patient_enquiry_id = $request->input('pat_enq_id');
          $patientenqdtls->sender_id =1; //Auth::guard('admin')->user()->id;
          $patientenqdtls->sender_type = 1;
          $patientenqdtls->reciever_id = $request->input('reply_to');
          $patientenqdtls->reciever_type = 2;
          $patientenqdtls->subject = $patient_enq_data->subject;
          $patientenqdtls->message = $request->input('message');
          $patientenqdtls->status = 1;
          $patientenqdtls->created_at = $timestamp;

          if($patientenqdtls->save()) {
            return response()->json(['status'=>'1','msg'=>'Successfully reply has been made']);
          }
          else {
            return response()->json(['status'=>'0','msg'=>'Reply interrupted. Please try again']);
          }
        }else if($request->input('reply_to_user_type')==2){//Reply to hospital
          //echo "<pre>"; print_r($request->input('reply_to')); die;
          foreach($request->input('reply_to') as $key=>$val)
          { 
              
              $patientenqdtls = new \App\PatientEnquiryDetail();
              $patientenqdtls->patient_enquiry_id = $request->input('pat_enq_id');
              $patientenqdtls->sender_id = 1;//Auth::guard('admin')->user()->id;
              $patientenqdtls->sender_type = 1;
              $patientenqdtls->reciever_id = $val;
              $patientenqdtls->reciever_type = 3;
              $patientenqdtls->subject = $patient_enq_data->subject;
              $patientenqdtls->message = $request->input('message');
              $patientenqdtls->status = 1;
              $patientenqdtls->created_at = $timestamp;
              //echo "<pre>"; print_r($patientenqdtls); die;
              if($patientenqdtls->save()) {
               
                return response()->json(['status'=>'1','msg'=>'Registration successfully done. Email activation link is sent to your email']);
              }
              else {
                return response()->json(['status'=>'0','msg'=>'Registration interrupted. Please try again']);
              }
          }

        }else{//Reply to Admin
            
              $patientenqdtls = new \App\PatientEnquiryDetail();
              $patientenqdtls->patient_enquiry_id = $request->input('pat_enq_id');
              $patientenqdtls->sender_id = Auth::guard('admin')->user()->id;
              $patientenqdtls->sender_type = 3;
              $patientenqdtls->reciever_id = $request->input('reply_to');
              $patientenqdtls->reciever_type = 1;
              $patientenqdtls->subject = $patient_enq_data->subject;
              $patientenqdtls->message = $request->input('message');
              $patientenqdtls->status = 1;
              $patientenqdtls->created_at = $timestamp;
              //echo "<pre>"; print_r($patientenqdtls); die;
              if($patientenqdtls->save()) {
               
                return response()->json(['status'=>'1','msg'=>'Registration successfully done. Email activation link is sent to your email']);
              }
              else {
                return response()->json(['status'=>'0','msg'=>'Registration interrupted. Please try again']);
              }
         

        }

    }
  }
    public function attachment($enq_detail_id) {
      $patientenquiryattach = PatientEnquiryAttachment::where('patient_enquiry_details_id',$enq_detail_id)->get()->toArray();      
        $data = array();
        foreach($patientenquiryattach as $keyy => $vall)
        {      
          $data[] = array(
            'id' => $vall['id'],
            'attachment' => $vall['attachment']                   
          );
        }
        return $data;
    }
    public function document_download(Request $request,$id) {
        if($id) {
            $docu_cat = \App\PatientEnquiryAttachment::find($id);
            $file_path = public_path('/uploads/drop').'/'.$docu_cat->attachment;
            return response()->download($file_path); 
        }
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
