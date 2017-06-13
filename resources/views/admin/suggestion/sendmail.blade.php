@extends('admin.layouts.dashboard_layout')
@section('title', 'Contact Reply')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Contact Reply
       <!--  <small>advanced tables</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="{!!URL::to('/admin/dashboard')!!}">Home</a></li>        
        <li class="active">Contact Reply</li>
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
                <div class="box-body">
                  <div class="col-md-6">
                    {{ Form::model($contactdata[0],array('method' => 'PATCH','role'=>'form','files' => false,'url' => array('admin/contact/send', $contactdata[0]['id']),'id'=>'send_edit')) }}                     
                        <div class="form-group">
                          {!! Html::decode(Form::label('email','Send To: <span style="color:red;">*</span>')) !!}
                          {!! Form::text('email',null,array('class'=>'form-control','readonly'=>'readonly','id'=>'email','placeholder'=>'Enter email')) !!}                      
                        </div>                   
                        <div class="form-group">
                          {!! Html::decode(Form::label('send_message','Message: <span style="color:red;">* </span>')) !!}
                          {!! Form::textarea('send_message','',array('class'=>'form-control','id'=>'send_message','placeholder'=>'Enter Message')) !!} 
                          {!! Html::decode('<span class="text-danger">'.$errors->first("send_message").'</span>') !!}                         
                        </div>
                        <div>
                          {!! Form::submit('submit',array('class'=>'btn btn-primary pull-left','id'=>''))!!}
                        </div>                                         
                    </div>
                    {!! Form::close() !!}
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