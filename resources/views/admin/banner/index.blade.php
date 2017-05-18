@extends('admin.layouts.dashboard_layout')
@section('title', 'Banner')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Banner
       <!--  <small>advanced tables</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Banner</li>
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

            <div class="topbtn"><a href="{!!URL::to('/admin/banner/create')!!}"><button type="button" class="btn bg-purple btn-rightad">ADD</button></a></div>

            <!-- /.box-header -->
            <div class="box-body">
              <div class="alert alert-info" id="result77" style="display:none;"></div>
              @if (Session::has('message'))
                  <div class="alert alert-info" id="result7">{{ Session::get('message') }}</div>
              @endif
              <table id="datatbl_banner_id" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Banner image</th>
                    <th>Banner heading</th>
                    <th>Banner sub heading</th>
                    <th>Youtube url</th>
                    <th>Status</th>
                    <th width="11%">Actions</th>
                    <th style="display:none;"></th>
                  </tr>
                </thead>
               
                <tbody>
                  @if (count($banner_lists) > 0)
                    @foreach($banner_lists as $banner_lists)
                      <tr>
                        <td>
                          <img class="procedure_img" src="{{url('/uploads/banners/thumb/'.$banner_lists->banner_image)}}" alt="Banner Logo" >
                        </td>
                        <td>{{ $banner_lists->banner_heading }}</td>
                        <td>{{ $banner_lists->banner_sub_heading }}</td>
                        <td><a href="{{ $banner_lists->banner_url }}" target="_blank">{{ $banner_lists->banner_url }}</a></td>
                        <td>
                          @if($banner_lists->status ==1)
                            <span data-toggle="tooltip" data-original-title="Click here to change status">
                            <input type="checkbox" checked id="tog{{ $banner_lists->id }}" onchange="return changeStatus('/admin/banner/changestatus',{{ $banner_lists->id }})" value="1"  data-toggle="toggle2">
                            </span>
                          @endif
                          @if($banner_lists->status ==0)
                          <span data-toggle="tooltip" data-original-title="Click here to change status">
                            <input type="checkbox" id="tog{{ $banner_lists->id }}"  onchange="return changeStatus('/admin/banner/changestatus',{{ $banner_lists->id }})" value="0" data-toggle="toggle2">
                          </span>
                          @endif
                        </td>
                        <td>
                          <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                            <!-- we will add this later since its a little more complicated than the other two buttons -->                            
                          <a href="{!!URL::to('/admin/banner/edit',$banner_lists->id)!!}" class="btn btn-primary">Edit</a>                         
                          <a href="javascript:void(0)" onclick="return deldata('{!!URL::to('/admin/banner/delete',$banner_lists->id)!!}')" class="btn btn-danger" >Delete</a>
                        </td>
                        <td style="display:none;"><input type="hidden" value="{{ $banner_lists->id }}"></td>
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