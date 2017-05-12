@extends('admin.layouts.dashboard_layout')
@section('title', 'CMS Edit')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        CMS Edit
       <!--  <small>advanced tables</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="{!!URL::to('/admin/dashboard')!!}">Home</a></li>
        <li><a href="{!!URL::to('/admin/cmspagedetail')!!}">CMS</a></li>
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
              <h3 class="box-title">Edit {{ $cmspagedata->slag }} </h3>
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
                 {{ Form::model($cmspagedata,array('method' => 'PATCH','role'=>'form','url' => array('admin/cmspagedetail/update', $cmspagedata->id),'id'=>'cmspage_edit')) }}
                    
                    <div class="col-md-6">
                         <!-- form-group dropdown-->
                        <div class="form-group">
                           {!! Html::decode(Form::label('cmspage_id','CMS Page: <span style="color:red;">*</span>')) !!}
                           {!! Form::select('cmspage_id',['' => 'Select'] +$cmspage_id_list, null, ['class' => 'form-control select2']) !!}
                           {!! Html::decode('<span class="text-danger">'.$errors->first("cmspage_id").'</span>') !!} 
                        </div>
                        <!-- /.form-group dropdown-->

                        <!-- text input -->
                        <div class="form-group">
                          {!! Html::decode(Form::label('slag','Page variable: <span style="color:red;">*</span>')) !!}
                          {!! Form::text('slag',null,array('class'=>'form-control','id'=>'slag', 'readonly'=>'readonly','placeholder'=>'Enter Slug')) !!}
                        </div>                        
                        <!-- /.text input -->

                        <!-- textarea input -->
                        <div class="form-group">
                          {!! Html::decode(Form::label('description','Variable\'s value: <span style="color:red;">*</span>')) !!}
                          {!! Form::textarea('description',null,array('class'=>'form-control','id'=>'textarea_id','placeholder'=>'Enter description')) !!}
                          {!! Html::decode('<span class="text-danger">'.$errors->first("description").'</span>') !!}
                        </div>
                        <!-- /.textarea input -->
                       
                         
                       

                        <div class="form-group">
                          <label for="name">Status: </label>
                          <select name="status" id="status" class="form-control" autofocus >
                            <option value="1" {{ $cmspagedata->status == "1" ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ $cmspagedata->status == "0" ? 'selected' : '' }}>In-Active</option>
                          </select>                          
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