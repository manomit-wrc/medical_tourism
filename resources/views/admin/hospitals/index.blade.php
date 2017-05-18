@extends('admin.layouts.dashboard_layout')
@section('title', 'Hospital')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Hospital
       <!--  <small>advanced tables</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Hospital</li>
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

            <div class="topbtn"><a href="{!!URL::to('/admin/hospitals/create')!!}"><button type="button" class="btn bg-purple btn-rightad">ADD</button></a></div>

            <!-- /.box-header -->
            <div class="box-body">
              <div class="alert alert-info" id="result77" style="display:none;"></div>
              @if (Session::has('message'))
                  <div class="alert alert-info" id="result7">{{ Session::get('message') }}</div>
              @endif
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Hospital name</th>
                    <th>Address</th>
                    <th>Status</th>
                    <th width="35%">Actions</th>
                  </tr>
                </thead>
               
                <tbody>
                  @if (count($hospitals_list) > 0)
                    @foreach($hospitals_list as $hospitals_list)
                      <tr>
                        <td>{{ $hospitals_list->name }}</td>
                        <td>{{ $hospitals_list->street_address }} , {{ $hospitals_list->city->name }} , {{ $hospitals_list->city->state->name }} , {{ $hospitals_list->city->state->country->name }}</td>
                        <td>
                          @if($hospitals_list->status ==1)
                            <span data-toggle="tooltip" data-original-title="Click here to change status">
                            <input type="checkbox" checked id="tog{{ $hospitals_list->id }}" onchange="return changeStatus('/admin/hospitals/changestatus',{{ $hospitals_list->id }})" value="1"  data-toggle="toggle2">
                            </span>
                          @endif
                          @if($hospitals_list->status ==0)
                          <span data-toggle="tooltip" data-original-title="Click here to change status">
                            <input type="checkbox" id="tog{{ $hospitals_list->id }}"  onchange="return changeStatus('/admin/hospitals/changestatus',{{ $hospitals_list->id }})" value="0" data-toggle="toggle2">
                          </span>
                          @endif
                        </td>
                        <td>
                          <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                            <!-- we will add this later since its a little more complicated than the other two buttons -->                             
                          <a href="{!!URL::to('/admin/hospitals/show',$hospitals_list->id)!!}" class="btn btn-info">view</a>
                          <a href="{!!URL::to('/admin/hospitals/treatment',$hospitals_list->id)!!}" class="btn btn-warning">Treatment</a>
                          <a href="{!!URL::to('/admin/hospitals/medicaltest',$hospitals_list->id)!!}" class="btn btn-warning">Medical Test</a>   
                          <a href="{!!URL::to('/admin/hospitals/edit',$hospitals_list->id)!!}" class="btn btn-primary">Edit</a>
                          <a href="javascript:void(0)" onclick="return deldata('{!!URL::to('/admin/hospitals/delete',$hospitals_list->id)!!}')" class="btn btn-danger" >Delete</a>
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