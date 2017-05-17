@extends('admin.layouts.dashboard_layout')
@section('title', 'Connectivity service')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Connectivity
       <!--  <small>advanced tables</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="{!!URL::to('/admin/dashboard')!!}">Home</a></li>
        <li><a href="{!!URL::to('/admin/providerconnectivity')!!}">Connectivity</a></li>
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
             
                 {!! Form::open(array('method' => 'POST','role'=>'form','url'=>'admin/providerconnectivityservices/store','id'=>'providerconnectivityservices_add')) !!}
                    
                    <div class="col-md-6">
                        
                         <!-- form-group dropdown-->
                        <div class="form-group">
                           {!! Html::decode(Form::label('provider_connectivity_id','Connectivity name: <span style="color:red;">*</span>')) !!}
                           {!! Form::select('provider_connectivity_id',[''=>'select']+$pro_conn_data, null, ['class' => 'form-control select2']) !!}
                        </div>
                        <!-- /.form-group dropdown-->
                        @if (count($connectivity_serv_data) > 0)
                          @foreach($connectivity_serv_data as $key => $value)
                            <!-- text input -->
                            <div class="form-group">
                              {{ $value }}
                              {!! Html::decode(Form::label('description',' : <span style="color:red;">*</span>')) !!}
                              <input id="connectivity_service_id" name="connectivity_service_id[]" type="hidden" value="{{ $key }}">
                              {!! Form::textarea('description[]','',array('class'=>'form-control','id'=>'description'.$key,'placeholder'=>'Enter description')) !!}
                            </div>
                            <!-- /.text input -->
                           @endforeach
                        @endif

                        
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