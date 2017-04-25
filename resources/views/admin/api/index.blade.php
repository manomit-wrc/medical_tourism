@extends('admin.layouts.dashboard_layout')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Country-State-City
       <!--  <small>advanced tables</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Country-State-City</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <!-- <h3 class="box-title">Data Table With Full Features</h3> -->
            </div>

           <!--  <div><a href="{!!URL::to('/admin/paymenttype/create')!!}"><button type="button" class="btn bg-purple">ADD</button></a></div> -->

            <!-- /.box-header -->
            <div class="box-body">
              @if (Session::has('message'))
                  <div class="alert alert-info">{{ Session::get('message') }}</div>
              @endif
            
                <div class="form-group">
                    <label for="title">Select Country:</label>
                    {!! Form::select('country_id', ['' => 'Select'] +$countries,'',array('class'=>'form-control','id'=>'country','style'=>'width:350px;'));!!}
                   
                </div>
                <div class="form-group">
                    <label for="title">Select State:</label>
                    <select name="state_id" id="state_id" class="form-control" style="width:350px">
                    </select>
                </div>
             
                <div class="form-group">
                    <label for="title">Select City:</label>
                    <select name="city_id" id="city_id" class="form-control" style="width:350px">
                    </select>
                </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
@stop