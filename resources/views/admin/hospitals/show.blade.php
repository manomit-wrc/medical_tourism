@extends('admin.layouts.dashboard_layout')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       {{ $hotels_data->name }}
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
          <b>Name</b> : {{ $hotels_data->name }}<br/>
          <b>Address</b> : {{ $hotels_data->address }} <br/>
          <b>City</b> : {{ $hotels_data->city->name }}<br/>
          <b>State</b> : {{ $hotels_data->city->state->name }}<br/>
          <b>Country</b> :{{ $hotels_data->city->state->country->name }}<br/>
          <b>Number of rooms</b> : {{ $hotels_data->no_of_rooms }}<br/>
          <b>Minimum price per night</b> : {{ $hotels_data->min_price_per_night }}<br/>
          <b>Maximum price per night</b> : {{ $hotels_data->max_price_per_night }}<br/>
          <b>Url</b> : {{ $hotels_data->booking_url }}<br/>
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