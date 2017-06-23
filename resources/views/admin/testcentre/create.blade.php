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
             
                 {!! Form::open(array('method' => 'POST','role'=>'form','files' => true,'url'=>'admin/testcentre/store','id'=>'testcentre_add')) !!}
                    
                    <div class="col-md-6">
                        

                        <!-- text input -->
                        <div class="form-group">
                          {!! Html::decode(Form::label('name','Centre name: <span style="color:red;">*</span>')) !!}
                          {!! Form::text('name','',array('class'=>'form-control','id'=>'name','placeholder'=>'Enter hospital name')) !!}
                          {!! Html::decode('<span class="text-danger">'.$errors->first("name").'</span>') !!}
                        </div>                      

                        <!-- text input -->
                        <div class="form-group">
                          {!! Html::decode(Form::label('email_id','Email: <span style="color:red;">*</span>')) !!}
                          {!! Form::text('email_id','',array('class'=>'form-control','id'=>'email_id','placeholder'=>'Enter email')) !!}
                          {!! Html::decode('<span class="text-danger">'.$errors->first("email_id").'</span>') !!}
                        </div>
                        <!-- /.text input -->

                        <!-- text input -->
                        <div class="form-group">
                          {!! Html::decode(Form::label('mobile_no','Mobile no:')) !!}
                          {!! Form::text('mobile_no','',array('class'=>'form-control','id'=>'mobile_no','placeholder'=>'Enter mobile no')) !!}
                          <!-- {!! Html::decode('<span class="text-danger">'.$errors->first("mobile_no").'</span>') !!} -->
                        </div>
                        <!-- /.text input -->
                        <!-- file input -->
                        <div class="form-group">
                          {!! Html::decode(Form::label('avators','Image: ')) !!}
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
                          {!! Form::text('address','',array('class'=>'form-control','id'=>'address','onBlur'=>'return last_seen_pin(this.value)','placeholder'=>'Enter  address')) !!}
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
                           <select name="state_id" id="state_id" class="form-control select2" ></select>
                           {!! Html::decode('<span class="text-danger">'.$errors->first("state_id").'</span>') !!}
                        </div>
                        <!-- /.form-group dropdown-->

                         <!-- form-group dropdown-->
                        <div class="form-group">
                           {!! Html::decode(Form::label('city_id','City: <span style="color:red;">*</span>')) !!}
                           <select name="city_id" id="city_id" class="form-control select2" ></select>
                            {!! Html::decode('<span class="text-danger">'.$errors->first("city_id").'</span>') !!}
                        </div>
                        <!-- /.form-group dropdown-->
                        <!-- text input -->
                        <!-- <div class="form-group">
                          {!! Html::decode(Form::label('hosp_latitude','Latitude: <span style="color:red;">*</span>')) !!}
                          {!! Form::text('hosp_latitude','',array('class'=>'form-control','id'=>'hosp_latitude','placeholder'=>'Enter Latitude')) !!}
                           {!! Html::decode('<span class="text-danger">'.$errors->first("hosp_latitude").'</span>') !!}
                        </div> -->
                        <!-- /.text input -->
                        <!-- text input -->
                        <!-- <div class="form-group">
                          {!! Html::decode(Form::label('hosp_longitude','Longitude: <span style="color:red;">*</span>')) !!}
                          {!! Form::text('hosp_longitude','',array('class'=>'form-control','id'=>'hosp_longitude','placeholder'=>'Enter Longitude')) !!}
                           {!! Html::decode('<span class="text-danger">'.$errors->first("hosp_longitude").'</span>') !!}
                        </div> -->
                        <!-- /.text input -->
                         <!-- text input -->
                        <div class="form-group">
                          {!! Html::decode(Form::label('pincode','Zipcode: <span style="color:red;">*</span>')) !!}
                          {!! Form::text('pincode','',array('class'=>'form-control','id'=>'pincode','placeholder'=>'Enter pincode')) !!}
                           {!! Html::decode('<span class="text-danger">'.$errors->first("pincode").'</span>') !!}
                        </div>
                        
                        <div>
                           {!! Form::submit('submit',array('class'=>'btn btn-primary pull-left','id'=>'exact-submit-button'))!!}
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