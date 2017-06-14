@extends('layouts.inner_layout')
@section('title', 'Suggestion')
@section('content')
<div class="container-fluid">
      <div class="row">
          <div class="category">
              <div class="container">
                  <div class="row">
                      <div class="col-md-8 col-md-offset-2">
                          <h2>Suggestions</h2>
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

                          <div class="qtbox">
                           {!! Form::open(array('method' => 'POST','role'=>'form','files' => true,'route'=>'suggestion.store','id'=>'suggestion_add')) !!}
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
          </div>
      </div>
  </div>
@stop