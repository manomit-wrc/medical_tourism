@extends('layouts.inner_layout')
@section('title', 'Enquiry')
@section('content')
<div class="container-fluid">
      <div class="row">
          <div class="category">
              <div class="container">
                  <div class="row">
                      <!-- <div class="col-md-8 col-md-offset-2">
                          <h2>Enquiry</h2>
                          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                      </div>
                      <br clear="all">
                      <div>&nbsp;</div> -->

                      <div class="col-md-8 col-md-offset-2">
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
                            <h3><img src="{!!URL::to('storage/frontend/images/ql.jpg')!!}" alt=""> REQUEST A <strong>QUOTE</strong> <img src="{!!URL::to('storage/frontend/images/qr.jpg')!!}" alt=""></h3>
                           
                            {!! Form::open(array('method' => 'POST','role'=>'form','files' => true,'route'=>'enquiry.store','id'=>'enquiry_add')) !!}
                           
                           <div class="col-md-6">
                            <label>
                             Full Name <span style="color:red;">* </span>
                             {!! Form::text('full_name','',array('class'=>'Iinput','id'=>'full_name','placeholder'=>'Enter full name')) !!}
                             {!! Html::decode('<span class="text-danger">'.$errors->first("full_name").'</span>') !!}
                            </label>
                            </div>
                            
                            <div class="col-md-6">
                            <label>
                             Email <span style="color:red;">* </span>
                             {!! Form::text('email','',array('class'=>'Iinput','id'=>'email','placeholder'=>'Enter email address')) !!}
                             {!! Html::decode('<span class="text-danger">'.$errors->first("email").'</span>') !!}
                            </label>
                            </div>

                            <div class="col-md-6">
                            <label>
                              Mobile number<span style="color:red;">* </span>
                              {!! Form::text('mobile_no','',array('class'=>'Iinput','id'=>'mobile_no','placeholder'=>'Enter mobile number')) !!}
                              {!! Html::decode('<span class="text-danger">'.$errors->first("mobile_no").'</span>') !!}
                            </label>
                            </div>

                            <div class="col-md-6">                            
                            <label>
                             Speciality <span style="color:red;">* </span>
                             {!! Form::select('procedure_id', $proc_list, null, ['id'=>'select_procedure','class' => 'listtypeI']) !!}
                             {!! Html::decode('<span class="text-danger">'.$errors->first("procedure_id").'</span>') !!}
                            </label>
                            </div>

                            <div class="col-md-6">
                            <label>
                              Procedure <span style="color:red;">* </span>
                              {!! Form::select('treatment_id', $treat_list, null, ['id'=>'select_treatment','class' => 'listtypeI']) !!}
                              {!! Html::decode('<span class="text-danger">'.$errors->first("treatment_id").'</span>') !!}
                            </label>
                            </div>

                            <div class="col-md-6">
                            <label>
                            Country <span style="color:red;">* </span>
                               {!! Form::select('country_id',['' => 'Select'] +$countries, null, ['id'=>'country_id','class' => 'listtypeI select2']) !!}
                                {!! Html::decode('<span class="text-danger">'.$errors->first("country_id").'</span>') !!}
                            </label>
                            </div>

                            <div class="col-md-6">
                            <label>
                            State <span style="color:red;">* </span>
                               <select name="state_id" id="state_id" class="listtypeI select2" >
                                 <option value="">Please select country</option>
                               </select>
                               {!! Html::decode('<span class="text-danger">'.$errors->first("state_id").'</span>') !!}
                            </label>
                            </div>

                            <div class="col-md-6">
                            <label>
                            City <span style="color:red;">* </span>
                               <select name="city_id" id="city_id" class="listtypeI select2" >
                                 <option value="">Please select state</option>
                               </select>
                               {!! Html::decode('<span class="text-danger">'.$errors->first("city_id").'</span>') !!}
                            </label> 
                            </div>

                            <div class="col-md-12">                        
                            <label>
                            Comments <span style="color:red;">* </span>
                            {!! Form::textarea('comments','',array('class'=>'Cinput','id'=>'comments_id','placeholder'=>'Enter comments')) !!}
                            {!! Html::decode('<span class="text-danger">'.$errors->first("comments").'</span>') !!}
                            </label>
                            </div>


                            <div class="col-md-4 col-md-offset-4">{!! Html::decode(Form::submit("ENQUIRY NOW",array('class'=>"button",'id'=>'exact-submit-button'))) !!}</div>
                            
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