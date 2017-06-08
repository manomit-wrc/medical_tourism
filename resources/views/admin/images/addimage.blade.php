@extends('admin.layouts.dashboard_layout')
@section('title', 'Album Image')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add an Image to {{ $album->name }}
       <!--  <small>advanced tables</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="{!!URL::to('/admin/dashboard')!!}">Home</a></li>
        <li><a href="{!!URL::to('/admin/albums')!!}">Album</a></li>
        <li><a href="{!!URL::to('/admin/albums/showalbum/'.$album->id)!!}">{{ $album->name }}</a></li>
        <li class="active">Add</li>
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
             <!-- if there are creation errors, they will show here -->
            
           
            <div class="box-body">
             
                 {!! Form::open(array('method' => 'POST','role'=>'form','files' => true,'url'=>'admin/images/addimage','id'=>'banner_add')) !!}
                    
                    <div class="col-md-6"> 

                                           
                        <input id="album_id" name="album_id" type="hidden" value="{{ $album->id }}">
                        
                       
                        <!-- textarea input -->
                        <div class="form-group">
                          {!! Html::decode(Form::label('description','Image Description:')) !!}
                          {!! Form::textarea('description','',array('class'=>'form-control','id'=>'description','placeholder'=>'Enter description')) !!}
                          {!! Html::decode('<span class="text-danger">'.$errors->first("description").'</span>') !!}
                        </div>
                        <!-- /.textarea input -->

                        <!-- file input -->
                        <div class="form-group">
                          {!! Html::decode(Form::label('image','Image: <span style="color:red;">*</span>')) !!}
                          {!! Form::file('image', null) !!}
                         <!--  <span style="color:red;">* (Image must be 1700x601)</span> -->
                          {!! Html::decode('<br /><span class="text-danger">'.$errors->first("image").'</span>') !!}
                        </div>
                         <!-- /.file input -->

                        <!-- input submit button -->
                        <div>
                           {!! Form::submit('submit',array('class'=>'btn btn-primary pull-left','id'=>'exact-submit-button'))!!}
                        </div>
                        <!-- /.input submit button -->
                    </div>
                 {!! Form::token()!!}
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