@extends('admin.layouts.dashboard_layout')
@section('title', 'Faq Edit')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Faq Edit
       <!--  <small>advanced tables</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="{!!URL::to('/admin/dashboard')!!}">Home</a></li>
        <li><a href="{!!URL::to('/admin/faq')!!}">Faq</a></li>
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
              <h3 class="box-title">Edit {{ $faqdata->title }} </h3>
            </div>
             <!-- if there are creation errors, they will show here -->
             
            <!-- /.box-header -->
            <!-- @if($errors->any())
              <div class="alert alert-danger">
                  @foreach($errors->all() as $error)
                      <p>{{ $error }}</p>
                  @endforeach
              </div>
            @endif -->
            <div class="box-body">
                 {{ Form::model($faqdata,array('method' => 'PATCH','role'=>'form','url' => array('admin/faq/update', $faqdata->id),'id'=>'faq_edit')) }}
                    
                    <div class="col-md-6">
                        

                        <!-- text input -->
                        <div class="form-group">
                          {!! Html::decode(Form::label('title','Question: <span style="color:red;">*</span>')) !!}
                          {!! Form::text('title',null,array('class'=>'form-control','id'=>'title','placeholder'=>'Enter Question')) !!}
                          {!! Html::decode('<span class="text-danger">'.$errors->first("title").'</span>') !!}
                        </div>  
                         <!-- /.text input -->
                        
                        <!-- text input -->
                        <div class="form-group">
                          {!! Html::decode(Form::label('description','Answer: <span style="color:red;">*</span>')) !!}
                          {!! Form::textarea('description',null,array('class'=>'form-control','id'=>'description','placeholder'=>'Enter description')) !!}
                          {!! Html::decode('<span class="text-danger">'.$errors->first("description").'</span>') !!}
                        </div>
                         <!-- /.text input -->

                        <div class="form-group">
                          {!! Html::decode(Form::label('faqcategory_id','Category: <span style="color:red;">*</span>')) !!}
                          {!! Form::select('faqcategory_id',['' => 'Select'] +$category_list, null, ['class' => 'form-control select2']) !!}                         
                          {!! Html::decode('<span class="text-danger">'.$errors->first("faqcategory_id").'</span>') !!}
                        </div>

                        <div class="form-group">
                          <label for="name">Status: </label>
                          <select name="status" id="status" class="form-control" autofocus >
                            <option value="1" {{ $faqdata->status == "1" ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ $faqdata->status == "0" ? 'selected' : '' }}>In-Active</option>
                          </select>                          
                        </div>
                        <!-- /.text input -->

                        <!-- textarea -->
                       <!--  <div class="form-group">
                          <label>Textarea</label>
                          <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                        </div> -->
                        <!-- /.textarea -->
                        
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