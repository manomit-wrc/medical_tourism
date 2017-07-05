@extends('layouts.inner_layout')
@section('title', 'Faqs')
@section('content')
<div class="col-md-8">
    <div class="qtbox">
        <h3>My <b>Enquiry Details</b></h3>

        
        

            <div class="top_mail">
                <h5>Arijit</h5>

                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="#"><i class="fa fa-reply-all" aria-hidden="true"></i> Reply all</a></li>
                    <li><a href="#"><i class="fa fa-forward" aria-hidden="true"></i> Forward</a></li>
                  </ul>
                </li>
                <li class="back_right"><a href="#"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a></li>
            </div>

            <script>
           function showhide()
           {
                 var div = document.getElementById("newpost");
          if (div.style.display !== "none") {
              div.style.display = "none";
          }
          else {
              div.style.display = "block";
          }
           }
        </script>

             <div class="mailarea">
                <div class="loopbox">
                    <a href="javascript:void(0)" onclick="showhide()">
                      <div class="row">
                          <div class="col-xs-1">
                            <img src="{!!URL::to('storage/frontend/images/master.jpg')!!}"  alt="Image 1">
                          </div>
                          <div class="col-xs-9"><div class="loopname">Master Mondal</div></div>
                          <div class="col-xs-2" align="right"><div class="loopname">7/12/2016</div></div>
                      </div>
                    </a>
                    <div id="newpost" class="maildet" style="display:none;">
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
                </div>
             </div>


    </div>
</div>
@stop

