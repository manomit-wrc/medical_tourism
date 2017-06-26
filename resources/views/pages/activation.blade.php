@extends('layouts.inner_layout')
@section('title', 'My Profile')
@section('content')
<div class="container-fluid">
      <div class="row">
          <div class="category">
              <div class="container">
                  <div class="row">

                      <div class="col-md-8">
                          <div class="rightP">                     

                              <div>&nbsp;</div>                              
                              <div class="alert alert-info" style="font-weight:bold;font-size:18px;">{{$message}}</div>
                          </div>
                      </div>

                      <!--Right panel end-->

                  </div>
              </div>
          </div>
      </div>
  </div>

@stop
