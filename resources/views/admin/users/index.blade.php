@extends('admin.layouts.dashboard_layout')
@section('title', 'User')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Users
       <!--  <small>advanced tables</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="javascript:void(0)">Home</a></li>
        <li class="active">Users</li>

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

            <div class="topbtn"><a href="{{ url('/admin/adminuser/create') }}"><button type="button" class="btn bg-purple btn-rightad" data-toggle="tooltip" data-original-title="Add"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;ADD</button></a></div>

            <!-- /.box-header -->
            <div class="box-body">
              @if (Session::has('message'))
                  <div class="alert alert-info" id="result7">{{ Session::get('message') }}</div>
              @endif
              <table id="datatbl_admnusr_id" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th style="display:none;"></th>
                    <th>Role name</th>
                    <th>User name</th>
                    <th>Status</th>
                    <th width="11%">Actions</th>
                  </tr>
                </thead>

                <tbody>
               
                  @if (count($user_data) > 0)
                  
                    @foreach($user_data as $d)
                      <tr>
                        <td style="display:none;"><input type="hidden" value="{{ $d->id }}"></td>
                        <td>{{ !empty($d->roles[0]) ? $d->roles[0]->name : 'N/A' }}</td>
                        <td>{{ $d->name }}</td>
                        <td>
                          @if($d->status ==1)
                            <span data-toggle="tooltip" data-original-title="Click here to change status">
                            <input type="checkbox" checked id="tog{{ $d->id }}" onchange="return changeStatus('/admin/adminuser/changestatus',{{ $d->id }})" value="1"  data-toggle="toggle2">
                            </span>
                          @endif
                          @if($d->status ==0)
                          <span data-toggle="tooltip" data-original-title="Click here to change status">
                            <input type="checkbox" id="tog{{ $d->id }}"  onchange="return changeStatus('/admin/adminuser/changestatus',{{ $d->id }})" value="0" data-toggle="toggle2">
                          </span>
                          @endif
                        </td>
                        <td>
                          <a href="{!!URL::to('/admin/adminuser/edit',$d->id)!!}"  data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil-square-o" style="color:green;" aria-hidden="true"></i></a>&nbsp;
                          <a href="javascript:void(0)" onclick="return deldata('{!!URL::to('/admin/adminuser/delete',$d->id)!!}')" data-toggle="tooltip" data-original-title="Delete" ><i class="fa fa-times" style="color:red;" aria-hidden="true"></i></a>
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
