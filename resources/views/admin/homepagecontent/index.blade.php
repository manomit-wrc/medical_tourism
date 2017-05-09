@extends('admin.layouts.dashboard_layout')
@section('title', 'Home Page Content')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Home Page Content
       <!--  <small>advanced tables</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="{!!URL::to('/admin/dashboard')!!}">Home</a></li>        
        <li class="active">Home Page Content</li>
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
                  {{ Form::model($homepagecondata[0],array('method' => 'PATCH','role'=>'form','files' => true,'url' => 'admin/homepagecontent/store','id'=>'homepagecontent_add')) }}                    
                    <div class="col-md-6"> 
                    <!-- text input -->                        
                        <div class="form-group">
                          {!! Html::decode(Form::label('medical_category_description','Medical Category Description: <span style="color:red;">*</span>')) !!}
                            {!! Form::textarea('medical_category_description',null,array('class'=>'form-control','id'=>'medical_category_description', 'rows'=>'4', 'cols'=>'50', 'placeholder'=>'Enter Medical Category Description')) !!}
                        </div>
                        <div class="form-group">
                            {!! Html::decode(Form::label('accomodation_left_title','Accomodation Left Title: <span style="color:red;">*</span>')) !!}
                            {!! Form::text('accomodation_left_title',null,array('class'=>'form-control','id'=>'accomodation_left_title','placeholder'=>'Enter Accomodation Left Title')) !!}
                        </div>
                        <!-- /.text input -->

                        <!-- text input -->
                        <!-- <div class="form-group">
                          {!! Html::decode(Form::label('description','Description: <span style="color:red;">*</span>')) !!}
                          {!! Form::textarea('description','',array('class'=>'form-control ','id'=>'textarea_id','placeholder'=>'Enter description')) !!}
                        </div>
                        /.text input
                        
                        file input
                        <div class="form-group">
                          {!! Html::decode(Form::label('story_image','Image: <span style="color:red;">* (Image must be minimum of 243x149)</span>')) !!}
                          {!! Form::file('story_image', null) !!}
                        </div> -->
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