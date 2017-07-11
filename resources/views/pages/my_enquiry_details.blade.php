@extends('layouts.inner_layout')
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

    function opentextarea()
    { 
      var rplysectiondiv = document.getElementById("rplysection"); 
      rplysectiondiv.style.display = "block";
    }
</script>
<div class="col-md-8">
    <div class="qtbox">
        <h3>My <b>Enquiry Details</b></h3>

          <div class="alert alert-info" id="msgdisplay"></div>
        

            <div class="top_mail">
                <h5>{{ $patient_enq_data[0]['subject'] }}</h5>

                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="#"><i class="fa fa-reply-all" aria-hidden="true"></i> Reply all</a></li>
                    <li><a href="#"><i class="fa fa-forward" aria-hidden="true"></i> Forward</a></li>
                  </ul>
                </li>
                <li class="back_right"><a href="{{ url('/my-enquiry') }}"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a></li>
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
                          <li><a>From : {{ $val['sender_email'] }}</a></li>
                          <li><a>to : {{ $val['reciever_email'] }}</a></li>
                        </ul>
                      </li>

                      </div>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li><a href="javascript:void(0);" onclick="return opentextarea();" ><i class="fa fa-reply" aria-hidden="true"></i> Reply</a></li>
                        </ul>
                      </li>
                      <p>
                     {!! $val['message'] !!} 
                      </p>

                      
                       @if (count($val['allattachment']) > 0)
                          @foreach($val['allattachment'] as $key1=>$val1)
                             <div class="attachments">
                           <i class="fa fa-paperclip" aria-hidden="true"></i> <a href="{!!URL::to('/attachment-download',$val1['id'])!!}" >{!! $val1['attachment'] !!} </a>
                            </div>
                          @endforeach
                      @endif
                          


                    </div>
                </div>
                 @endforeach
              @endif

             </div>

              <!--Reply section start here-->
              <div id="rplysection" style="display:none;">
                  <form name="frmReplypat" id="frmReplypat" method="post" >
                    <input type="hidden" id="pat_enq_id" name="pat_enq_id" value="{{ $patient_enq_data[0]['id'] }}">
                   
                    <div class="form-group">
                      <textarea id="message" name="message" class="form-control" cols="50" rows="10"></textarea>
                    </div>

                    <div>
                        <button type="button" class="btn bg-purple pull-left" id="btnReply">SEND</button>
                    </div>
                </form>
              </div> 
               <!--Reply section end here-->


    </div>
</div>
@stop

