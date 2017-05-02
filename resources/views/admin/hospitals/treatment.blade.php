@extends('admin.layouts.dashboard_layout')
@section('title', 'Hospital treatment')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Specialty and Procedure
       <!--  <small>advanced tables</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="{!!URL::to('/admin/dashboard')!!}">Home</a></li>
        <li><a href="{!!URL::to('/admin/hospitals')!!}">Hospital</a></li>
        <li class="active">Specialty and Procedure</li>
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

                <form method="post" name="frmHospitalTrtmnt"  >
                  {{ csrf_field() }}
                  <div class="col-md-6">
                    
                    <div class="form-group">
                      <input type="button" name="btn_check_all" id="btn_check_all" class="btn btn-info pull-right" value="Check All" >
                      <input type="button" name="btn_uncheck_all" id="btn_uncheck_all" class="btn btn-info pull-right" value="Un-Check All" >
                    </div>
                    <input id="hospital_id" name="hospital_id" type="hidden" value="{{Request::segment(4)}}">
                    @php
                        $procid = 0 
                    @endphp 

                    @foreach($treatment_datas as $key => $val)
                    <div class="col-xs-6">
                       @if($val->procedure->id!=$procid)  
                        <p><b>{{ $val->procedure->name }}</b></p>
                       @endif
                       
                       @php
                        $procid = $val->procedure->id;
                        $srchkey = $val->id;
                       @endphp 
                         
                         <input type="checkbox"  id="ch{{ $val->id }}"  class="chk-route-list" value="{{ $val->id }}" {{ in_array($srchkey,$hos_treat_datas)? "checked":"" }} >{{ $val->name }}
                    </div>
                    @endforeach

                    <div class="box-footer">
                      <input type="button" name="submit" id="hptl_tmt_add_btn" class="btn btn-primary pull-right " value="Submit" >
                    </div>

                  </div>
                </form>

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
