@extends('admin.layouts.dashboard_layout')
@section('title', 'Generic Medicine')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Generic Medicine
       <!--  <small>advanced tables</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="{!!URL::to('/admin/dashboard')!!}">Home</a></li>
        <li><a href="{!!URL::to('/admin/genericmedicine')!!}">Generic Medicine</a></li>
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
           <!-- @if($errors->any())
              <div class="alert alert-danger">
                  @foreach($errors->all() as $error)
                      <p>{{ $error }}</p>
                  @endforeach
              </div>
            @endif-->
            <div class="box-body">
             
                 {!! Form::open(array('method' => 'POST','role'=>'form','url'=>'admin/genericmedicine/store','id'=>'genericmedicine_add')) !!}
                    
                    <div class="col-md-6">                  

                        <!-- text input -->
                        <div class="form-group">
                          {!! Html::decode(Form::label('generic_name_of_the_medicine','Generic Name of the Medicine: <span style="color:red;">*</span>')) !!}
                          {!! Form::text('generic_name_of_the_medicine','',array('class'=>'form-control','id'=>'generic_name_of_the_medicine','placeholder'=>'Enter Generic Name of the Medicine')) !!}
                          {!! Html::decode('<span class="text-danger">'.$errors->first("generic_name_of_the_medicine").'</span>') !!}
                        </div>
                        <!-- /.text input -->
                        <!-- text input -->
                        <div class="form-group">
                          {!! Html::decode(Form::label('generic_name_of_the_medicine','Brand Name: <span style="color:red;">*</span>')) !!}
                          {!! Form::text('brand_name','',array('class'=>'form-control','id'=>'brand_name','placeholder'=>'Enter Brand Name')) !!}
                          {!! Html::decode('<span class="text-danger">'.$errors->first("brand_name").'</span>') !!}
                        </div>
                        <!-- /.text input -->
                        <!-- text input -->
                        <div class="form-group">
                          {!! Html::decode(Form::label('unit','Strip/Unit: <span style="color:red;">*</span>')) !!}
                          {!! Form::text('unit','',array('class'=>'form-control','id'=>'unit','placeholder'=>'Enter Strip/Unit')) !!}
                          {!! Html::decode('<span class="text-danger">'.$errors->first("unit").'</span>') !!}
                        </div>
                        <!-- /.text input -->
                         <!-- text input -->
                        <div class="form-group">
                          {!! Html::decode(Form::label('price','Price: <span style="color:red;">*</span>')) !!}
                          {!! Form::text('price','',array('class'=>'form-control','id'=>'price','placeholder'=>'Enter Price')) !!}
                          {!! Html::decode('<span class="text-danger">'.$errors->first("price").'</span>') !!}
                        </div>
                        <!-- /.text input -->                      
                        <div class="form-group">
                          <label for="name">Category: <span style="color:red;">*</span></label>
                          <select class="form-control" id="procedure_id[]" name="procedure_id[]" multiple="multiple">
                            @foreach($procedure_list as $key => $value)
                            <option value="{{ $key }}">{{$value}}</option>
                            @endforeach
                          </select>
                          {!! Html::decode('<span class="text-danger">'.$errors->first("procedure_id").'</span>') !!}                          
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