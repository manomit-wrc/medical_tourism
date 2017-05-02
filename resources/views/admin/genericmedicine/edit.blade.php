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
              <h3 class="box-title">Edit {{ $genericmedicine->generic_name_of_the_medicine }} </h3>
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
                 {{ Form::model($genericmedicine,array('method' => 'PATCH','role'=>'form','url' => array('admin/genericmedicine/update', $genericmedicine->id),'id'=>'genericmedicine_edit')) }}
                    
                    <div class="col-md-6">
                        

                        <!-- text input -->
                        <div class="form-group">
                          {!! Html::decode(Form::label('generic_name_of_the_medicine','Enter Generic Name of the Medicine: <span style="color:red;">*</span>')) !!}
                          {!! Form::text('generic_name_of_the_medicine',null,array('class'=>'form-control','id'=>'generic_name_of_the_medicine','placeholder'=>'Enter Generic Name of the Medicine')) !!}
                        </div>

                        <div class="form-group">
                          {!! Html::decode(Form::label('unit','Strip/Unit: <span style="color:red;">*</span>')) !!}
                          {!! Form::text('unit',null,array('class'=>'form-control','id'=>'unit','placeholder'=>'Enter Strip/Unit')) !!}
                        </div>

                        <div class="form-group">
                          {!! Html::decode(Form::label('price','Price: <span style="color:red;">*</span>')) !!}
                          {!! Form::text('price',null,array('class'=>'form-control','id'=>'price','placeholder'=>'Enter Price')) !!}
                        </div>

                        <div class="form-group">
                          <label for="name">Category: <span style="color:red;">*</span></label>
                          <select class="form-control js-example-basic-multiple" id="procedure_id[]" name="procedure_id[]" multiple="multiple">
                            @foreach($procedure_list as $key => $value)
                            <option value="{{ $key }}" {{ in_array($key, $procedures_array)? 'selected':'' }}>{{$value}}</option>
                            @endforeach
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