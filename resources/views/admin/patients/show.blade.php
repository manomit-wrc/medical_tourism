@extends('admin.layouts.dashboard_layout')
@section('title', 'Patient')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       {{ $patient_data->first_name.' '.$patient_data->last_name }}
      </h1>
      <ol class="breadcrumb">
        <li><a href="{!!URL::to('/admin/dashboard')!!}">Home</a></li>
        <li><a href="{!!URL::to('/admin/patients')!!}">Patient</a></li>
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
          <b>Name</b> : {{ $patient_data->first_name }}  {{ $patient_data->last_name }}<br/>
          <b>Email</b> : {{ $patient_data->email_id }}<br/>
          <b>Mobile Number</b> : {{ $patient_data->mobile_no }}<br/>
          <b>Sex</b> : {{ $patient_data->sex }}<br/>
          <b>Address</b> : {{ $patient_data->address }}<br/>
          <b>City</b> : {{ $patient_data->cities->name }}<br/>
          <b>State</b> : {{ $patient_data->states->name }}<br/>
          <b>Country</b> : {{ $patient_data->countries->name }}<br/>
          <b>Pincode</b> : {{ $patient_data->pincode }}<br/>
          <b>Date of birth</b> : {{ $patient_data->date_of_birth }}<br/>
          <b>Biography</b> : {{ $patient_data->biography }}<br/>
          @if(!empty($patient_data->avators))
            <b>Image</b> : <img src="{{url('/uploads/patients/thumb/'.$patient_data->avators)}}" alt="Hospital Image"><br/>
          @else
            <b>Image</b> : <img src="{{url('/uploads/patients/patient.jpg')}}" alt="Hospital Image"><br/>
          @endif
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