@extends('admin.layouts.dashboard_layout')
@section('title', 'Album')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      {{ $album->name }}
      </h1>
      <ol class="breadcrumb">
        <li><a href="{!!URL::to('/admin/dashboard')!!}">Home</a></li>
        <li><a href="{!!URL::to('/admin/albums')!!}">Album</a></li>
        <li class="active">Details</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <!-- <h3 class="box-title">Title</h3> -->

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <!-- <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button> -->
          </div>
        </div>
        <div class="box-body">
          
         
          <div class="container">
            <div class="starter-template">
                <div class="media">
                  <img class="media-object pull-left" alt="{{$album->name}}" src="{{url('/uploads/albums/'.$album->cover_image)}}" width="350px">
                  <div class="media-body">
                    <h2 class="media-heading" style="font-size: 26px;">Album Name:</h2>
                    <p>{{$album->name}}</p>
                    <div class="media">
                        <h2 class="media-heading" style="font-size: 26px;">AlbumDescription :</h2>
                        <p>{{$album->description}}<p>
                        <a href="{{URL::route('add_image',array('id'=>$album->id))}}"><button type="button"class="btn btn-primary btn-large">Add New Image to Album</button></a>
                        <a href="{{URL::route('delete_album',array('id'=>$album->id))}}" onclick="return confirm('Are yousure?')"><button type="button"class="btn btn-danger btn-large">Delete Album</button></a>
                    </div>
                  </div>
                </div>
            </div>
          </div>


          <div class="row">
              @foreach($album->Photos as $photo)
              <div class="col-lg-3">
              <div class="thumbnail" style="max-height: 350px;min-height: 350px;">
              <img alt="{{$album->name}}" src="{{url('/uploads/albums/'.$photo->image)}}">
              <div class="caption">
              <p>{{$photo->description}}</p>
              <p><p>Created date:  {{ date("d F Y",strtotime($photo->created_at)) }} at {{ date("g:ha",strtotime($photo->created_at)) }}</p></p>
              <a href="{{URL::route('delete_image',array('id'=>$photo->id))}}" onclick="return confirm('Are you sure?')"><button type="button" class="btn btn-danger btn-small">Delete Image </button></a>
              </div>
              </div>
              </div>
              @endforeach
          </div>


        </div>
        <!-- /.box-body -->
        <!-- <div class="box-footer">
          Footer
        </div> -->
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@stop