@extends('admin.layouts.dashboard_layout')
@section('title', 'Hospital')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       {{ $hosptl_data->name }}
      </h1>
      <ol class="breadcrumb">
        <li><a href="{!!URL::to('/admin/dashboard')!!}">Home</a></li>
        <li><a href="{!!URL::to('/admin/hotel')!!}">Hotel</a></li>
        <li class="active">Details</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <!-- <h3 class="box-title">Title</h3> -->

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <!-- <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button> -->
          </div>
        </div>
        <div class="box-body">
          
          <div class="col-md-6">
            <div class="col_box" style="padding-bottom: 20px;">
                <div class="col-md-12"><b>Name</b> : {{ $hosptl_data->name }}</div>
                <div class="col-md-12"><b>Phone</b> : {{ $hosptl_data->phone }}</div>
                <div class="col-md-12"><b>Website</b> : {{ $hosptl_data->website }}</div>
                <div class="col-md-12"><b>Address</b> : {{ $hosptl_data->street_address }}</div>
                <div class="col-md-12"><b>City</b> : {{ $hosptl_data->city->name }}</div>
                <div class="col-md-12"><b>State</b> : {{ $hosptl_data->city->state->name }}</div>
            </div>
          </div>
          
          <div class="col-md-6">
            <div class="col_box" style="padding-bottom: 20px;">
              <div class="col-md-12"><b>Country</b> :{{ $hosptl_data->city->state->country->name }}</div>
              <div class="col-md-12"><b>Zipcode</b> :{{ $hosptl_data->zipcode}}</div>
              <div class="col-md-12"><b>Number of beds</b> : {{ $hosptl_data->number_of_beds }}</div>
              <div class="col-md-12"><b>Number of icu beds</b> : {{ $hosptl_data->number_of_icu_beds }}</div>
              <div class="col-md-12"><b>Number of operating rooms</b> : {{ $hosptl_data->number_of_operating_rooms }}</div>
              <div class="col-md-12"><b>Number of average international patients</b> : {{ $hosptl_data->number_of_avg_international_patients }}</div>
            </div>
          </div>

          <div class="col-md-12">
            <div class="col_box" style="padding-bottom: 20px;">
              <div class="col-md-12"><b>Description</b> : {{ $hosptl_data->description }}</div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="col_box" style="padding-bottom: 20px;">
            <!-- <b>Image</b> :  --><img src="{{url('/uploads/hospitals/thumb/'.$hosptl_data->avators)}}" alt="Hospital Image" style="width: 100%">
            </div>
          </div>
        </div>
        <!-- /.box-body -->
        <!-- <div class="box-footer">
          Footer
        </div> -->
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@stop