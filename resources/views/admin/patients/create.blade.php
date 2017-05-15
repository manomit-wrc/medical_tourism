@extends('admin.layouts.dashboard_layout')
@section('title', 'Patient')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Patient
       <!--  <small>advanced tables</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="{!!URL::to('/admin/dashboard')!!}">Home</a></li>
        <li><a href="{!!URL::to('/admin/patients')!!}">Patient</a></li>
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

            <div class="box-body">

                
                {!! Form::open(array('method' => 'POST','role'=>'form','files' => true,'url'=>'/admin/patients/store','id'=>'patient_add')) !!}
                 {!! csrf_field() !!}
                <div class="col-md-6">

                  <div class="form-group">
                    {!! Html::decode(Form::label('first_name','First Name: <span style="color:red;">*</span>')) !!}
                    {!! Form::text('first_name','',array('class'=>'form-control','id'=>'first_name','placeholder'=>'Enter first name')) !!}
                    {!! Html::decode('<span class="text-danger">'.$errors->first("first_name").'</span>') !!}
                  </div>

                  <div class="form-group">
                    {!! Html::decode(Form::label('last_name','Last Name: <span style="color:red;">*</span>')) !!}
                    {!! Form::text('last_name','',array('class'=>'form-control','id'=>'last_name','placeholder'=>'Enter last name')) !!}
                    {!! Html::decode('<span class="text-danger">'.$errors->first("first_name").'</span>') !!}
                  </div>

                  <div class="form-group">
                    {!! Html::decode(Form::label('email_id','Email: <span style="color:red;">*</span>')) !!}
                    {!! Form::text('email_id','',array('class'=>'form-control','id'=>'email_id','placeholder'=>'Enter email address')) !!}
                    {!! Html::decode('<span class="text-danger">'.$errors->first("email_id").'</span>') !!}
                  </div>

                  <div class="form-group">
                    {!! Html::decode(Form::label('mobile_no','Mobile Number: <span style="color:red;">*</span>')) !!}
                    {!! Form::text('mobile_no','',array('class'=>'form-control','id'=>'mobile_no','placeholder'=>'Enter mobile number')) !!}
                    {!! Html::decode('<span class="text-danger">'.$errors->first("mobile_no").'</span>') !!}
                  </div>

                  <div class="form-group">
                    {!! Html::decode(Form::label('password','Password: <span style="color:red;">*</span>')) !!}
                    {!! Form::text('password','',array('class'=>'form-control','id'=>'password','placeholder'=>'Enter password')) !!}
                    {!! Html::decode('<span class="text-danger">'.$errors->first("password").'</span>') !!}
                  </div>
                 
                  
                  
                  <!-- input submit button -->
                    <div>
                       {!! Form::submit('submit',array('class'=>'btn btn-primary pull-left','id'=>'exact-submit-button'))!!}
                    </div>
                  <!-- /.input submit button -->
                </div>
                 
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
