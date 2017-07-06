@extends('admin.layouts.dashboard_layout')
@section('title', 'Enquiry Details')
@section('content')
<script>
   
   function showhide(id)
   {
      //alert(id);
      var div = document.getElementById("newpost"+id);
      if (div.style.display !== "block") {
          div.style.display = "block";
          document.getElementById("abc"+id).style.backgroundColor = "#fff";
      }
      else {
          div.style.display = "none";
          document.getElementById("abc"+id).style.backgroundColor = "#f2f2f2";
      }
    }

</script>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Enquiry Details
       <!--  <small>advanced tables</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="javascript:void(0)">Home</a></li>
         <li><a href="{!!URL::to('/admin/patientenquiry/')!!}">Enquiry</a></li>
        <li class="active">Enquiry Details</li>

      </ol>
    </section>

    <!-- Main content -->
     <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <!-- <h3 class="box-title">Data Table With Full Features</h3> -->
            </div>

            <div class="topbtn"></div>

            <!-- /.box-header -->
            <div class="box-body">
              @if (Session::has('message'))
                  <div class="alert alert-info" id="result7">{{ Session::get('message') }}</div>
              @endif
              <div class="top_mail">
                <h5>{{ $patient_enq_data[0]['subject'] }}</h5>

                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="#"><i class="fa fa-reply-all" aria-hidden="true"></i> Reply all</a></li>
                    <li><a href="#"><i class="fa fa-forward" aria-hidden="true"></i> Forward</a></li>
                  </ul>
                </li>
                <li class="back_right"><a href="{{ url('/admin/patientenquiry') }}"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a></li>
            </div>

            

             <div class="mailarea">             
                @if (count($patient_enq_data) > 0)
                    @foreach($patient_enq_data as $key=>$val)
                <div id="abc<?php echo $val['enq_detail_id']; ?>" class="loopbox">
                    <a href="javascript:void(0)" onclick="showhide(<?php echo $val['enq_detail_id']; ?>)" >
                      <div class="row">
                          <div class="col-xs-1">
                            @if(!empty($val['sender_image']))
                              @php
                                $sender_image=$val['sender_image'];
                              @endphp
                             <img src="{!!URL::to('/uploads/patients/thumb/'.$sender_image)!!}"  alt="Image 1">
                            @else 
                             <img src="{!!URL::to('storage/frontend/images/noimage.jpg')!!}"  alt="Image 1">
                            @endif
                          </div>
                          <div class="col-xs-9"><div class="loopname">{{ $val['sender_name'] }}</div></div>
                          <div class="col-xs-2" align="right"><div class="loopname">{{ date("d F Y",strtotime($val['created_at'])) }} </div></div>
                      </div>
                    </a>

                    <div id="newpost<?php echo $val['enq_detail_id']; ?>" style="display:none;" class="maildet">
                      <div class="mailsender">
                      to me
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li><a>From : arijit@wrctechnologies.com</a></li>
                          <li><a>to : master@wrctechnologies.com</a></li>
                        </ul>
                      </li>

                      </div>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li><a href="#"><i class="fa fa-reply" aria-hidden="true"></i> Reply</a></li>
                        </ul>
                      </li>
                      <p>
                     {!! $val['message'] !!} 
                      </p>                        
                        @if (count($val['allattachment']) > 0)
                          @foreach($val['allattachment'] as $key1=>$val1)
                             <p>
                           <a href="{!!URL::to('/admin/document-download',$val1['id'])!!}" >{!! $val1['attachment'] !!} </a>
                            </p>
                          @endforeach
                      @endif
                    </div>
                </div>
                 @endforeach
              @endif
                


             </div>
            </div>

            <!--Modal section start  here-->
              <div class="modal fade" id="vwmrmsg" role="dialog" data-backdrop="static" data-keyboard="false">
                  <div class="modal-dialog" style="width: 800px;">
                    <div class="modal-content" >
                      <div class="modal-header" style="padding: 0 15px;">
                        <button style=" margin-top: 15px !important" type="button" onclick="return resetmedicaltest();" class="close" data-dismiss="modal">&times;</button>        
                        <h4 style="color:#777">Message</h4>
                      </div>                                    
                      
                      <div class="modal-body">
                        <div class="alert alert-success fade in alert-dismissable" id="result" style="display:none"></div>
                          <div class="form-group">
                           <div id="msg_dtl"></div>
                          </div>                        
                      </div>  

                      <div class="modal-footer">                        
                        <button type="button" class="btn btn-default" onclick="return resetmedicaltest();" data-dismiss="modal">Close</button>&nbsp;
                        <input type="hidden" name="medicaltest_cat_id" id="medicaltest_cat_id"  value="">
                      </div>                      
                    </div>      
                  </div>
                </div>
            <!--modal section end here-->

            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@stop
