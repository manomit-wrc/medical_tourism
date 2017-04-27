@extends('admin.layouts.dashboard_layout')
@section('title', 'Hospital')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Hospital
       <!--  <small>advanced tables</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="{!!URL::to('/admin/dashboard')!!}">Home</a></li>
        <li><a href="{!!URL::to('/admin/hospitals')!!}">Hospital</a></li>
        <li class="active">Add</li>
      </ol>
    </section>

  <!-- Main content -->
     <section class="content">
      <div class="row">
  
        <!-- right column -->
        <div class="col-md-12">
          <!-- Horizontal Form -->
          
          <!-- /.box -->
          <!-- general form elements disabled -->
          <div class="box box-warning">
             <!-- if there are creation errors, they will show here -->
            
            <!-- <div class="box-header with-border">
              <h3 class="box-title">General Elements</h3>
            </div> -->
            <!-- /.box-header -->
            @if($errors->any())
              <div class="alert alert-danger">
                  @foreach($errors->all() as $error)
                      <p>{{ $error }}</p>
                  @endforeach
              </div>
            @endif
            <div class="box-body">
             
                 {!! Form::open(array('method' => 'POST','role'=>'form','files' => true,'url'=>'admin/hospitals/store','id'=>'hospital_add')) !!}
                    
                    <div class="col-md-6">
                        

                        <!-- text input -->
                        <div class="form-group">
                          {!! Html::decode(Form::label('name','Hospital name: <span style="color:red;">*</span>')) !!}
                          {!! Form::text('name','',array('class'=>'form-control','id'=>'name','placeholder'=>'Enter hospital name')) !!}
                        </div>
                        <!-- /.text input -->

                         <!-- text input -->
                        <div class="form-group">
                          {!! Html::decode(Form::label('description','Hospital description: <span style="color:red;">*</span>')) !!}
                          {!! Form::textarea('description','',array('class'=>'form-control','id'=>'description','placeholder'=>'Enter hospital description')) !!}
                        </div>
                        <!-- /.text input -->

                        <!-- text input -->
                        <div class="form-group">
                          {!! Html::decode(Form::label('email','Email: <span style="color:red;">*</span>')) !!}
                          {!! Form::text('email','',array('class'=>'form-control','id'=>'email','placeholder'=>'Enter email')) !!}
                        </div>
                        <!-- /.text input -->

                        <!-- text input -->
                        <div class="form-group">
                          {!! Html::decode(Form::label('phone','Phone: <span style="color:red;">*</span>')) !!}
                          {!! Form::text('phone','',array('class'=>'form-control','id'=>'phone','placeholder'=>'Enter phone')) !!}
                        </div>
                        <!-- /.text input -->

                        <!-- text input -->
                        <div class="form-group">
                          {!! Html::decode(Form::label('website','Website: <span style="color:red;">*</span>')) !!}
                          {!! Form::text('website','',array('class'=>'form-control','id'=>'website','placeholder'=>'Enter website')) !!}
                        </div>
                        <!-- /.text input -->

                        <!-- file input -->
                        <div class="form-group">
                          {!! Html::decode(Form::label('avators','Image: <span style="color:red;">* (Image must be minimum of 745x214)</span>')) !!}
                          {!! Form::file('avators', null) !!}
                        </div>
                         <!-- /.file input -->

                    </div>
                    <div class="col-md-6">
                        <!-- text input -->
                        <div class="form-group">
                          {!! Html::decode(Form::label('street_address','Address: <span style="color:red;">*</span>')) !!}
                          {!! Form::text('street_address','',array('class'=>'form-control','id'=>'street_address','placeholder'=>'Enter hospital address')) !!}
                        </div>
                        <!-- /.text input -->

                         <!-- form-group dropdown-->
                        <div class="form-group">
                           {!! Html::decode(Form::label('country_id','Country: <span style="color:red;">*</span>')) !!}
                           {!! Form::select('country_id',['' => 'Select'] +$countries, null, ['class' => 'form-control select2']) !!}
                        </div>
                        <!-- /.form-group dropdown-->

                        <!-- form-group dropdown-->
                        <div class="form-group">
                           {!! Html::decode(Form::label('state_id','State: <span style="color:red;">*</span>')) !!}
                           <select name="state_id" id="state_id" class="form-control select2" ></select>
                        </div>
                        <!-- /.form-group dropdown-->

                         <!-- form-group dropdown-->
                        <div class="form-group">
                           {!! Html::decode(Form::label('city_id','City: <span style="color:red;">*</span>')) !!}
                           <select name="city_id" id="city_id" class="form-control select2" ></select>
                        </div>
                        <!-- /.form-group dropdown-->

                         <!-- text input -->
                        <div class="form-group">
                          {!! Html::decode(Form::label('zipcode','Zipcode: <span style="color:red;">*</span>')) !!}
                          {!! Form::text('zipcode','',array('class'=>'form-control','id'=>'zipcode','placeholder'=>'Enter zipcode')) !!}
                        </div>
                        <!-- /.text input -->

                         
                        
                         <!-- text input -->
                        <div class="form-group">
                          {!! Html::decode(Form::label('number_of_beds','Number of beds: <span style="color:red;">*</span>')) !!}
                          {!! Form::text('number_of_beds','',array('class'=>'form-control','id'=>'number_of_beds','placeholder'=>'Enter number of beds')) !!}
                        </div>
                        <!-- /.text input -->

                         <!-- text input -->
                        <div class="form-group">
                          {!! Html::decode(Form::label('number_of_icu_beds','Number of icu beds: <span style="color:red;">*</span>')) !!}
                          {!! Form::text('number_of_icu_beds','',array('class'=>'form-control','id'=>'number_of_icu_beds','placeholder'=>'Enter number of icu beds')) !!}
                        </div>
                        <!-- /.text input -->

                        <!-- text input -->
                        <div class="form-group">
                          {!! Html::decode(Form::label('number_of_operating_rooms','Number of operating rooms: <span style="color:red;">*</span>')) !!}
                          {!! Form::text('number_of_operating_rooms','',array('class'=>'form-control','id'=>'number_of_operating_rooms','placeholder'=>'Enter number of operating rooms')) !!}
                        </div>
                        <!-- /.text input -->
                       
                        <!-- text input -->
                        <div class="form-group">
                          {!! Html::decode(Form::label('number_of_avg_international_patients','Number of average international patients: <span style="color:red;">* </span>')) !!}
                          {!! Form::text('number_of_avg_international_patients','',array('class'=>'form-control','id'=>'number_of_avg_international_patients','placeholder'=>'Enter number of average internatinal patients')) !!}
                        </div>
                        <!-- /.text input -->

                         <!-- input submit button -->
                        <div class="box-footer">
                           {!! Form::submit('submit',array('class'=>'btn btn-primary pull-right','id'=>'exact-submit-button'))!!}
                        </div>
                        <!-- /.input submit button -->
                    </div>
                 {!! Form::token()!!}
                {!! Form::close() !!}
              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@stop