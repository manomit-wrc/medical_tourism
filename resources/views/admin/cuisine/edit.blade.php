@extends('admin.layouts.dashboard_layout')
@section('title', 'Cuisine')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Cuisine
       <!--  <small>advanced tables</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="{!!URL::to('/admin/dashboard')!!}">Home</a></li>
        <li><a href="{!!URL::to('/admin/cuisine')!!}">Cuisine</a></li>
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
              <h3 class="box-title">Edit {{ $cuisines_data->name }}</h3>
            </div>
             <!-- if there are creation errors, they will show here -->
             
            <!-- /.box-header -->
           <!--  @if($errors->any())
             <div class="alert alert-danger">
                 @foreach($errors->all() as $error)
                     <p>{{ $error }}</p>
                 @endforeach
             </div>
           @endif -->
            <div class="box-body">
                 {{ Form::model($cuisines_data,array('method' => 'PATCH','role'=>'form','url' => array('admin/cuisine/update', $cuisines_data->id),'id'=>'cuisine_edit')) }}
                    
                    <div class="col-md-6">
                        
                        <!-- text input -->
                        <div class="form-group">
                          {!! Html::decode(Form::label('name','Cuisine name: <span style="color:red;">*</span>')) !!}
                          {!! Form::text('name',null,array('class'=>'form-control','id'=>'name','placeholder'=>'Enter cuisine name')) !!}
                          {!! Html::decode('<span class="text-danger">'.$errors->first("name").'</span>') !!}
                        </div>
                        <!-- /.text input -->
                        
                         <!-- input button -->
                        <div>
                           {!! Form::submit('submit',array('class'=>'btn btn-primary pull-left','id'=>'exact-submit-button'))!!}
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