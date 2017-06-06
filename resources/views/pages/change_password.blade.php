@extends('layouts.inner_layout')
@section('title', 'Change Password')
@section('content')                

    <!--Right panel start here-->
    <div class="col-md-8">
        <div class="qtbox">
            <h3><b>Change Password</b></h3>
            <div>&nbsp;</div>
            @if (Session::has('message'))
                <div class="alert alert-info" id="resultdocumentmsg">{{ Session::get('message') }}</div>
            @endif
            <div class="row">
              <div class="col-md-8 col-md-offset-2">
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

                <div class="col-sm-12">
                    <button type="submit" class="button" style="margin-top: 0;">SAVE</button>
                </div>
              </form>
              </div>
            </div>
        </div>

    </div>
    <!--Right panel end-->

@stop
