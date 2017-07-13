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

   /* function showhide1()
   {
      var div = document.getElementById("newpost1");
      if(div.style.display !== "block"){
          div.style.display = "block";
          document.getElementById("abc1").style.backgroundColor = "#fff";
      }else{
          div.style.display = "none";
          document.getElementById("abc1").style.backgroundColor = "#f2f2f2";
      }
  }*/
</script>
<div class="col-md-8">
    <div class="qtbox">
        <h3>My <b>Enquiry Details</b></h3>

        
        

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
                          <div class="col-xs-2" align="right"><div class="loopname">{{ date("d F Y g:i A",strtotime($val['created_at'])) }} </div></div>
                      </div>
                    </a>

                    <div id="newpost<?php echo $val['enq_detail_id']; ?>" style="display:none;" class="maildet">
                      <div class="mailsender">
                      to me
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li><a>From : abc@wrctechnologies.com</a></li>
                          <li><a>to : xyz@wrctechnologies.com</a></li>
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
                             <div class="attachments">
                           <i class="fa fa-paperclip" aria-hidden="true"></i> <a href="{!!URL::to('/attachment-download',$val1['id'])!!}" >{!! $val1['attachment'] !!} </a>
                            </div>
                          @endforeach
                      @endif 
                      </div>
                </div>
                 @endforeach
              @endif
                <!-- <div id="abc1" class="loopbox">
                    <a href="javascript:void(0)" onclick="showhide1()">
                      <div class="row">
                          <div class="col-xs-1">
                            <img src="{!!URL::to('storage/frontend/images/master.jpg')!!}"  alt="Image 1">
                          </div>
                          <div class="col-xs-9"><div class="loopname">Master Mondal</div></div>
                          <div class="col-xs-2" align="right"><div class="loopname">7/12/2016</div></div>
                      </div>
                    </a>
                    <div id="newpost1" class="maildet" style="display:none;">
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
                      Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting.
                      </p>
                    </div>
                </div> -->


             </div>


    </div>
</div>
@stop

