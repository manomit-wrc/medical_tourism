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
        <li class="active">Edit</li>
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
            <div class="box-header with-border">
              <h3 class="box-title">Edit {{ $patient_data->first_name.' '.$patient_data->last_name }}</h3>
            </div>
             <!-- if there are creation errors, they will show here -->
             
            <!-- /.box-header -->
            <!-- @if($errors->any())
              <div class="alert alert-danger">
                  @foreach($errors->all() as $error)
                      <p>{{ $error }}</p>
                  @endforeach
              </div>
            @endif -->
            <div class="box-body">
                 {{ Form::model($patient_data,array('method' => 'PATCH','role'=>'form','files' => true,'url' => array('admin/patients/update', $patient_data->id),'id'=>'hospital_edit')) }}
                    
                    <div class="col-md-6">
                       <!-- text input -->
                        <div class="form-group">
                          {!! Html::decode(Form::label('first_name','First Name: <span style="color:red;">*</span>')) !!}
                          {!! Form::text('first_name',null,array('class'=>'form-control','id'=>'first_name','placeholder'=>'Enter first name')) !!}
                          {!! Html::decode('<span class="text-danger">'.$errors->first("first_name").'</span>') !!}
                        </div>
                        <!-- /.text input -->

                        <!-- text input -->
                        <div class="form-group">
                          {!! Html::decode(Form::label('last_name','Last Name: <span style="color:red;">*</span>')) !!}
                          {!! Form::text('last_name',null,array('class'=>'form-control','id'=>'last_name','placeholder'=>'Enter last name')) !!}
                          {!! Html::decode('<span class="text-danger">'.$errors->first("last_name").'</span>') !!}
                        </div>
                        <!-- /.text input -->

                        

                        <!-- text input -->
                        <div class="form-group">
                          {!! Html::decode(Form::label('email_id','Email: <span style="color:red;">*</span>')) !!}
                          {!! Form::text('email_id',null,array('class'=>'form-control','id'=>'email_id','placeholder'=>'Enter email')) !!}
                          {!! Html::decode('<span class="text-danger">'.$errors->first("email_id").'</span>') !!}
                        </div>
                        <!-- /.text input -->

                        <!-- text input -->
                        <div class="form-group">
                          {!! Html::decode(Form::label('mobile_no','Mobile number: <span style="color:red;">*</span>')) !!}
                          {!! Form::text('mobile_no',null,array('class'=>'form-control','id'=>'mobile_no','placeholder'=>'Enter mobile no')) !!}
                          {!! Html::decode('<span class="text-danger">'.$errors->first("phone").'</span>') !!}
                        </div>
                        <!-- /.text input -->
                        

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