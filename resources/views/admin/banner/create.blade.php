@extends('admin.layouts.dashboard_layout')
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
            
            <!-- <div class="box-header with-border">
              <h3 class="box-title">General Elements</h3>
            </div> -->
            <!-- /.box-header -->
            @if($errors->any())
              <div class="alert alert-danger">
                  @foreach($errors->all() as $error)
                      <p>{{ $error }}</p>
                  @endforeach
              </div>
            @endif
            <div class="box-body">
             
                 {!! Form::open(array('method' => 'POST','role'=>'form','files' => true,'url'=>'admin/banner/store','id'=>'banner_add')) !!}
                    
                    <div class="col-md-6">
                        
                        <!-- file input -->
                        <div class="form-group">
                          {!! Form::label('Banner image') !!}
                          {!! Form::file('banner_image', null) !!}
                        </div>
                         <!-- /.file input -->

                        <!-- text input -->
                        <div class="form-group">
                          {!! Form::label('banner_heading', 'Banner heading:') !!}<span style="color:red;">*</span>
                          {!! Form::text('banner_heading','',array('class'=>'form-control','id'=>'banner_heading','placeholder'=>'Enter banner heading')) !!}
                        </div>
                        <!-- /.text input -->

                        <!-- text input -->
                        <div class="form-group">
                          {!! Form::label('banner_sub_heading', 'Banner sub heading:') !!}
                          {!! Form::text('banner_sub_heading','',array('class'=>'form-control','id'=>'banner_sub_heading','placeholder'=>'Enter banner sub heading')) !!}
                        </div>
                        <!-- /.text input -->

                        <!-- text input -->
                        <div class="form-group">
                          {!! Form::label('banner_url', 'Youtube video url:') !!}
                          {!! Form::text('banner_url','',array('class'=>'form-control','id'=>'banner_url','placeholder'=>'Enter youtube video url')) !!}
                        </div>
                        <!-- /.text input -->
                        
                        

                         <!-- input submit button -->
                        <div class="box-footer">
                           {!! Form::submit('submit',array('class'=>'btn btn-primary pull-right','id'=>'exact-submit-button'))!!}
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