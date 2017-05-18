@extends('admin.layouts.dashboard_layout')
@section('title', 'Role')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Role
       <!--  <small>advanced tables</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="javascript:void(0)">Home</a></li>
        <li class="active">Role</li>

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

            <div class="topbtn"><a href="{{ route('create-role') }}"><button type="button" class="btn bg-purple btn-rightad">ADD</button></a></div>

            <!-- /.box-header -->
            <div class="box-body">
              <div class="alert alert-info" id="result77" style="display:none;"></div>
              @if (Session::has('message'))
                  <div class="alert alert-info" id="result7">{{ Session::get('message') }}</div>
              @endif
              <table id="datatbl_role_id" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th style="display:none;"></th>
                    <th>Role name</th>
                    <th>Status</th>
                    <th width="11%">Actions</th>
                  </tr>
                </thead>

                <tbody>
                  @if (count($data) > 0)
                    @foreach($data as $d)
                      <tr>
                        <td style="display:none;"><input type="hidden" value="{{ $d->id }}"></td>
                        <td>{{ $d->name }}</td>
                        <!-- <td>{{ $d->status == '1' ? 'Active' : 'Inactive'}}</td> -->
                        <td>
                         @if($d->id==1)<!--////Role 1 is for super admin do not active/deactivate it////--> 
                            <div class="status-on">
                              <span>On</span>
                            </div>
                         @else   
                              @if($d->status ==1)
                                <span data-toggle="tooltip" data-original-title="Click here to change status">
                                <input type="checkbox" checked id="tog{{ $d->id }}" onchange="return changeStatus('/admin/role/changestatus',{{ $d->id }})" value="1"  data-toggle="toggle2">
                                </span>
                              @endif
                              @if($d->status ==0)
                              <span data-toggle="tooltip" data-original-title="Click here to change status">
                                <input type="checkbox" id="tog{{ $d->id }}"  onchange="return changeStatus('/admin/role/changestatus',{{ $d->id }})" value="0" data-toggle="toggle2">
                              </span>
                              @endif
                         @endif
                        </td>
                        <td>
                          @if($d->id!=1)<!--////Role 1 is for super admin do not edit/delete it////--> 
                             <a href="{!!URL::to('/admin/role/edit',$d->id)!!}" class="btn btn-primary">Edit</a>
                             <a href="javascript:void(0)" onclick="return deldata('{!!URL::to('/admin/role/delete',$d->id)!!}')" class="btn btn-danger" >Delete</a>
                          @else
                          <span style="text-align: center;"> N/A</span>
                          @endif 
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
