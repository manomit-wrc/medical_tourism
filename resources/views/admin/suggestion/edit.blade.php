@extends('admin.layouts.dashboard_layout')
@section('title', 'View Suggestion')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        View Suggestion
       <!--  <small>advanced tables</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="{!!URL::to('/admin/dashboard')!!}">Home</a></li>  
        <li><a href="{!!URL::to('/admin/suggestion')!!}">Suggestions</a></li>       
        <li class="active">View Suggestion</li>
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
              <h3 class="box-title"><span><i class="fa fa-eye"></i></span> View details of {{ $contactdata[0]['name'] }}  </h3>
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
                    <div class="col-md-6"> 
                      <div class="form-group">
                          {!! Html::decode(Form::label('name','Name: ')) !!}
                          {{ ($contactdata[0]['name'])?  $contactdata[0]['name']:''}}
                      </div>
                      <div class="form-group">
                          {!! Html::decode(Form::label('email','Email: ')) !!}
                          {{ ($contactdata[0]['email'])? $contactdata[0]['email']:'' }}
                      </div>
                      <div class="form-group">
                          {!! Html::decode(Form::label('mobile_no','Phono No: ')) !!}
                          {{ ($contactdata[0]['mobile_no'])? $contactdata[0]['mobile_no']:'' }}
                      </div>
                      <div class="form-group">
                          {!! Html::decode(Form::label('subject','Subject: ')) !!}
                          {{ ($contactdata[0]['subject'])? $contactdata[0]['subject']:'' }}
                      </div> 
                      <div class="form-group">
                          {!! Html::decode(Form::label('message','Message: ')) !!}
                          {{ ($contactdata[0]['message'])? $contactdata[0]['message']:'' }}
                      </div>                        
                        <!-- /.input button -->
                    </div>             
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