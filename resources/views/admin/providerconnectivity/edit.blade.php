@extends('admin.layouts.dashboard_layout')
@section('title', 'Connectivity service')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Connectivity
       <!--  <small>advanced tables</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="{!!URL::to('/admin/dashboard')!!}">Home</a></li>
        <li><a href="{!!URL::to('/admin/providerconnectivity')!!}">Connectivity</a></li>
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
              <h3 class="box-title">Edit {{ $provconn_data->name }}</h3>
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
                 {{ Form::model($provconn_data,array('method' => 'PATCH','role'=>'form','url' => array('admin/providerconnectivity/update', $provconn_data->id),'id'=>'providerconnectivity_edit')) }}
                    
                    <div class="col-md-6">
                        

                         <!-- form-group dropdown-->
                        <div class="form-group">
                           {!! Html::decode(Form::label('connectivity_id','Connectivity: <span style="color:red;">*</span>')) !!}
                           {!! Form::select('connectivity_id',[''=>'select']+$connectivity_data, null, ['class' => 'form-control select2']) !!}
                        </div>
                        <!-- /.form-group dropdown-->
                        
                        <!-- text input -->
                        <div class="form-group">
                          {!! Html::decode(Form::label('name','Name: <span style="color:red;">*</span>')) !!}
                          {!! Form::text('name',null,array('class'=>'form-control','id'=>'name','placeholder'=>'Enter treatment name')) !!}
                        </div>
                        <!-- /.text input -->

                        <!-- text input -->
                        <div class="form-group">
                          {!! Html::decode(Form::label('name','Distance: <span style="color:red;">* (please add unit)</span>')) !!}
                          {!! Form::text('distance',null,array('class'=>'form-control','id'=>'distance','placeholder'=>'Enter distance with variable')) !!}
                        </div>
                        <!-- /.text input -->
                        
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