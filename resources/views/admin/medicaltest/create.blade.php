@extends('admin.layouts.dashboard_layout')
@section('title', 'Medical Test')
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
            <!--@if($errors->any())
              <div class="alert alert-danger">
                  @foreach($errors->all() as $error)
                      <p>{{ $error }}</p>
                  @endforeach
              </div>
            @endif-->
            <div class="box-body">
             
                 {!! Form::open(array('method' => 'POST','role'=>'form','url'=>'admin/medicaltest/store','id'=>'medicaltest_add')) !!}
                    
                    <div class="col-md-6">
                        

                        <!-- text input -->
                        <div class="form-group">
                          {!! Html::decode(Form::label('test_name','Name: <span style="color:red;">*</span>')) !!}
                          {!!Form::text('test_name','',array('class'=>'form-control','id'=>'test_name','placeholder'=>'Enter  Name')) !!}
                          {!! Html::decode('<span class="text-danger">'.$errors->first("test_name").'</span>') !!}
                        </div>
                        <!-- /.text input -->                                              
                        <div class="form-group">
                          <label for="name">Category: <span style="color:red;">*</span></label>
                          <select class="form-control js-example-basic-multiple" id="medicaltestcategories_id" 
                          name="medicaltestcategories_id">
                            @foreach($category_list as $key => $value)
                            <option value="{{ $key }}">{{$value}}</option>
                            @endforeach
                          </select>
                          {!! Html::decode('<span class="text-danger">'.$errors->first("medicaltestcategories_id").'</span>') !!}                          
                        </div>             
                        <div class="form-group">
                          {!! Html::decode(Form::label('indications','Indications: ')) !!}
                          {!!Form::text('indications','',array('class'=>'form-control','id'=>'indications','placeholder'=>'Enter  indications')) !!}
                        </div>
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