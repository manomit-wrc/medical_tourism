@extends('admin.layouts.dashboard_layout')
@section('title', 'Test Centre')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Test Centre
       <!--  <small>advanced tables</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="{!!URL::to('/admin/dashboard')!!}">Home</a></li>
        <li><a href="{!!URL::to('/admin/testcentre')!!}">Test Centre</a></li>
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
              <h3 class="box-title">Edit {{ $cent_data->name }}</h3>
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
                 {{ Form::model($cent_data,array('method' => 'PATCH','role'=>'form','files' => true,'url' => array('admin/testcentre/update', $cent_data->id),'id'=>'centre_edit')) }}
                    
                    <div class="col-md-6">
                    <!-- text input -->
                        <div class="form-group">
                          {!! Html::decode(Form::label('name','Name: <span style="color:red;">*</span>')) !!}
                          {!! Form::text('name',null,array('class'=>'form-control','id'=>'name','placeholder'=>'Enter centre name')) !!}
                          {!! Html::decode('<span class="text-danger">'.$errors->first("name").'</span>') !!}
                        </div>                        

                        <div class="form-group">
                          {!! Html::decode(Form::label('email_id','Email: <span style="color:red;">*</span>')) !!}
                          {!! Form::text('email_id',null,array('class'=>'form-control','id'=>'email_id','placeholder'=>'Enter email')) !!}
                          {!! Html::decode('<span class="text-danger">'.$errors->first("email_id").'</span>') !!}
                        </div>
                        <!-- /.text input -->

                        <!-- text input -->
                        <div class="form-group">
                          {!! Html::decode(Form::label('mobile_no','Mobile no: ')) !!}
                          {!! Form::text('mobile_no',null,array('class'=>'form-control','id'=>'mobile_no','placeholder'=>'Enter mobile no')) !!}
                          {!! Html::decode('<span class="text-danger">'.$errors->first("mobile_no").'</span>') !!}
                        </div>                       

                        <!-- file input -->
                        <div class="form-group">
                          {!! Html::decode(Form::label('avators','Image: ')) !!}
                           <img src="{{url('/uploads/testcentre/thumb/'.$cent_data->avators)}}" alt="Hospital Image" style="width:450px; height:214px;" class="img_broder">
                          {!! Form::file('avators', null) !!}
                          <span style="color:red;">* (Image must be minimum of 745x214)</span>
                          {!! Html::decode('<br /><span class="text-danger">'.$errors->first("avators").'</span>') !!}
                        </div>
                         <!-- /.file input -->

                    </div>
                    <div class="col-md-6">
                        <!-- text input -->
                        <div class="form-group">
                          {!! Html::decode(Form::label('address','Address: <span style="color:red;">*</span>')) !!}
                          {!! Form::text('address',null,array('class'=>'form-control','id'=>'address','onBlur'=>'return last_seen_pin(this.value)','placeholder'=>'Enter address')) !!}
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
                          {!! Html::decode(Form::label('pincode','Zipcode: <span style="color:red;">*</span>')) !!}
                          {!! Form::text('pincode',null,array('class'=>'form-control','id'=>'pincode','placeholder'=>'Enter pincode')) !!}
                           {!! Html::decode('<span class="text-danger">'.$errors->first("pincode").'</span>') !!}
                        </div>
                        <!-- input submit button -->
                        <div>
                           {!! Form::submit('submit',array('class'=>'btn btn-primary pull-left','id'=>'exact-submit-button'))!!}
                        </div>
                        <!-- /.input submit button -->
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