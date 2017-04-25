@extends('admin.layouts.dashboard_layout')
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
             
                 {!! Form::open(array('method' => 'POST','role'=>'form','url'=>'admin/hotel/store','id'=>'hotel_add')) !!}
                    
                    <div class="col-md-6">
                        

                        <!-- text input -->
                        <div class="form-group">
                          {!! Html::decode(Form::label('name','Hotel name: <span style="color:red;">*</span>')) !!}
                          {!! Form::text('name','',array('class'=>'form-control','id'=>'name','placeholder'=>'Enter hotel name')) !!}
                        </div>
                        <!-- /.text input -->

                        <!-- text input -->
                        <div class="form-group">
                          {!! Html::decode(Form::label('address','Address: <span style="color:red;">*</span>')) !!}
                          {!! Form::text('address','',array('class'=>'form-control','id'=>'address','placeholder'=>'Enter hotel address')) !!}
                        </div>
                        <!-- /.text input -->

                         <!-- form-group dropdown-->
                        <div class="form-group">
                           {!! Html::decode(Form::label('country_id','Country: <span style="color:red;">*</span>')) !!}
                           {!! Form::select('country_id',['' => 'Select'] +$countries, null, ['class' => 'form-control select2']) !!}
                        </div>
                        <!-- /.form-group dropdown-->

                        <!-- form-group dropdown-->
                        <div class="form-group">
                           {!! Html::decode(Form::label('state_id','State: <span style="color:red;">*</span>')) !!}
                           <select name="state_id" id="state_id" class="form-control select2" ></select>
                        </div>
                        <!-- /.form-group dropdown-->

                         <!-- form-group dropdown-->
                        <div class="form-group">
                           {!! Html::decode(Form::label('city_id','City: <span style="color:red;">*</span>')) !!}
                           <select name="city_id" id="city_id" class="form-control select2" ></select>
                        </div>
                        <!-- /.form-group dropdown-->

                         <!-- form-group dropdown-->
                        <div class="form-group">
                           {!! Html::decode(Form::label('hotel_class_id','Hotel class: <span style="color:red;">*</span>')) !!}
                           {!! Form::select('hotel_class_id',['' => 'Select'] +$hotelclasstypes, null, ['class' => 'form-control select2']) !!}
                        </div>
                        <!-- /.form-group dropdown-->

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