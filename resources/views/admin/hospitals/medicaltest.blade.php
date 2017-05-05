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
<style>
.location {
    width: 100%;
    background: #fff;
    border: 1px solid rgba(0, 0, 0, 0.15);
    padding: 5px;
    height: 242px;
    overflow-x: hidden;
    overflow-y: scroll;
}

.tree, .tree ul {
    margin: 0;
    padding: 0;
    list-style: none;
}

.tree li {
    margin: 0;
    padding: 0 1em;
    line-height: 2em;
    color: #369;
    position: relative;
    color: #333;
    font-size: 12px;
  text-align: left;
}

.tree li ul li {
    margin: 0;
    padding: 0 0 0 2.5em;
    line-height: 2em;
    color: #369;
    position: relative;
    color: #333;
    font-size: 12px;
  text-align: left;
}

.tree li input[type=checkbox]{
  margin:0 5px 0 0;
}

.tree li i{
  font-size: 10px;
  top: -2px;
}
</style>
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

                {!! Form::open(array('method' => 'POST','role'=>'form','url'=>'admin/hospitals/store_medicaltest/','id'=>'medicaltest_add')) !!}
                  <input id="hospital_id" name="hospital_id" type="hidden" value="{{Request::segment(4)}}">                
                  <div class="col-md-6">                  
                    <ul id="tree2" class="tree">
                     @php
                        $procid = 0 
                    @endphp 
                    @foreach($medicaltestdata as $key => $val)                    
                      <li class="branch">
                        <input name="countrychk2[]" onclick="shhh" id="select_allcatproduct{{ $val->medicaltestcategories->id }}" class="productcatalog" type="checkbox" value="{{ $val->medicaltestcategories->id }}">
                        <a href="javascript:void(0)" onclick="showproducts({{ $val->medicaltestcategories->id }})">{{ $val->medicaltestcategories->cat_name }}</a>
                        <ul id="product_data_{{ $val->medicaltestcategories->id }}" style="display:none;">
                          <li><input name="medicaltestArr[]" class="checkboxcatproduct{{ $val->medicaltestcategories->id }}" id="{{ $val->id }}" type="checkbox" value="{{ $val->id }}">
                            {{ $val->test_name }}
                          </li>                        
                         <li style="cursor: pointer;" onclick="addnewmedicaltest({{ $val->medicaltestcategories->id }})">Add New</li>                         
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
                        <button style=" margin-top: 15px !important" type="button" class="close" data-dismiss="modal">&times;</button>        
                        <h4 style="color:#777">Add Medical Test</h4>
                      </div>                                    
                        <div class="modal-body">
                          <div class="form-group">
                          {!! Html::decode(Form::label('test_name','Test Name: <span style="color:red;">*</span>')) !!}
                          {!! Form::text('test_name','',array('class'=>'form-control','id'=>'test_name','placeholder'=>'Enter Test Name')) !!}
                        </div>                        
                        </div>              
                      <div class="modal-footer">                        
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>&nbsp;
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
