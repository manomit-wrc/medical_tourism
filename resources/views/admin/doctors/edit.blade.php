@extends('admin.layouts.dashboard_layout')
@section('title', 'Doctor')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Doctor
       <!--  <small>advanced tables</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="{!!URL::to('/admin/dashboard')!!}">Home</a></li>
        <li><a href="{!!URL::to('/admin/doctors')!!}">Doctors</a></li>
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

            <div class="box-body">

                <form method="post" name="frmDoctor" action="/admin/doctors/update/{{$doctor_details->id}}" enctype="multipart/form-data" >
                  {{ csrf_field() }}
                  <div class="col-md-6">
                    <div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
                      <label for="name">First Name: <span style="color:red;">*</span></label>
                      <input type="text" name="first_name" id="first_name" class="form-control" value="{{ $doctor_details->first_name }}" autofocus >

                      <span class="text-danger">{{ $errors->first('first_name') }}</span>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group {{ $errors->has('last_name') ? 'has-error' : '' }}">
                      <label for="name">Last Name: <span style="color:red;">*</span></label>
                      <input type="text" name="last_name" id="last_name" class="form-control" value="{{ $doctor_details->last_name }}" autofocus >

                      <span class="text-danger">{{ $errors->first('last_name') }}</span>
                    </div>
                  </div>
                   <!-- textarea input -->

                  <div class="col-md-6">
                  <div class="form-group {{ $errors->has('about') ? 'has-error' : '' }}">
                    <!-- {!! Html::decode(Form::label('about','Bio : <span style="color:red;">*</span>')) !!} -->
                    {!! Html::decode(Form::label('about','Bio : ')) !!}
                    {!! Form::textarea('about',".$doctor_details->about.",array('class'=>'form-control ','id'=>'textarea_id','placeholder'=>'Enter about doctor')) !!}
                    <span class="text-danger">{{ $errors->first('about') }}</span>
                  </div>
                  </div>
                  <!-- /.textarea input -->

                  <div class="col-md-6">
                    <div class="form-group {{ $errors->has('street_address') ? 'has-error' : '' }}">
                      <!-- <label for="name">Street Address: <span style="color:red;">*</span></label> -->
                      <label for="name">Street Address: </label>
                      <textarea class="form-control" name="street_address" id="street_address">{{ $doctor_details->street_address }}</textarea>
                      <span class="text-danger">{{ $errors->first('street_address') }}</span>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group {{ $errors->has('country_id') ? 'has-error' : '' }}">
                      <label for="name">Country: <span style="color:red;">*</span></label>
                      <select name="country_id" id="doctor_country_id" class="form-control" autofocus >
                        <option value="">Select Any</option>
                        @foreach($country_list as $key => $value)
                        <option value="{{ $key }}" {{ $key == $doctor_details->country_id? 'selected':'' }}>{{$value}}</option>
                        @endforeach
                      </select>
                      <span class="text-danger">{{ $errors->first('country_id') }}</span>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group {{ $errors->has('state_id') ? 'has-error' : '' }}">
                      <label for="name">State: <span style="color:red;">*</span></label>
                      <select name="state_id" id="doctor_state_id" class="form-control" autofocus >
                        <option value="">Select Any</option>
                        @foreach($state_list as $key => $value)
                        <option value="{{ $key }}" {{ $key == $doctor_details->state_id? 'selected':'' }}>{{$value}}</option>
                        @endforeach
                      </select>
                      <span class="text-danger">{{ $errors->first('state_id') }}</span>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group {{ $errors->has('city_id') ? 'has-error' : '' }}">
                      <label for="name">City: <span style="color:red;">*</span></label>
                      <select name="city_id" id="doctor_city_id" class="form-control" autofocus >
                        <option value="">Select Any</option>
                        @foreach($city_list as $key => $value)
                        <option value="{{ $key }}" {{ $key == $doctor_details->city_id? 'selected':'' }}>{{$value}}</option>
                        @endforeach
                      </select>
                      <span class="text-danger">{{ $errors->first('city_id') }}</span>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group {{ $errors->has('zipcode') ? 'has-error' : '' }}">
                      <!-- <label for="name">Zipcode: <span style="color:red;">*</span></label> -->
                      <label for="name">Zipcode: </label>
                      <input type="text" name="zipcode" id="zipcode" class="form-control" value="{{ $doctor_details->zipcode }}" autofocus >
                      <span class="text-danger">{{ $errors->first('zipcode') }}</span>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                      <!-- <label for="name">Email: <span style="color:red;">*</span></label> -->
                      <label for="name">Email:</label>
                      <input type="text" name="email" id="email" class="form-control" value="{{ $doctor_details->email }}" autofocus >
                      <span class="text-danger">{{ $errors->first('email') }}</span>
                    </div>
                  </div>
                   <div class="col-md-6">
                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                      <!-- <label for="name">Email: <span style="color:red;">*</span></label> -->
                      <label for="name">Sex:</label>
                      <select name="sex" id="sex" class="form-control" autofocus >
                        <option value="male" {{ $doctor_details->sex == "male" ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ $doctor_details->sex == "female" ? 'selected' : '' }}>Female</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">                      
                      <label for="name">Registration Number:</label>
                      <input type="text" name="reg_no" id="reg_no" class="form-control" value="{{ ($doctor_details->reg_no)? $doctor_details->reg_no:''  }}" autofocus >                     
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group {{ $errors->has('mobile_no') ? 'has-error' : '' }}">
                      <!-- <label for="name">Mobile No: <span style="color:red;">*</span></label> -->
                      <label for="name">Mobile No:</label>
                      <input type="text" name="mobile_no" id="mobile_no" class="form-control" value="{{ $doctor_details->mobile_no }}" autofocus >
                      <span class="text-danger">{{ $errors->first('mobile_no') }}</span>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group {{ $errors->has('phone_no') ? 'has-error' : '' }}">
                      <!-- <label for="name">Phone No: <span style="color:red;">*</span></label> -->
                      <label for="name">Phone No:</label>
                      <input type="text" name="phone_no" id="phone_no" class="form-control" value="{{ $doctor_details->phone_no }}" autofocus >
                      <span class="text-danger">{{ $errors->first('phone_no') }}</span>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group {{ $errors->has('avators') ? 'has-error' : '' }}">
                      <!-- <label for="name">Image: <span style="color:red;">*</span></label> -->
                      <label for="name">Image: </label>
                      <input type="file" name="avators" id="avators" autofocus ><br />
                    @php
                    if($doctor_details->avators !=''){
                    @endphp 
                      <img src="{{url('/uploads/doctors/thumb/'.$doctor_details->avators)}}" alt="Doctor Image" class="img_broder">
                      @php
                    }else {
                    @endphp
                      <img src="{{url('/uploads/doctors/noimage_user.jpg')}}" alt="doctor Image" class="img_broder" width="100" height="100">
                     @php
                    }
                   @endphp     
                      <span class="text-danger">{{ $errors->first('avators') }}</span>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group {{ $errors->has('degree_id') ? 'has-error' : '' }}">
                      <label for="name">Degree: <span style="color:red;">*</span></label>
                      <select class="form-control js-example-basic-multiple" id="degree_id[]" name="degree_id[]" multiple="multiple">
                        @foreach($degree_list as $key => $value)
                        <option value="{{ $key }}" {{ in_array($key, $degrees_array)? 'selected':'' }}>{{$value}}</option>
                        @endforeach
                      </select>
                      <span class="text-danger">{{ $errors->first('degree_id') }}</span>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group {{ $errors->has('procedure_id') ? 'has-error' : '' }}">
                      <!-- <label for="name">Procedure: <span style="color:red;">*</span></label> -->
                      <label for="name">Speciality: <span style="color:red;">*</span></label>
                      <select class="form-control js-example-basic-multiple" id="procedure_id[]" name="procedure_id[]" multiple="multiple">
                        @foreach($procedure_list as $key => $value)
                        <option value="{{ $key }}" {{ in_array($key, $procedures_array)? 'selected':'' }}>{{$value}}</option>
                        @endforeach
                      </select>
                      <span class="text-danger">{{ $errors->first('procedure_id') }}</span>
                    </div>
                  </div>

                  <div>
                    <input type="submit" name="submit" id="exact-submit-button" class="btn btn-primary pull-left" value="Submit" >
                  </div>

                </form>

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
