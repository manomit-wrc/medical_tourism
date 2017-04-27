@extends('admin.layouts.dashboard_layout')
@section('title', 'Procedure')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Procedure
       <!--  <small>advanced tables</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="{!!URL::to('/admin/dashboard')!!}">Home</a></li>
        <li><a href="{!!URL::to('/admin/procedure')!!}">Procedure</a></li>
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
              <h3 class="box-title">Edit {{ $procedures_data->name }}</h3>
            </div>
             <!-- if there are creation errors, they will show here -->
             
            <!-- /.box-header -->
            @if($errors->any())
              <div class="alert alert-danger">
                  @foreach($errors->all() as $error)
                      <p>{{ $error }}</p>
                  @endforeach
              </div>
            @endif
            <div class="box-body">
                 {{ Form::model($procedures_data,array('method' => 'PATCH','role'=>'form','files' => true,'url' => array('admin/procedure/update', $procedures_data->id),'id'=>'procedure_edit')) }}
                    
                    <div class="col-md-6">
                        

                        <!-- text input -->
                        <div class="form-group">
                          {!! Html::decode(Form::label('name','Procedure name: <span style="color:red;">*</span>')) !!}
                          {!! Form::text('name',null,array('class'=>'form-control','id'=>'name','placeholder'=>'Enter procedure name')) !!}
                        </div>
                        <!-- /.text input -->

                        <!-- file input -->
                        <div class="form-group">
                          {!! Html::decode(Form::label('procedure_image','Procedure image: <span style="color:red;">* (Image must be minimum of 243x149)</span>')) !!}
                          <img src="{{url('/uploads/procedures/thumb/'.$procedures_data->procedure_image)}}" alt="Procedure Image">
                          {!! Form::file('procedure_image', null) !!}
                        </div>
                         <!-- /.file input -->
                        
                         <!-- input button -->
                        <div class="box-footer">
                           {!! Form::submit('submit',array('class'=>'btn btn-primary pull-right','id'=>'exact-submit-button'))!!}
                        </div>
                        <!-- /.input button -->
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