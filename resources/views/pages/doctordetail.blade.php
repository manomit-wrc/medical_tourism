@extends('layouts.inner_layout')
@section('title', 'Doctors')
@section('content')
<!--Right panel start here-->
  <div class="col-md-8">
        <div class="rightP">
           <h3>About <b>doctor</b></h3>
          
          <p>{{ $doctor_details->about }}</p>
        </div>
  </div>
<!--Right panel end-->
@stop