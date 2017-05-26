@extends('admin.layouts.dashboard_layout')
@section('title', 'Document Tag')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Document Tag
       <!--  <small>advanced tables</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="{!!URL::to('/admin/dashboard')!!}">Home</a></li>
        <li><a href="{!!URL::to('/admin/documenttag')!!}">Document Tag</a></li>
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
              <h3 class="box-title">Edit {{ $documenttag->tag_name }} </h3>
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
                 {{ Form::model($documenttag,array('method' => 'PATCH','role'=>'form','url' => array('admin/documenttag/update', $documenttag->id),'id'=>'documenttag_edit')) }}
                    
                    <div class="col-md-6">
                    <!-- text input -->
                        <div class="form-group">
                          {!! Html::decode(Form::label('tag_name','Tag Name: <span style="color:red;">*</span>')) !!}
                          {!! Form::text('tag_name',null,array('class'=>'form-control','id'=>'tag_name','placeholder'=>'Enter Name')) !!}
                          {!! Html::decode('<span class="text-danger">'.$errors->first("tag_name").'</span>') !!}
                        </div>
                        <div class="form-group">
                          <label for="name">Status: </label>
                          <select name="status" id="status" class="form-control" autofocus >
                            <option value="1" {{ $documenttag->status == "1" ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ $documenttag->status == "0" ? 'selected' : '' }}>In-Active</option>
                          </select>                          
                        </div>                        
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