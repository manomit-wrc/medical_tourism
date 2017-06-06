@extends('layouts.inner_layout')
@section('title', 'Contact Us')
@section('content')
<div class="col-md-8">
    <div class="rightP">
        <h3><b>{!! $contactpage_data['contact-us-title'] !!}</b></h3>
        <div class="row">

            <div class="col-sm-6 col-md-6">
                    <h4><b>{!! $contactpage_data['contact-us-sub-title'] !!}</b></h4>
                    <p class="mar0">{!! $contactpage_data['contact-us-address'] !!}</p>
                    <p class="mar0"><i class="fa fa-phone" aria-hidden="true"></i>{{ strip_tags($contactpage_data['contact-us-phone']) }}</p>
                    <p class="mar0"><i class="fa fa-fax" aria-hidden="true"></i> {{ strip_tags($contactpage_data['contact-us-fax']) }}</p>
                    <p class="mar0"><i class="fa fa-envelope-open" aria-hidden="true"></i>{{ strip_tags($contactpage_data['contact-us-email']) }}</p>
                     
                     <!--////////////////////////////////////////////google map section start////////////////////////////////////////////////////////-->
                    <div id="map" class="map" style="width: 100%; height: 300px;"></div>

                    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB4eCXS81oEuOHH9BJ_vOVvqQL1qY90kIA&sensor=false&libraries=places"></script>
                        <script type="text/javascript">
                            function initialize() {
                                
                                var latlng = new google.maps.LatLng('22.571456','88.435846');
                                var map = new google.maps.Map(document.getElementById('map'), {
                                  center: latlng,
                                  zoom: 13
                                });
                                var marker = new google.maps.Marker({
                                  map: map,
                                  position: latlng,
                                  draggable: false,
                                  anchorPoint: new google.maps.Point(0, -29)
                               });
                                var infowindow = new google.maps.InfoWindow();   
                                google.maps.event.addListener(marker, 'click', function() {
                                  var iwContent = '<div id="iw_container">' +
                                  '<div class="iw_title"><b>Location</b> :Kolkata </div></div>';
                                  // including content to the infowindow
                                  infowindow.setContent(iwContent);
                                  // opening the infowindow in the current map and at the current marker location
                                  infowindow.open(map, marker);
                                });
                            }
                            google.maps.event.addDomListener(window, 'load', initialize);
                    </script>
                     <!--////////////////////////////////////google map section end////////////////////////////////////////////////-->
            </div>

            <div class="col-sm-6 col-md-6">
                @if($errors->any())
                      <div class="alert alert-danger">
                          @foreach($errors->all() as $error)
                              <p>{{ $error }}</p>
                          @endforeach
                      </div>
                @endif

                @if (Session::has('message'))
                  <div class="alert alert-info">{{ Session::get('message') }}</div>
                @endif

                {!! Form::open(array('method' => 'POST','role'=>'form','files' => true,'route'=>'contactus.store','id'=>'contact_add')) !!}
                    <label>
                        Name <span style="color:red;">* </span>
                        {!! Form::text('name','',array('class'=>'Cinput','id'=>'name','placeholder'=>'Enter name')) !!}
                    </label>

                    <label>
                        Email <span style="color:red;">* </span>
                        {!! Form::text('email','',array('class'=>'Cinput','id'=>'email','placeholder'=>'Enter email address')) !!}
                    </label>

                    <label>
                        Mobile number <span style="color:red;">* </span>
                        {!! Form::text('mobile_no','',array('class'=>'Cinput','id'=>'mobile_no','placeholder'=>'Enter mobile number')) !!}
                    </label>

                    <label>
                        Subject <span style="color:red;">* </span>
                        {!! Form::text('subject','',array('class'=>'Cinput','id'=>'subject','placeholder'=>'Enter subject')) !!}
                    </label>

                    <label>
                        Message <span style="color:red;">* </span>
                        {!! Form::textarea('message','',array('class'=>'Cinput','id'=>'message_id','placeholder'=>'Enter message')) !!}
                    </label>
                     
                     {!! Html::decode(Form::submit("SEND",array('class'=>"button",'id'=>'exact-submit-button'))) !!}
                   
                {!! Form::token()!!}
                {!! Form::close() !!}

            </div>

            

            

        </div>
    </div>
</div>
@stop