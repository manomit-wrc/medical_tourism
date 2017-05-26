@extends('admin.layouts.dashboard_layout')
@section('title', 'Enquiry List')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Enquiry List
       <!--  <small>advanced tables</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Enquiry List</li>
        
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
            <!-- /.box-header -->
            <div class="box-body">
              @if (Session::has('message'))
                  <div class="alert alert-info" id="result7">{{ Session::get('message') }}</div>
              @endif
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>City</th>
                    <th>Actions</th>
                  </tr>
                </thead>               
                <tbody>                        
                  @if (count($enqdata) > 0)
                    @foreach($enqdata as $enqval)                                  
                      <tr style="background:{{ ($enqval->status=='2') ? '#e8e8e8':'' }}">
                        <td>{{ $enqval->full_name }}</td>
                        <td>{{ $enqval->email }}</td>
                        <td>{{ $enqval->mobile_no }}</td>
                        <td>{{ $enqval->city->name }}</td>
                        <td>                       
                         <a href="{!!URL::to('/admin/enquiry/details',$enqval->id)!!}" class="btn btn-success">View</a>
                         <a href="{!!URL::to('/admin/enquiry/sendmail',$enqval->id)!!}" class="btn btn-warning">
                         {{ ($enqval->send_status==1) ? 'Send' : 'Resend' }}</a>
                        </td>
                      </tr>
                    @endforeach
                  @endif
                </tbody>
                <tfoot>
                <!-- <tr>
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