@extends('admin.layouts.dashboard_layout')
@section('title', 'Immigration')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Immigration
       <!--  <small>advanced tables</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="{!!URL::to('/admin/dashboard')!!}">Home</a></li>
        <li><a href="{!!URL::to('/admin/immigration')!!}">Immigration</a></li>
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
              <h3 class="box-title">Edit {{ $immigration_data->name }}</h3>
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
                 {{ Form::model($immigration_data,array('method' => 'PATCH','role'=>'form','files' => true,'url' => array('admin/immigration/update', $immigration_data->id),'id'=>'banner_edit')) }}
                    
                    <div class="col-md-6">
                         
                         <!-- text input -->
                        <div class="form-group">
                          {!! Html::decode(Form::label('name','Name: <span style="color:red;">* </span>')) !!}
                          {!! Form::text('name',null,array('class'=>'form-control','id'=>'name','placeholder'=>'Enter name')) !!}
                          {!! Html::decode('<span class="text-danger">'.$errors->first("name").'</span>') !!}
                        </div>
                        <!-- /.text input -->

                        <!-- text input -->
                        <div class="form-group">
                          {!! Html::decode(Form::label('designation', 'Designation: <span style="color:red;">* </span>')) !!}
                          {!! Form::text('designation',null,array('class'=>'form-control','id'=>'designation','placeholder'=>'Enter designation')) !!}
                          {!! Html::decode('<span class="text-danger">'.$errors->first("designation").'</span>') !!}
                        </div>
                        <!-- /.text input -->

                        <!-- text input -->
                        <div class="form-group">
                          {!! Html::decode(Form::label('address','Office address: <span style="color:red;">*</span>')) !!}
                          {!! Form::text('address',null,array('class'=>'form-control','id'=>'address','placeholder'=>'Enter office address')) !!}
                          {!! Html::decode('<span class="text-danger">'.$errors->first("address").'</span>') !!}
                        </div>
                        <!-- /.text input -->
                        
                          <!-- form-group dropdown-->
                        <div class="form-group">
                           {!! Html::decode(Form::label('country_id','Country: <span style="color:red;">*</span>')) !!}
                           {!! Form::select('country_id',['' => 'Select'] +$countries, null, ['class' => 'form-control select2']) !!}
                           {!! Html::decode('<span class="text-danger">'.$errors->first("country_id").'</span>') !!}
                        </div>
                        <!-- /.form-group dropdown-->

                        <!-- form-group dropdown-->
                        <div class="form-group">
                           {!! Html::decode(Form::label('state_id','State: <span style="color:red;">*</span>')) !!}
                           {!! Form::select('state_id',['' => 'Select'] +$states, null, ['class' => 'form-control select2']) !!}
                           {!! Html::decode('<span class="text-danger">'.$errors->first("state_id").'</span>') !!}
                        </div>
                        <!-- /.form-group dropdown-->

                         <!-- form-group dropdown-->
                        <div class="form-group">
                           {!! Html::decode(Form::label('city_id','City: <span style="color:red;">*</span>')) !!}
                           {!! Form::select('city_id',['' => 'Select'] +$cities, null, ['class' => 'form-control select2']) !!}
                           {!! Html::decode('<span class="text-danger">'.$errors->first("city_id").'</span>') !!}
                        </div>
                        <!-- /.form-group dropdown-->

                         <!-- text input -->
                        <div class="form-group">
                          {!! Html::decode(Form::label('telephone','Telephone: <span style="color:red;">*</span>')) !!}
                          {!! Form::text('telephone',null,array('class'=>'form-control','id'=>'telephone','placeholder'=>'Enter telephone')) !!}
                          {!! Html::decode('<span class="text-danger">'.$errors->first("telephone").'</span>') !!}
                        </div>
                        <!-- /.text input -->

                         <!-- text input -->
                        <div class="form-group">
                          {!! Html::decode(Form::label('email','Email: <span style="color:red;">*</span>')) !!}
                          {!! Form::text('email',null,array('class'=>'form-control','id'=>'email','placeholder'=>'Enter email')) !!}
                          {!! Html::decode('<span class="text-danger">'.$errors->first("email").'</span>') !!}
                        </div>
                        <!-- /.text input -->
                        <div class="form-group">
                          <label for="name">Status: </label>
                          <select name="status" id="status" class="form-control" autofocus >
                            <option value="1" {{ $immigration_data->status == "1" ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ $immigration_data->status == "0" ? 'selected' : '' }}>In-Active</option>
                          </select>                          
                        </div>
                       
                        
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