@extends('admin.layouts.dashboard_layout')
@section('title', 'News')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        News
       <!--  <small>advanced tables</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="{!!URL::to('/admin/dashboard')!!}">Home</a></li>
        <li><a href="{!!URL::to('/admin/news')!!}">News</a></li>
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
              <h3 class="box-title">Edit {{ $news_data->name }}</h3>
            </div>
             <!-- if there are creation errors, they will show here -->
             
            <!-- /.box-header -->
           <!--  @if($errors->any())
             <div class="alert alert-danger">
                 @foreach($errors->all() as $error)
                     <p>{{ $error }}</p>
                 @endforeach
             </div>
           @endif -->
            <div class="box-body">
                 {{ Form::model($news_data,array('method' => 'PATCH','role'=>'form','files' => true,'url' => array('admin/news/update', $news_data->id),'id'=>'news_edit')) }}
                    
                    <div class="col-md-6">
                        

                        <!-- text input -->
                        <div class="form-group">
                          {!! Html::decode(Form::label('title','News title: <span style="color:red;">*</span>')) !!}
                          {!! Form::text('title',null,array('class'=>'form-control','id'=>'title','placeholder'=>'Enter news title')) !!}
                          {!! Html::decode('<span class="text-danger">'.$errors->first("title").'</span>') !!}
                        </div>
                        <!-- /.text input -->

                        <!-- text input -->
                        <div class="form-group">
                          {!! Html::decode(Form::label('description','Description: <span style="color:red;">*</span>')) !!}
                          {!! Form::textarea('description',null,array('class'=>'form-control','id'=>'description','placeholder'=>'Enter news')) !!}
                          {!! Html::decode('<span class="text-danger">'.$errors->first("description").'</span>') !!}
                        </div>
                        <!-- /.text input -->

                        <!-- file input -->
                        <div class="form-group">
                          {!! Html::decode(Form::label('news_image','News image: ')) !!}
                          <img src="{{url('/uploads/news/thumb_352_170/'.$news_data->news_image)}}" alt="News Image" class="img_broder">
                          {!! Form::file('news_image', null) !!}
                          <span style="color:red;">* (Image must be minimum of 745x214)</span>
                          {!! Html::decode('<br /><span class="text-danger">'.$errors->first("news_image").'</span>') !!}
                        </div>
                         <!-- /.file input -->
                        
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