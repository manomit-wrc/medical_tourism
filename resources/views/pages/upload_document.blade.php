@extends('layouts.inner_layout')
@section('title', 'Change Password')
@section('content')
<div class="container-fluid">
      <div class="row">
          <div class="category">
              <div class="container">
                  <div class="row">

                      <!--Left panel start here-->

                      <div class="col-md-4">
                          <div class="qtbox">
                            <div class="user_img">
                                <div class="editP">
                                    <label class="on767">
                                          <div class="upload_profile">
                                            <input type="file" name="avators" id="file-1" class="inputfile inputfile-1"  />
                                            <label for="file-1" style="{{$errors->has('avators')?'border:1px solid #f00':''}}"><i class="fa fa-pencil" aria-hidden="true"></i></label>
                                          </div>
                                      </label>
                                </div>


                                <img src="{!! Auth::guard('front')->user()->photo() !!}" alt="">
                            </div>

                            <h5 class="user_name">{{Auth::guard('front')->user()->first_name}}&nbsp;{{Auth::guard('front')->user()->last_name}}</h5>
                            @if($country_details['countries']['name'] && $state_details['states']['name'] && $city_details['cities']['name'])
                              <h5 class="user_address"><i class="fa fa-map-marker" aria-hidden="true"></i>{{$city_details['cities']['name']}},&nbsp;{{$state_details['states']['name']}}, &nbsp;{{$country_details['countries']['name']}}</h5>
                            @else
                              <h5 class="user_address"><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;</h5>
                            @endif

                            <button type="button" class="qtboxbtn" onclick="window.location.href = '/change-password'"><i class="fa fa-lock" aria-hidden="true"></i> Change Password</button>
                            <button type="button" class="qtboxbtn" onclick="window.location.href = '/profile'"><i class="fa fa-user" aria-hidden="true"></i> Profile</button>
                            <button type="button" class="active_btn" onclick="window.location.href = '/upload-documents'"><i class="fa fa-cog" aria-hidden="true"></i> Documents</button>
                            <!-- <button type="button" class="qtboxbtn" onclick="window.location.href = '/patient-logout'"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</button> -->
                          </div>
                          @if(Request::segment(1) != 'contact')
                              <div class="qc">
                                  <a href="{!!URL::to('/contact')!!}">
                                  <img src="{!!URL::to('storage/frontend/images/mail.png')!!}" alt=""><br>
                                  quick <strong>contact</strong>
                                  </a>
                              </div>
                          @endif
                      </div>

                      <!--Left panel end-->

                      <!--Right panel start here-->

                      <div class="col-md-8">
                          <div class="qtbox">
                              <h4><b>Upload Documents</b></h4>

                              <div>&nbsp;</div>
                              @if (Session::has('message'))
                                  <div class="alert alert-info">{{ Session::get('message') }}</div>
                              @endif
                              <div class="row">
                                <div class="loop_field">
                                      <div class="col-sm-11" style="margin-top:45px;"><label>Upload Your Prescriptions</label></div>
                                      <div class="col-sm-1">
                                      <button type="button" class="plusbtn plus-button" style="margin-top: 25px;">+</button>
                                      </div>
                                  </div>
                                <div class="loop_field upload-field">
                                                                           
                                      <div class="col-sm-11">
                                          <label class="on768">
                                                                                       
                                              <div class="upload_profile1">
                                                <input type="file" name="upload_documents[]" id="file-1" class="inputfile on768"  />
                                                <label for="file-1" style="padding:12px;"><i class="fa fa-cloud-upload" aria-hidden="true"></i> <span>Choose a file&hellip;</span></label>
                                              </div>
                                          </label>
                                      </div>
                                      
                                      
                                      {{-- <div class="col-sm-1">
                                      <button type="button" class="plusbtn">x</button>
                                      </div> --}}

                                  </div>
                                  
                                  <br clear="all">
                                  <div class="col-sm-3">
                                      <button type="submit" class="button">SAVE</button>
                                  </div>
                              </div>
                          </div>
                      </div>

                      <!--Right panel end-->

                  </div>
              </div>
          </div>
      </div>
  </div>

@stop
