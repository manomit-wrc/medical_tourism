@extends('admin.layouts.dashboard_layout')
@section('title', 'Medical Test List')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Medical Test List
       <!--  <small>advanced tables</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="{!!URL::to('/admin/dashboard')!!}">Home</a></li>
        <li><a href="{!!URL::to('/admin/hospitals')!!}">Hospital</a></li>
        <li class="active">Medical Test List</li>
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
              if (isset($medicaltest_array) && !empty($medicaltest_array)){
                  $medicaltest_array = $medicaltest_array;
              }else{
                  $medicaltest_array =array();
              }                  
              @endphp
                {!! Form::open(array('method' => 'POST','role'=>'form','url'=>'admin/hospitals/store_medicaltest/','id'=>'medicaltest_add')) !!}
                  <input id="hospital_id" name="hospital_id" type="hidden" value="{{Request::segment(4)}}">                
                  <div class="col-md-6">                  
                    <ul id="tree2" class="tree">
                    @foreach($medicaltestdata as $key => $val)                     
                      <li class="branch">
                        <input name="countrychk2[]" id="select_allcatproduct{{ $val['cat_id']}}" class="productcatalog" type="checkbox" value="{{ $val['cat_id'] }}">
                        <a href="javascript:void(0)" onclick="showproducts({{ $val['cat_id'] }})">{{ $val['catname'] }}</a>
                        <ul id="product_data_{{ $val['cat_id'] }}" style="display:none;">
                          @foreach($val['testarr'] as $key1 => $val1)                         
                          <li><input name="medicaltestArr[]" {{ in_array($val1['id'], $medicaltest_array)? 'checked':'' }} class="checkboxcatproduct{{ $val['cat_id'] }}" id="{{ $val1['id'] }}" type="checkbox" value="{{ $val1['id'] }}">
                            {{ $val1['testname'] }}
                          </li>
                          @endforeach                       
                         <li class="last-child{{ $val['cat_id'] }}"><a href="javascript:void(0)"  style="cursor: pointer; text-decoration:none;" onclick="addnewmedicaltest({{ $val['cat_id'] }})">Add New</a></li>                         
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
                <div class="modal fade" id="hosmedtest" role="dialog" data-backdrop="static" data-keyboard="false">
                  <div class="modal-dialog" style="width: 800px;">
                    <div class="modal-content" >
                      <div class="modal-header" style="padding: 0 15px;">
                        <button style=" margin-top: 15px !important" type="button" onclick="return resetmedicaltest();" class="close" data-dismiss="modal">&times;</button>        
                        <h4 style="color:#777">Add Medical Test</h4>
                      </div>                                    
                      <div class="modal-body">
                        <div class="alert alert-success fade in alert-dismissable" id="result" style="display:none"></div>
                          <div class="form-group">
                          {!! Html::decode(Form::label('test_name','Test Name: <span style="color:red;">*</span>')) !!}
                          {!! Form::text('test_name','',array('class'=>'form-control','id'=>'test_name','placeholder'=>'Enter Test Name')) !!}
                          <div class="alert alert-danger fade in alert-dismissable" id="test_name_error" style="display:none; margin-top:5px;">
                            </div>
                          </div>                        
                      </div>              
                      <div class="modal-footer">                        
                        <button type="button" class="btn btn-default" onclick="return resetmedicaltest();" data-dismiss="modal">Close</button>&nbsp;
                        <input type="hidden" name="medicaltest_cat_id" id="medicaltest_cat_id"  value="">
                        <button onclick="return submitmedicaltest();" class="btn btn-primary">Save</button>
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
