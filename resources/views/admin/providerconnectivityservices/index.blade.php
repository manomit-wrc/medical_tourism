@extends('admin.layouts.dashboard_layout')
@section('title', 'Connectivity service')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Connectivity services
       <!--  <small>advanced tables</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Connectivity services</li>
        
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

            <div class="topbtn"><a href="{!!URL::to('/admin/providerconnectivityservices/create')!!}"><button type="button" class="btn bg-purple btn-rightad">ADD</button></a></div>

            <!-- /.box-header -->
            <div class="box-body">
              @if (Session::has('message'))
                  <div class="alert alert-info">{{ Session::get('message') }}</div>
              @endif
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Connectivity name</th>
                    <th>Service name</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                </thead>
               
                <tbody>
                  @if (count($conn_services_lists) > 0)
                    @foreach($conn_services_lists as $conn_services_lists)
                      <tr>
                        <td>{{ $conn_services_lists->provider_connectivity_id }}</td>
                        <td>{{ $conn_services_lists->connectivity_service_id }}</td>
                        <td>{{ $conn_services_lists->description }}</td>
                        <td>
                          @if($conn_services_lists->status ==1)
                            <span data-toggle="tooltip" data-original-title="Click here to change status">
                            <input type="checkbox" checked id="tog{{ $conn_services_lists->id }}" onchange="return changeStatus('/admin/providerconnectivityservices/changestatus',{{ $conn_services_lists->id }})" value="1"  data-toggle="toggle2">
                            </span>
                          @endif
                          @if($conn_services_lists->status ==0)
                          <span data-toggle="tooltip" data-original-title="Click here to change status">
                            <input type="checkbox" id="tog{{ $conn_services_lists->id }}"  onchange="return changeStatus('/admin/providerconnectivityservices/changestatus',{{ $conn_services_lists->id }})" value="0" data-toggle="toggle2">
                          </span>
                          @endif
                        </td>
                        <td>
                          <a href="{!!URL::to('/admin/providerconnectivityservices/edit',$conn_services_lists->id)!!}" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil-square-o" style="color:green;" aria-hidden="true"></i></a>&nbsp;                        
                          <a href="javascript:void(0)" onclick="return deldata('{!!URL::to('/admin/providerconnectivityservices/delete',$conn_services_lists->id)!!}')" data-toggle="tooltip" data-original-title="Delete" ><i class="fa fa-times" style="color:red;" aria-hidden="true"></i></a>
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