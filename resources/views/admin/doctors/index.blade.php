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
              @if (Session::has('message'))
                  <div class="alert alert-info">{{ Session::get('message') }}</div>
              @endif
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Mobile No</th>
                    <th>City</th>
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

                          <a href="{!!URL::to('/admin/doctors/edit',$dd->id)!!}" class="btn btn-primary">Edit</a>&nbsp;|&nbsp;
                          <a href="/admin/doctors/delete/{{$dd->id}}" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger" >Delete</a>
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
