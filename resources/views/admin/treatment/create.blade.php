@extends('admin.layouts.dashboard_layout')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Treatment
       <!--  <small>advanced tables</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="{!!URL::to('/admin/dashboard')!!}">Home</a></li>
        <li><a href="{!!URL::to('/admin/treatment')!!}">Treatment</a></li>
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
             
                 {!! Form::open(array('method' => 'POST','role'=>'form','url'=>'admin/treatment/store','id'=>'treatment_add')) !!}
                    
                    <div class="col-md-6">
                        
                         <!-- form-group dropdown-->
                        <div class="form-group">
                          <label>{!! Form::label('procedure_id', 'Procedure:') !!}</label>
                           {!! Form::select('procedure_id', $procedure_lists, null, ['class' => 'form-control select2']) !!}
                        </div>
                        <!-- /.form-group dropdown-->
                        
                        <!-- text input -->
                        <div class="form-group">
                          {!! Form::label('name', 'Treatment name:') !!}
                          {!! Form::text('name','',array('class'=>'form-control','id'=>'name','placeholder'=>'Enter treatment name')) !!}
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