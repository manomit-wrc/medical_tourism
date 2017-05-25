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
                          @if($errors->any())
                              <div class="alert alert-danger">
                                  @foreach($errors->all() as $error)
                                      <p>{{ $error }}</p>
                                  @endforeach
                              </div>
                          @endif

                          @if (Session::has('message'))
                            <div class="alert alert-info">{{ Session::get('message') }}</div>
                          @endif

                          <div class="qtbox">
                            <h3><img src="{!!URL::to('storage/frontend/images/ql.jpg')!!}" alt=""> REQUEST A <strong>QUOTE</strong> <img src="{!!URL::to('storage/frontend/images/qr.jpg')!!}" alt=""></h3>
                           
                            {!! Form::open(array('method' => 'POST','role'=>'form','files' => true,'route'=>'enquiry.store','id'=>'enquiry_add')) !!}
                           
                            <label>
                             Full Name <span style="color:red;">* </span>
                             {!! Form::text('full_name','',array('class'=>'Iinput','id'=>'name','placeholder'=>'Enter full name')) !!}
                            </label>
                            
                            <label>
                             Email <span style="color:red;">* </span>
                             {!! Form::text('email','',array('class'=>'Iinput','id'=>'email','placeholder'=>'Enter email address')) !!}
                            </label>

                            <label>
                              Mobile number<span style="color:red;">* </span>
                              {!! Form::text('mobile_no','',array('class'=>'Iinput','id'=>'mobile_no','placeholder'=>'Enter mobile number')) !!}
                            </label>
                            
                            <label>
                             Specility <span style="color:red;">* </span>
                             {!! Form::select('treatment_id', $treat_list, null, ['class' => 'listtypeI']) !!}
                            </label>
                            
                            <label>
                              Procedure <span style="color:red;">* </span>
                              {!! Form::select('procedure_id', $proc_list, null, ['class' => 'listtypeI']) !!}
                            </label>
                            
                            <label>
                            Country <span style="color:red;">* </span>
                               {!! Form::select('country_id',['' => 'Select'] +$countries, null, ['id'=>'country_id','class' => 'listtypeI select2']) !!}
                            </label>

                            <label>
                            State <span style="color:red;">* </span>
                               <select name="state_id" id="state_id" class="listtypeI select2" ></select>
                            </label>

                            <label>
                            City <span style="color:red;">* </span>
                               <select name="city_id" id="state_id" class="listtypeI select2" ></select>
                            </label>
                            
                            

                            <label>
                            Comments <span style="color:red;">* </span>
                            {!! Form::textarea('comments','',array('class'=>'Cinput','id'=>'comments_id','placeholder'=>'Enter comments')) !!}
                            </label>


                            {!! Html::decode(Form::submit("ENQUIRY NOW",array('class'=>"button",'id'=>'exact-submit-button'))) !!}
                            
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