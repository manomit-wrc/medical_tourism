@extends('admin.layouts.dashboard_layout')
@section('title', 'Hospital')
@section('content')
<!--loader within a page start-->
<div class="modalloader" style="display: none">
    <div class="centerloader">
        <img alt="" src="/storage/frontend/images/loader/loader.gif" />
    </div>
</div>
<!--loader within a page start-->




 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Hospital
       <!--  <small>advanced tables</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="{!!URL::to('/admin/dashboard')!!}">Home</a></li>
        <li><a href="{!!URL::to('/admin/hospitals')!!}">Hospital</a></li>
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
              <h3 class="box-title">Edit {{ $hosptl_data->name }}</h3>
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
                 {{ Form::model($hosptl_data,array('method' => 'PATCH','role'=>'form','files' => true,'url' => array('admin/hospitals/update', $hosptl_data->id),'id'=>'hospital_edit')) }}
                    
                    <div class="col-md-6">
                    <!-- text input -->
                        <div class="form-group">
                          {!! Html::decode(Form::label('name','Hospital name: <span style="color:red;">*</span>')) !!}
                          {!! Form::text('name',null,array('class'=>'form-control','id'=>'name','placeholder'=>'Enter hospital name')) !!}
                          {!! Html::decode('<span class="text-danger">'.$errors->first("name").'</span>') !!}
                        </div>
                        <!-- /.text input -->

                         <!-- text input -->
                        <div class="form-group">
                          {!! Html::decode(Form::label('description','Hospital description: <span style="color:red;">*</span>')) !!}
                          {!! Form::textarea('description',null,array('class'=>'form-control','id'=>'description','placeholder'=>'Enter hospital description')) !!}
                          {!! Html::decode('<span class="text-danger">'.$errors->first("description").'</span>') !!}
                        </div>
                        <!-- /.text input -->

                        <!-- text input -->
                        <div class="form-group">
                          {!! Html::decode(Form::label('email','Email: <span style="color:red;">*</span>')) !!}
                          {!! Form::text('email',null,array('class'=>'form-control','id'=>'email','placeholder'=>'Enter email')) !!}
                          {!! Html::decode('<span class="text-danger">'.$errors->first("email").'</span>') !!}
                        </div>
                        <!-- /.text input -->

                        <!-- text input -->
                        <div class="form-group">
                          {!! Html::decode(Form::label('phone','Phone: ')) !!}
                          {!! Form::text('phone',null,array('class'=>'form-control','id'=>'phone','placeholder'=>'Enter phone')) !!}
                          {!! Html::decode('<span class="text-danger">'.$errors->first("phone").'</span>') !!}
                        </div>
                        <!-- /.text input -->

                        <!-- text input -->
                        <div class="form-group">
                          {!! Html::decode(Form::label('website','Website: ')) !!}
                          {!! Form::text('website',null,array('class'=>'form-control','id'=>'website','placeholder'=>'Enter website')) !!}
                          <!-- {!! Html::decode('<span class="text-danger">'.$errors->first("website").'</span>') !!} -->
                        </div>
                        <!-- /.text input -->

                        <!-- file input -->
                        <div class="form-group">
                          {!! Html::decode(Form::label('avators','Image: ')) !!}
                           <img src="{{url('/uploads/hospitals/thumb/'.$hosptl_data->avators)}}" alt="Hospital Image" style="width:450px; height:214px;" class="img_broder">
                          {!! Form::file('avators', null) !!}
                          <span style="color:red;">* (Image must be minimum of 745x214)</span>
                          {!! Html::decode('<br /><span class="text-danger">'.$errors->first("avators").'</span>') !!}
                        </div>
                         <!-- /.file input -->

                    </div>
                    <div class="col-md-6">
                         <!-- text input -->
                        <div class="form-group">
                          {!! Html::decode(Form::label('search_address','Search Address:')) !!}
                          {!! Form::text('search_address',null,array('class'=>'form-control srch_address','id'=>'search_address','placeholder'=>'Search hospital address')) !!}
                          {!! Html::decode('<span class="text-danger">'.$errors->first("search_address").'</span>') !!}
                        </div>
                        <!-- /.text input -->

                        <!-- text input -->
                        <div class="form-group">
                          {!! Html::decode(Form::label('street_address','Address: <span style="color:red;">*</span>')) !!}
                          {!! Form::text('street_address',null,array('class'=>'form-control','id'=>'street_address','onBlur'=>'return last_seen_pin(this.value)','placeholder'=>'Enter hospital address')) !!}
                          {!! Html::decode('<span class="text-danger">'.$errors->first("street_address").'</span>') !!}
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
                          {!! Html::decode(Form::label('hosp_latitude','Latitude: <span style="color:red;">*</span>')) !!}
                          {!! Form::text('hosp_latitude',null,array('class'=>'form-control','id'=>'hosp_latitude','placeholder'=>'Enter Latitude')) !!}
                           {!! Html::decode('<span class="text-danger">'.$errors->first("hosp_latitude").'</span>') !!}
                        </div>
                        <!-- /.text input -->

                         <!-- text input -->
                        <div class="form-group">
                          {!! Html::decode(Form::label('hosp_longitude','Longitude: <span style="color:red;">*</span>')) !!}
                          {!! Form::text('hosp_longitude',null,array('class'=>'form-control','id'=>'hosp_longitude','placeholder'=>'Enter Longitude')) !!}
                           {!! Html::decode('<span class="text-danger">'.$errors->first("hosp_longitude").'</span>') !!}
                        </div>
                        <!-- /.text input -->
                        
                         <!-- text input -->
                        <div class="form-group">
                          {!! Html::decode(Form::label('zipcode','Zipcode: <span style="color:red;">*</span>')) !!}
                          {!! Form::text('zipcode',null,array('class'=>'form-control','id'=>'zipcode','placeholder'=>'Enter zipcode')) !!}
                           {!! Html::decode('<span class="text-danger">'.$errors->first("zipcode").'</span>') !!}
                        </div>
                        <!-- /.text input -->

                         
                        
                         <!-- text input -->
                        <div class="form-group">
                          {!! Html::decode(Form::label('number_of_beds','Number of beds: ')) !!}
                          {!! Form::text('number_of_beds',null,array('class'=>'form-control','id'=>'number_of_beds','placeholder'=>'Enter number of beds')) !!}
                          <!-- {!! Html::decode('<span class="text-danger">'.$errors->first("number_of_beds").'</span>') !!} -->
                        </div>
                        <!-- /.text input -->

                         <!-- text input -->
                        <div class="form-group">
                          {!! Html::decode(Form::label('number_of_icu_beds','Number of ICU beds: ')) !!}
                          {!! Form::text('number_of_icu_beds',null,array('class'=>'form-control','id'=>'number_of_icu_beds','placeholder'=>'Enter number of ICU beds')) !!}
                          <!-- {!! Html::decode('<span class="text-danger">'.$errors->first("number_of_icu_beds").'</span>') !!} -->
                        </div>
                        <!-- /.text input -->

                        <!-- text input -->
                        <div class="form-group">
                          {!! Html::decode(Form::label('number_of_operating_rooms','Number of operating rooms: ')) !!}
                          {!! Form::text('number_of_operating_rooms',null,array('class'=>'form-control','id'=>'number_of_operating_rooms','placeholder'=>'Enter number of operating rooms')) !!}
                          <!-- {!! Html::decode('<span class="text-danger">'.$errors->first("number_of_operating_rooms").'</span>') !!} -->
                        </div>
                        <!-- /.text input -->
                       
                        <!-- text input -->
                        <div class="form-group">
                          {!! Html::decode(Form::label('number_of_avg_international_patients','Number of average international patients: ')) !!}
                          {!! Form::text('number_of_avg_international_patients',null,array('class'=>'form-control','id'=>'number_of_avg_international_patients','placeholder'=>'Enter number of average internatinal patients')) !!}
                           <!-- {!! Html::decode('<span class="text-danger">'.$errors->first("number_of_avg_international_patients").'</span>') !!} -->
                        </div>
                        <div class="form-group">
                            <label for="name">Associated With:</label>
                            <select class="form-control" id="associated_id[]" name="associated_id[]" multiple="multiple">
                              @if (count($doctor_list) > 0)
                              @foreach($doctor_list as $dd)
                              <option value="{{ $dd->id }}" {{ (!empty($doctorhospital_array)) ? in_array($dd->id, $doctorhospital_array)? 'selected':'' :'' }}>{{ $dd->first_name }} {{ $dd->last_name }}</option>
                              @endforeach
                              @endif
                            </select>                        
                        </div>
                        <!-- /.text input -->
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