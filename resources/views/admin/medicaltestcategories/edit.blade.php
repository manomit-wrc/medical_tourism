@extends('admin.layouts.dashboard_layout')
@section('title', 'Medical Test Categories')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Medical Test Categories
       <!--  <small>advanced tables</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="{!!URL::to('/admin/dashboard')!!}">Home</a></li>
        <li><a href="{!!URL::to('/admin/medicaltestcategories')!!}">Medical Test Categories</a></li>
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
              <h3 class="box-title">Edit {{ $medicaltestcategories->cat_name }} </h3>
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
                 {{ Form::model($medicaltestcategories,array('method' => 'PATCH','role'=>'form','url' => array('admin/medicaltestcategories/update', $medicaltestcategories->id),'id'=>'medicaltestcategories_edit')) }}
                    
                    <div class="col-md-6">
                    <!-- text input -->
                        <div class="form-group">
                          {!! Html::decode(Form::label('cat_name','Name: <span style="color:red;">*</span>')) !!}
                          {!! Form::text('cat_name',null,array('class'=>'form-control','id'=>'cat_name','placeholder'=>'Enter Name')) !!}
                          {!! Html::decode('<span class="text-danger">'.$errors->first("cat_name").'</span>') !!}
                        </div>
                        <div class="form-group">
                          <label for="name">Status: </label>
                          <select name="status" id="status" class="form-control" autofocus >
                            <option value="1" {{ $medicaltestcategories->status == "1" ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ $medicaltestcategories->status == "0" ? 'selected' : '' }}>In-Active</option>
                          </select>                          
                        </div>
                         <!-- textarea -->
                       <!--  <div class="form-group">
                          <label>Textarea</label>
                          <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                        </div> -->
                        <!-- /.textarea -->
                        
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