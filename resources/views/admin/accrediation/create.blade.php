@extends('admin.layouts.dashboard_layout')
@section('title', 'Accrediation')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Accrediation
       <!--  <small>advanced tables</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="{!!URL::to('/admin/dashboard')!!}">Home</a></li>
        <li><a href="{!!URL::to('/admin/accrediation')!!}">Accrediation</a></li>
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
           <!--  @if($errors->any())
             <div class="alert alert-danger">
                 @foreach($errors->all() as $error)
                     <p>{{ $error }}</p>
                 @endforeach
             </div>
           @endif -->
            <div class="box-body">
             
                 {!! Form::open(array('method' => 'POST','role'=>'form','files' => true,'url'=>'admin/accrediation/store','id'=>'accrediation_add')) !!}
                    
                    <div class="col-md-6">
                        

                        <!-- text input -->
                        <div class="form-group">
                          {!! Html::decode(Form::label('name','Accrediation name: <span style="color:red;">*</span>')) !!}
                          {!! Form::text('name','',array('class'=>'form-control','id'=>'name','placeholder'=>'Enter accrediation name')) !!}
                          {!! Html::decode('<span class="text-danger">'.$errors->first("name").'</span>') !!}
                        </div>
                        <!-- /.text input -->
                        
                        <!-- file input -->
                        <div class="form-group">
                          {!! Html::decode(Form::label('accrediation_logo','Accrediation logo: <span style="color:red;">*</span>')) !!}
                          {!! Form::file('accrediation_logo', null) !!}
                          {!! Html::decode('<span class="text-danger">'.$errors->first("accrediation_logo").'</span>') !!}
                        </div>
                         <!-- /.file input -->

                         <!-- input submit button -->
                        <div>
                           {!! Form::submit('submit',array('class'=>'btn btn-primary pull-left','id'=>'exact-submit-button'))!!}
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