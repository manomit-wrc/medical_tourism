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
              <h3 class="box-title">Edit {{ $succstory_data->title }}</h3>
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
                 {{ Form::model($succstory_data,array('method' => 'PATCH','role'=>'form','files' => true,'url' => array('admin/successstories/update', $succstory_data->id),'id'=>'successstories_edit')) }}
                    
                    <div class="col-md-6">
                        

                        <!-- text input -->
                        <div class="form-group">
                          {!! Html::decode(Form::label('title','Title: <span style="color:red;">*</span>')) !!}
                          {!! Form::text('title',null,array('class'=>'form-control','id'=>'title','placeholder'=>'Enter title')) !!}
                        </div>
                        <!-- /.text input -->

                        <!-- text input -->
                        <div class="form-group">
                          {!! Html::decode(Form::label('description','Description: <span style="color:red;">*</span>')) !!}
                          {!! Form::textarea('description',null,array('class'=>'form-control','id'=>'textarea_id','placeholder'=>'Enter description')) !!}
                        </div>
                        <!-- /.text input -->

                        

                        <!-- file input -->
                        <div class="form-group">
                          {!! Html::decode(Form::label('story_image','Procedure image: <span style="color:red;">* (Image must be minimum of 243x149)</span>')) !!}
                          <img src="{{url('/uploads/successstories/thumb/'.$succstory_data->story_image)}}" alt="Procedure Image">
                          {!! Form::file('story_image', null) !!}
                        </div>
                         <!-- /.file input -->
                        
                         <!-- input button -->
                        <div class="box-footer">
                           {!! Form::submit('submit',array('class'=>'btn btn-primary pull-right','id'=>'exact-submit-button'))!!}
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