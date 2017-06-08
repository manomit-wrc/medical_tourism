@extends('layouts.inner_layout')
@section('title', 'Enquiry')
@section('content')
<div class="container-fluid">
      <div class="row">
          <div class="category">
              <div class="container">
                  <div class="row">
                      <div class="col-md-8 col-md-offset-2">
                          <h2>Enquiry</h2>
                          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                      </div>
                      <br clear="all">
                      <div>&nbsp;</div>

                      <div class="col-md-6 col-md-offset-3">
                          <!-- @if($errors->any())
                              <div class="alert alert-danger">
                                  @foreach($errors->all() as $error)
                                      <p>{{ $error }}</p>
                                  @endforeach
                              </div>
                          @endif -->

                          @if (Session::has('message'))
                            <div class="alert alert-info">{{ Session::get('message') }}</div>
                          @endif

                         
                          
                          

                      </div>

                      

                  </div>
              </div>
          </div>
      </div>
  </div>
@stop