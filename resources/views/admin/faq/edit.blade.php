@extends('admin.layouts.dashboard_layout')
@section('title', 'Faq')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Medical Test
       <!--  <small>advanced tables</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="{!!URL::to('/admin/dashboard')!!}">Home</a></li>
        <li><a href="{!!URL::to('/admin/medicaltest')!!}">Medical Test</a></li>
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
              <h3 class="box-title">Edit {{ $medicaltest->test_name }} </h3>
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
                 {{ Form::model($medicaltest,array('method' => 'PATCH','role'=>'form','url' => array('admin/medicaltest/update', $medicaltest->id),'id'=>'medicaltest_edit')) }}
                    
                    <div class="col-md-6">
                        

                        <!-- text input -->
                        <div class="form-group">
                          {!! Html::decode(Form::label('test_name','Test Name: <span style="color:red;">*</span>')) !!}
                          {!! Form::text('test_name',null,array('class'=>'form-control','id'=>'test_name','placeholder'=>'Enter Test Name')) !!}
                        </div>
                        <div class="form-group">
                          <label for="name">Category: <span style="color:red;">*</span></label>
                          <select class="form-control js-example-basic-multiple" id="medicaltestcategories_id" name="medicaltestcategories_id">
                            @foreach($category_list as $key => $value)
                            <option value="{{ $key }}" {{ ($key==$medicaltest->medicaltestcategories_id)? 'selected':'' }} >{{$value}}</option>
                            @endforeach
                          </select>                          
                        </div>
                        <div class="form-group">
                          <label for="name">Status: </label>
                          <select name="status" id="status" class="form-control" autofocus >
                            <option value="1" {{ $medicaltest->status == "1" ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ $medicaltest->status == "0" ? 'selected' : '' }}>In-Active</option>
                          </select>                          
                        </div>
                        <!-- /.text input -->

                        <!-- textarea -->
                       <!--  <div class="form-group">
                          <label>Textarea</label>
                          <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                        </div> -->
                        <!-- /.textarea -->
                        
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