@extends('admin.layouts.dashboard_layout')
@section('title', 'Doctor')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Doctors List
       <!--  <small>advanced tables</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="javascript:void(0)">Home</a></li>
        <li class="active">Doctors</li>

      </ol>
    </section>
    <style>
        .toggle2 {
          height: 23px !important;
        }
    </style>

    <!-- Main content -->
     <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <!-- <h3 class="box-title">Data Table With Full Features</h3> -->
            </div>


            <div class="topbtn"><a href="{{ url('/admin/doctors/create') }}"><button type="button" class="btn bg-purple btn-rightad">ADD</button></a></div>

            <!-- /.box-header -->
            <div class="box-body">
              <div class="alert alert-info" id="result77" style="display:none;"></div>
              @if (Session::has('message'))
                  <div class="alert alert-info" id="result7">{{ Session::get('message') }}</div>
              @endif
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Mobile No</th>
                    <th>City</th>
                    <th>Status</th>
                    <th width="11%">Actions</th>
                  </tr>
                </thead>

                <tbody>
                  @if (count($doctor_data) > 0)

                    @foreach($doctor_data as $dd)
                      <tr>
                        <td>{{ $dd->first_name }}</td>
                        <td>{{ $dd->last_name }}</td>
                        <td>{{ $dd->email }}</td>
                        <td>{{ $dd->mobile_no }}</td>
                        <td>{{ $dd->cities->name }}</td>
                        <td>
                          @if($dd->status ==1)
                            <span data-toggle="tooltip" data-original-title="Click here to change status">
                            <input type="checkbox" checked id="tog{{ $dd->id }}" onchange="return changeStatus('/admin/ajaxdoctorchangestatus',{{ $dd->id }})" value="1"  data-toggle="toggle2">
                            </span>
                          @endif
                          @if($dd->status ==0)
                          <span data-toggle="tooltip" data-original-title="Click here to change status">
                            <input type="checkbox" id="tog{{ $dd->id }}"  onchange="return changeStatus('/admin/ajaxdoctorchangestatus',{{ $dd->id }})" value="0" data-toggle="toggle2">
                          </span>
                          @endif
                        </td>
                        <td>
                          <a href="{!!URL::to('/admin/doctors/edit',$dd->id)!!}" class="btn btn-primary">Edit</a>
                          <a href="javascript:void(0)" onclick="return deldata('{!!URL::to('/admin/doctors/delete',$dd->id)!!}')" class="btn btn-danger" >Delete</a>
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
