@extends('admin.layouts.dashboard_layout')
@section('title', 'PackageType')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        PackageType
       <!--  <small>advanced tables</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admin/dashboard">Home</a></li>
        <li class="active">PackageType</li>
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

            <div class="topbtn"><a href="{{ url('/admin/package-types/create') }}"><button type="button" class="btn bg-purple btn-rightad">ADD</button></a></div>

            <!-- /.box-header -->
            <div class="box-body">
              <div class="alert alert-info" id="result77" style="display:none;"></div>
              @if (Session::has('message'))
                  <div class="alert alert-info" id="result7">{{ Session::get('message') }}</div>
              @endif
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Type Name</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th width="11%">Actions</th>
                  </tr>
                </thead>

                <tbody>
                  @if (count($package_type_list) > 0)
                    @foreach($package_type_list as $news_data)
                      <tr>
                        <td>{{ $news_data->name }}</td>
                        <td>{!! $news_data->description !!}</td>
                        <!-- <td>{{ ($news_data->status ==1)? 'Active':'In-Active' }}</td> -->
                        <td>
                          @if($news_data->status ==1)
                            <span data-toggle="tooltip" data-original-title="Click here to change status">
                            <input type="checkbox" checked id="tog{{ $news_data->id }}" onchange="return changeStatus('/admin/ajaxpacktypechangestatus',{{ $news_data->id }})" value="1"  data-toggle="toggle2">
                            </span>
                          @endif
                          @if($news_data->status ==0)
                          <span data-toggle="tooltip" data-original-title="Click here to change status">
                            <input type="checkbox" id="tog{{ $news_data->id }}"  onchange="return changeStatus('/admin/ajaxpacktypechangestatus',{{ $news_data->id }})" value="0" data-toggle="toggle2">
                          </span>
                          @endif
                        </td>
                        <td>
                          <a href="{!!URL::to('/admin/package-types/edit',$news_data->id)!!}" class="btn btn-primary">Edit</a>
                          <a href="javascript:void(0)" onclick="return deldata('{!!URL::to('/admin/package-types/delete',$news_data->id)!!}')" class="btn btn-danger" >Delete</a>
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
