@extends('layouts.inner_layout')
@section('title', 'Change Password')
@section('content')                

    <!--Right panel start here-->
    <div class="col-md-8">
        <div class="qtbox">
            <h3><b>Change Password</b></h3>                       
            <div class="row">
              <div class="col-md-8 col-md-offset-2">
              <form name="frmresetPassword" id="frmresetPassword" method="post" action="/reset-password/{{ $url }}">
                {{csrf_field()}}                

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
