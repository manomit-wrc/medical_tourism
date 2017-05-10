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
        <li><a href="{!!URL::to('/admin/dashboard')!!}">Home</a></li>
        <li><a href="{!!URL::to('/admin/banner')!!}">Banner</a></li>
        <li class="active">Edit</li>
      </ol>
    </section>

  <!-- Main content -->
    <section class="content">
      <div class="row">
  
        <!-- right column -->
        <div class="col-md-12">
          <!-- Horizontal Form -->
          
          <!-- /.box -->
          <!-- general form elements disabled -->
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Edit {{ $banners_data->banner_heading }}</h3>
            </div>
             <!-- if there are creation errors, they will show here -->
             
            <!-- /.box-header -->
            @if($errors->any())
              <div class="alert alert-danger">
                  @foreach($errors->all() as $error)
                      <p>{{ $error }}</p>
                  @endforeach
              </div>
            @endif
            <div class="box-body">
                 {{ Form::model($banners_data,array('method' => 'PATCH','role'=>'form','files' => true,'url' => array('admin/banner/update', $banners_data->id),'id'=>'banner_edit')) }}
                    
                    <div class="col-md-6">
                        
                         <!-- file input -->
                        <div class="form-group">
                          {!! Html::decode(Form::label('banner_image','Banner image: <span style="color:red;">* (Image must be 1700x601)</span>')) !!}
                          <img src="{{url('/uploads/banners/thumb/'.$banners_data->banner_image)}}" alt="Banner Image">
                          {!! Form::file('banner_image', null) !!}
                        </div>
                         <!-- /.file input -->
                         
                          <!-- text input -->
                        <div class="form-group">
                          {!! Html::decode(Form::label('banner_heading','Banner heading: <span style="color:red;">* </span>')) !!}
                          {!! Form::text('banner_heading',null,array('class'=>'form-control','id'=>'banner_heading','placeholder'=>'Enter banner heading')) !!}
                        </div>
                        <!-- /.text input -->

                        <!-- text input -->
                        <div class="form-group">
                          {!! Form::label('banner_sub_heading', 'Banner sub heading:') !!}
                          {!! Form::text('banner_sub_heading',null,array('class'=>'form-control','id'=>'banner_sub_heading','placeholder'=>'Enter banner sub heading')) !!}
                        </div>
                        <!-- /.text input -->

                        <!-- text input -->
                        <div class="form-group">
                          {!! Html::decode(Form::label('banner_url','Youtube video url: <span style="color:red;">* </span>')) !!}
                          {!! Form::text('banner_url',null,array('class'=>'form-control','id'=>'banner_url','placeholder'=>'Enter youtube video url')) !!}
                        </div>
                        <!-- /.text input -->
                       
                        
                         <!-- input button -->
                        <div>
                           {!! Form::submit('submit',array('class'=>'btn btn-primary pull-left','id'=>'exact-submit-button'))!!}
                        </div>
                        <!-- /.input button -->
                    </div>
                
                {!! Form::close() !!}
              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@stop