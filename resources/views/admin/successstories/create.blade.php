@extends('admin.layouts.dashboard_layout')
@section('title', 'Success story')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Success story
       <!--  <small>advanced tables</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="{!!URL::to('/admin/dashboard')!!}">Home</a></li>
        <li><a href="{!!URL::to('/admin/successstories')!!}">Success story</a></li>
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
             
                 {!! Form::open(array('method' => 'POST','role'=>'form','files' => true,'url'=>'admin/successstories/store','id'=>'success_story_add')) !!}
                    
                    <div class="col-md-6">
                        

                        <!-- text input -->
                        <div class="form-group">
                          {!! Html::decode(Form::label('title','Title: <span style="color:red;">*</span>')) !!}
                          {!! Form::text('title','',array('class'=>'form-control','id'=>'title','placeholder'=>'Enter title')) !!}
                        </div>
                        <!-- /.text input -->

                        <!-- text input -->
                        <div class="form-group">
                          {!! Html::decode(Form::label('description','Description: <span style="color:red;">*</span>')) !!}
                          {!! Form::textarea('description','',array('class'=>'form-control ','id'=>'textarea_id','placeholder'=>'Enter description')) !!}
                        </div>
                        <!-- /.text input -->

                        <!-- file input -->
                        <div class="form-group">
                          {!! Html::decode(Form::label('story_image','Image: <span style="color:red;">* (Image must be minimum of 243x149)</span>')) !!}
                          {!! Form::file('story_image', null) !!}
                        </div>
                         <!-- /.file input -->

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