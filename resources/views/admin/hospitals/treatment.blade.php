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
               @if (Session::has('message'))
                  <div class="alert alert-info" id="result7">{{ Session::get('message') }}</div>
              @endif
               @if (Session::has('error_message'))
                  <div class="alert alert-danger" id="result8">{{ Session::get('error_message') }}</div>
              @endif
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
                         <li class="last-child{{ $val['cat_id'] }}" style="cursor: pointer;" onclick="addnewproceduretreatment({{ $val['cat_id'] }})">Add New</li>                         
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
