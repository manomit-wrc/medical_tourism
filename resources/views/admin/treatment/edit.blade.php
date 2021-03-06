@extends('admin.layouts.dashboard_layout')
@section('title', 'Treatment')
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
              <h3 class="box-title">Edit {{ $treatment_datas->name }}</h3>
            </div>
             <!-- if there are creation errors, they will show here -->
             
            <!-- /.box-header -->
            <!--@if($errors->any())
              <div class="alert alert-danger">
                  @foreach($errors->all() as $error)
                      <p>{{ $error }}</p>
                  @endforeach
              </div>
            @endif-->
            <div class="box-body">
                 {{ Form::model($treatment_datas,array('method' => 'PATCH','role'=>'form','url' => array('admin/treatment/update', $treatment_datas->id),'id'=>'treatment_edit')) }}
                    
                    <div class="col-md-6">
                        

                        <!-- form-group dropdown-->
                        <div class="form-group">
                           {!! Html::decode(Form::label('procedure_id','Procedure: <span style="color:red;">*</span>')) !!}
                           {!! Form::select('procedure_id', $procedure_lists, null, ['class' => 'form-control select2']) !!}
                           {!! Html::decode('<span class="text-danger">'.$errors->first("procedure_id").'</span>') !!} 
                        </div>
                        <!-- /.form-group dropdown-->
                        
                        <!-- text input -->
                        <div class="form-group">
                           {!! Html::decode(Form::label('name','Treatment name: <span style="color:red;">*</span>')) !!}
                           {!! Form::text('name',null,array('class'=>'form-control','id'=>'name','placeholder'=>'Enter treatment name')) !!}
                           {!! Html::decode('<span class="text-danger">'.$errors->first("name").'</span>') !!} 
                        </div>
                        <!-- /.text input -->
                        <div class="form-group">
                          <label for="name">Status: </label>
                          <select name="status" id="status" class="form-control" autofocus >
                            <option value="1" {{ $treatment_datas->status == "1" ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ $treatment_datas->status == "0" ? 'selected' : '' }}>In-Active</option>
                          </select>                          
                        </div>
                        
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