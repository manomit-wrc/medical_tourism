@extends('layouts.inner_layout')
@section('title', 'Doctors')
@section('content')
<!--Right panel start here-->
  <div class="col-md-8">
        <div class="sernewD1">
           <h3>About <b>doctor</b></h3>
          
          <p>{{ strip_tags($doctor_details->about) }}</p>
        </div>
  </div>
<!--Right panel end-->
@stop