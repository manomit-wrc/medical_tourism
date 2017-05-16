@extends('admin.layouts.dashboard_layout')
@section('title', 'Patient')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Patient
       <!--  <small>advanced tables</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="javascript:void(0)">Home</a></li>
        <li class="active">Patient</li>

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

            <div class="topbtn"><!-- <a href="{{ url('/admin/patients/create') }}"><button type="button" class="btn bg-purple btn-rightad">ADD</button></a> --></div>

            <!-- /.box-header -->
            <div class="box-body">
              @if (Session::has('message'))
                  <div class="alert alert-info" id="result7">{{ Session::get('message') }}</div>
              @endif
              <table id="datatbl_patient_id" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th style="display:none;"></th>
                    <th>Name</th>
                    <th>Sex</th>
                    <th>Mobile</th>
                    <th>Status</th>
                    <th width="15%">Actions</th>
                  </tr>
                </thead>

                <tbody>
               
                  @if (count($patient_data) > 0)
                  
                    @foreach($patient_data as $data)
                      <tr>
                        <td style="display:none;"><input type="hidden" value="{{ $data->id }}"></td>
                        <td>{{ $data->first_name.' '.$data->last_name}}</td>
                        <td>{{ $data->sex }}</td>
                        <td>{{ $data->mobile_no }}</td>
                         <td>
                          @if($data->status ==1)
                            <span data-toggle="tooltip" data-original-title="Click here to change status">
                            <input type="checkbox" checked id="tog{{ $data->id }}" onchange="return changeStatus('/admin/ajaxpatientchangestatus',{{ $data->id }})" value="1"  data-toggle="toggle2">
                            </span>
                          @endif
                          @if($data->status ==0)
                          <span data-toggle="tooltip" data-original-title="Click here to change status">
                            <input type="checkbox" id="tog{{ $data->id }}"  onchange="return changeStatus('/admin/ajaxpatientchangestatus',{{ $data->id }})" value="0" data-toggle="toggle2">
                          </span>
                          @endif
                        </td>
                        <td>
                          <a href="{!!URL::to('/admin/patients/show',$data->id)!!}" class="btn btn-info">view</a> 
                         <!--  <a href="{!!URL::to('/admin/patients/edit',$data->id)!!}" class="btn btn-primary">Edit</a> -->
                          <a href="javascript:void(0)" onclick="return deldata('{!!URL::to('/admin/patients/delete',$data->id)!!}')" class="btn btn-danger" >Delete</a>
                        </td>
                      </tr>
                    @endforeach
                  @endif
                </tbody>
                <tfoot>
               <!--  <tr>
                  <th>Rendering engine</th>
                  <th>Browser</th>
                </tr> -->
                </tfoot>
              </table>
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
