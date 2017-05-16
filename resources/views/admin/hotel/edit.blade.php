@extends('admin.layouts.dashboard_layout')
@section('title', 'Hotel')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Hotel
       <!--  <small>advanced tables</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="{!!URL::to('/admin/dashboard')!!}">Home</a></li>
        <li><a href="{!!URL::to('/admin/hotel')!!}">Hotel</a></li>
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
              <h3 class="box-title">Edit {{ $hotels_data->name }}</h3>
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
                 {{ Form::model($hotels_data,array('method' => 'PATCH','role'=>'form','url' => array('admin/hotel/update', $hotels_data->id),'id'=>'hotel_edit')) }}
                    
                    <div class="col-md-6">
                        
                         <!-- text input -->
                        <div class="form-group">
                          {!! Html::decode(Form::label('name','Hotel name: <span style="color:red;">*</span>')) !!}
                          {!! Form::text('name',null,array('class'=>'form-control','id'=>'name','placeholder'=>'Enter hotel name')) !!}
                          {!! Html::decode('<span class="text-danger">'.$errors->first("name").'</span>') !!}
                        </div>
                        <!-- /.text input -->

                        <!-- text input -->
                        <div class="form-group">
                          {!! Html::decode(Form::label('address','Address: <span style="color:red;">*</span>')) !!}
                          {!! Form::text('address',null,array('class'=>'form-control','id'=>'address','placeholder'=>'Enter hotel address')) !!}
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

                         <!-- form-group dropdown-->
                        <div class="form-group">
                           {!! Html::decode(Form::label('hotel_class_id','Hotel class: <span style="color:red;">*</span>')) !!}
                           {!! Form::select('hotel_class_id',['' => 'Select'] +$hotelclasstypes, null, ['class' => 'form-control select2']) !!}
                           {!! Html::decode('<span class="text-danger">'.$errors->first("hotel_class_id").'</span>') !!}
                        </div>
                        <!-- /.form-group dropdown-->
                        
                         <!-- text input -->
                        <div class="form-group">
                          {!! Html::decode(Form::label('no_of_rooms','Number of rooms: <span style="color:red;">*</span>')) !!}
                          {!! Form::text('no_of_rooms',null,array('class'=>'form-control','id'=>'no_of_rooms','placeholder'=>'Enter number of rooms')) !!}
                          {!! Html::decode('<span class="text-danger">'.$errors->first("no_of_rooms").'</span>') !!}
                        </div>
                        <!-- /.text input -->

                        <!-- text input -->
                        <div class="form-group">
                          {!! Html::decode(Form::label('min_price_per_night','Minimum price per night: <span style="color:red;">*</span>')) !!}
                          {!! Form::text('min_price_per_night',null,array('class'=>'form-control','id'=>'min_price_per_night','placeholder'=>'Enter minimum price per night')) !!}
                          {!! Html::decode('<span class="text-danger">'.$errors->first("min_price_per_night").'</span>') !!}
                        </div>
                        <!-- /.text input -->

                        <!-- text input -->
                        <div class="form-group">
                          {!! Html::decode(Form::label('max_price_per_night','Maximum price per night: <span style="color:red;">*</span>')) !!}
                          {!! Form::text('max_price_per_night',null,array('class'=>'form-control','id'=>'max_price_per_night','placeholder'=>'Enter maximum price per night')) !!}
                          {!! Html::decode('<span class="text-danger">'.$errors->first("max_price_per_night").'</span>') !!}
                        </div>
                        <!-- /.text input -->
                       
                        <!-- text input -->
                        <div class="form-group">
                          {!! Html::decode(Form::label('booking_url','Direct booking url: <span style="color:red;">* </span>')) !!}
                          {!! Form::text('booking_url',null,array('class'=>'form-control','id'=>'booking_url','placeholder'=>'Enter direct booking url')) !!}
                           {!! Html::decode('<span class="text-danger">'.$errors->first("booking_url").'</span>') !!}
                        </div>
                        <!-- /.text input -->
                        
                        
                         <!-- input button -->
                        <div>
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