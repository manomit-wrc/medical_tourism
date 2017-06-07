@extends('admin.layouts.dashboard_layout')
@section('title', 'Album')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Album
       <!--  <small>advanced tables</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Album</li>
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

            <div class="topbtn"><a href="{!!URL::to('/admin/albums/createalbum')!!}"><button type="button" class="btn bg-purple btn-rightad" ata-toggle="tooltip" data-original-title="Add"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp; ADD</button></a></div>

            <!-- /.box-header -->
            <div class="box-body">
              <div class="alert alert-info" id="result77" style="display:none;"></div>
              @if (Session::has('message'))
                  <div class="alert alert-info" id="result7">{{ Session::get('message') }}</div>
              @endif
              <table id="datatbl_banner_id" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Cover image</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Images</th>
                    <th>Created date</th>
                  <!--   <th>Status</th> -->
                    <th width="11%">Actions</th>
                    <th style="display:none;"></th>
                  </tr>
                </thead>
               
                <tbody>
                  @if (count($albums) > 0)
                    @foreach($albums as $album)
                      <tr>
                        <td>
                          <img class="procedure_img" src="{{url('/uploads/albums/'.$album->cover_image)}}" alt="{{ $album->name }}" >
                        </td>
                        <td>{{$album->name}}</td>
                        <td>{{$album->description}}</td>
                        <td>{{count($album->Photos)}} image(s).</td>
                         <td>{{ date("d F Y",strtotime($album->created_at)) }} at {{date("g:ha",strtotime($album->created_at)) }}</td>
                       <!--  <td>
                          @if($album->status ==1)
                            <span data-toggle="tooltip" data-original-title="Click here to change status">
                            <input type="checkbox" checked id="tog{{ $album->id }}" onchange="return changeStatus('/admin/banner/changestatus',{{ $album->id }})" value="1"  data-toggle="toggle2">
                            </span>
                          @endif
                          @if($album->status ==0)
                          <span data-toggle="tooltip" data-original-title="Click here to change status">
                            <input type="checkbox" id="tog{{ $album->id }}"  onchange="return changeStatus('/admin/banner/changestatus',{{ $album->id }})" value="0" data-toggle="toggle2">
                          </span>
                          @endif
                        </td> -->
                        <td>
                          <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                          <a href="{!!URL::to('/admin/albums/showalbum',$album->id)!!}" class="btn btn-info">Show Gallery</a>
                          
                          <a href="{!!URL::to('/admin/albums/updatealbum',$album->id)!!}" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil-square-o" style="color:green;" aria-hidden="true"></i></a>&nbsp;                         
                          <a href="{{URL::route('delete_album',array('id'=>$album->id))}}" onclick="return confirm('Are yousure?')"><i class="fa fa-times" style="color:red;" aria-hidden="true"></i></a>
                        </td>
                        <td style="display:none;"><input type="hidden" value="{{ $album->id }}"></td>
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