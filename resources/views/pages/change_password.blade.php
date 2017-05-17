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
                                <div class="editP"><a href="javascript:void(0)" data-toggle="modal" data-target="#profileimage_modal"><i class="fa fa-pencil" aria-hidden="true"></i></a></div>
                                <span id="upload"><img src="{!! Auth::guard('front')->user()->photo() !!}" alt=""></span>
                            </div>

                            <h4 class="user_name">{{Auth::guard('front')->user()->first_name}}&nbsp;{{Auth::guard('front')->user()->last_name}}</h4>
                            @if($country_details['countries']['name'] && $state_details['states']['name'] && $city_details['cities']['name'])
                              <h5 class="user_address"><i class="fa fa-map-marker" aria-hidden="true"></i>{{$city_details['cities']['name']}},&nbsp;{{$state_details['states']['name']}}, &nbsp;{{$country_details['countries']['name']}}</h5>
                            @else
                              <h5 class="user_address"><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;</h5>
                            @endif

                            <button type="button" class="active_btn" onclick="window.location.href = '/change-password'"><i class="fa fa-lock" aria-hidden="true"></i> Change Password</button>
                            <button type="button" class="qtboxbtn" onclick="window.location.href = '/profile'"><i class="fa fa-user" aria-hidden="true"></i> Profile</button>
                            <button type="button" class="qtboxbtn" onclick="window.location.href = '/upload-documents'"><i class="fa fa-cog" aria-hidden="true"></i> Documents</button>
                            <button type="button" class="qtboxbtn" onclick="window.location.href = '/patient-logout'"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</button>
                          </div>
                      </div>

                      <!--Left panel end-->

                      <!--Right panel start here-->

                      <div class="col-md-8">
                          <div class="rightP">
                              <h3><b>Change Password</b></h3>

                              <div>&nbsp;</div>
                              @if (Session::has('message'))
                                  <div class="alert alert-info">{{ Session::get('message') }}</div>
                              @endif
                              <div class="row">
                                <form name="frmChangePassword" id="frmChangePassword" method="post" action="/update-password" enctype="multipart/form-data">
                                  {{csrf_field()}}
                                  <div class="col-md-12">
                                      <label>
                                          Old Password

                                          <input type="password" name="old_password" class="Cinput" style="{{$errors->has('old_password')?'border:1px solid #f00':''}}">
                                          <span class="text-danger">{{ $errors->first('old_password') }}</span>
                                      </label>
                                  </div>

                                  <div class="col-md-12">
                                      <label>
                                          New Password

                                          <input type="password" name="new_password" class="Cinput" style="{{$errors->has('new_password')?'border:1px solid #f00':''}}" value="{{ old('new_password')}}">
                                          <span class="text-danger">{{ $errors->first('new_password') }}</span>
                                      </label>
                                  </div>
                                  <div class="col-md-12">
                                      <label>
                                          Confirm Password

                                          <input type="password" name="confirm_password" class="Cinput" style="{{$errors->has('confirm_password')?'border:1px solid #f00':''}}" value="{{ old('confirm_password')}}">
                                          <span class="text-danger">{{ $errors->first('confirm_password') }}</span>
                                      </label>
                                  </div>

                                  <div class="col-sm-3">
                                      <button type="submit" class="button">SAVE</button>
                                  </div>
                                </form>
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
