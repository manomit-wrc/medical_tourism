@extends('admin.layouts.dashboard_layout')
@section('title', 'Faq Add')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Faq Add
       <!--  <small>advanced tables</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="{!!URL::to('/admin/dashboard')!!}">Home</a></li>
        <li><a href="{!!URL::to('/admin/faq')!!}">Faq List</a></li>
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
            <!-- @if($errors->any())
              <div class="alert alert-danger">
                  @foreach($errors->all() as $error)
                      <p>{{ $error }}</p>
                  @endforeach
              </div>
            @endif -->
            <div class="box-body">
             
                 {!! Form::open(array('method' => 'POST','role'=>'form','url'=>'admin/faq/store','id'=>'faq_add')) !!}
                    
                    <div class="col-md-6">
                        

                        <!-- text input -->
                        <div class="form-group">
                          {!! Html::decode(Form::label('title','Question: <span style="color:red;">*</span>')) !!}
                          {!!Form::text('title','',array('class'=>'form-control','id'=>'title','placeholder'=>'Enter  Question')) !!}
                          {!! Html::decode('<span class="text-danger">'.$errors->first("title").'</span>') !!}
                        </div>
                         <!-- /.text input -->
                         <!-- text input -->
                        <div class="form-group">
                          {!! Html::decode(Form::label('description','Answer: <span style="color:red;">*</span>')) !!}
                          {!! Form::textarea('description','',array('class'=>'form-control ','id'=>'description','placeholder'=>'Enter Answer')) !!}
                          {!! Html::decode('<span class="text-danger">'.$errors->first("description").'</span>') !!}
                        </div>
                        <!-- /.text input -->                                              
                        <div class="form-group">
                          {!! Html::decode(Form::label('faqcategory_id','Faq Category: <span style="color:red;">*</span>')) !!}
                          {!! Form::select('faqcategory_id',['' => 'Select'] +$category_list, null, ['class' => 'form-control select2']) !!}
                          {!! Html::decode('<span class="text-danger">'.$errors->first("faqcategory_id").'</span>') !!}                         
                        </div>             

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