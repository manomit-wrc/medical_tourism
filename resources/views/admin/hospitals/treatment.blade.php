@extends('admin.layouts.dashboard_layout')
@section('title', 'Hospital Treatment')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Hospital Treatment
       <!--  <small>advanced tables</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="{!!URL::to('/admin/dashboard')!!}">Home</a></li>
        <li><a href="{!!URL::to('/admin/hospitals')!!}">Hospital</a></li>
        <li class="active">Hospital Treatment</li>
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

            <div class="box-body">
               @if (Session::has('message'))
                  <div class="alert alert-info" id="result7">{{ Session::get('message') }}</div>
              @endif
               @if (Session::has('error_message'))
                  <div class="alert alert-danger" id="result8">{{ Session::get('error_message') }}</div>
              @endif
              @php
              if (isset($hospitaltreatment_array) && !empty($hospitaltreatment_array)){
                  $hospitaltreatment_array = $hospitaltreatment_array;
              }else{
                  $hospitaltreatment_array =array();
              }                  
              @endphp
                {!! Form::open(array('method' => 'POST','role'=>'form','url'=>'admin/hospitals/store_treatment/','id'=>'treatment_add')) !!}
                  <input id="hospital_id" name="hospital_id" type="hidden" value="{{Request::segment(4)}}">                
                  <div class="col-md-6">                  
                    <ul id="tree2" class="tree">
                    @foreach($proctreatdata as $key => $val)                     
                      <li class="branch">
                        <input name="procedurechk2[]" id="select_allprocedure{{ $val['cat_id']}}" class="procedurecatalog" type="checkbox" value="{{ $val['cat_id'] }}">
                        <a href="javascript:void(0)" onclick="showprocedure({{ $val['cat_id'] }})">{{ $val['catname'] }}</a>
                        <ul id="procedure_data_{{ $val['cat_id'] }}" style="display:none;">
                          @foreach($val['treatarr'] as $key1 => $val1)                         
                          <li><input name="proceduretreatmentArr[]" {{ in_array($val1['id'], $hospitaltreatment_array)? 'checked':'' }} class="checkboxprocedure{{ $val['cat_id'] }}" id="{{ $val1['id'] }}" type="checkbox" value="{{ $val1['id'] }}">
                            {{ $val1['name'] }}
                          </li>
                          @endforeach                       
                         <li class="last-child{{ $val['cat_id'] }}"><a href="javascript:void(0)"  style="cursor: pointer; text-decoration:none;" onclick="addnewproceduretreatment({{ $val['cat_id'] }})">Add New</a></li>                         
                        </ul>
                      </li>
                    @endforeach                          
                    </ul>                    
                    <div class="box-footer">
                      <input type="submit" name="submit"  class="btn btn-primary pull-left " value="Submit" >
                    </div>
                  </div>
                {!! Form::token()!!}
                {!! Form::close() !!}
                <div class="modal fade" id="proceduretreatment" role="dialog" data-backdrop="static" data-keyboard="false">
                  <div class="modal-dialog" style="width: 800px;">
                    <div class="modal-content" >
                      <div class="modal-header" style="padding: 0 15px;">
                        <button style=" margin-top: 15px !important" type="button" onclick="return resettreatment();" class="close" data-dismiss="modal">&times;</button>        
                        <h4 style="color:#777">Add Treatment</h4>
                      </div>                                    
                      <div class="modal-body">
                        <div class="alert alert-success fade in alert-dismissable" id="result" style="display:none"></div>
                          <div class="form-group">
                          {!! Html::decode(Form::label('name','Treatment Name: <span style="color:red;">*</span>')) !!}
                          {!! Form::text('name','',array('class'=>'form-control','id'=>'name','placeholder'=>'Enter Treatment Name')) !!}
                          <div class="alert alert-danger fade in alert-dismissable" id="treatment_name_error" style="display:none; margin-top:5px;">
                            </div>
                          </div>                        
                      </div>              
                      <div class="modal-footer">                        
                        <button type="button" onclick="return resettreatment();" class="btn btn-default" data-dismiss="modal">Close</button>&nbsp;
                        <input type="hidden" name="procedure_id" id="procedure_id"  value="">
                        <button onclick="return submitproceduretreatment();" class="btn btn-primary">Save</button>
                      </div>                      
                    </div>      
                  </div>
                </div>
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
