@extends('layouts.inner_layout')
@section('title', 'Change Password')
@section('content')                

    <!--Right panel start here-->
    <div class="col-md-8">
        <div class="qtbox">
            <h3><b>Reset Password</b></h3>
            <div>&nbsp;</div>
            @if (Session::has('message'))
                <div class="alert alert-info">{{ Session::get('message') }}</div>
            @endif
            @if (Session::has('error_message'))
                <div class="alert alert-warning">{{ Session::get('error_message') }}</div>
              @endif
            <div>
        </div>

    </div>
    <!--Right panel end-->

@stop
