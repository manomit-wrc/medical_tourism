@extends('admin.layouts.dashboard_layout')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User
       <!--  <small>advanced tables</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="{!!URL::to('/admin/dashboard')!!}">Home</a></li>
        <li><a href="{!!URL::to('/admin/doctors')!!}">Doctors</a></li>
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

            <div class="box-body">

                <form method="post" name="frmDoctor" action="/admin/doctors/store" enctype="multipart/form-data" >
                  {{ csrf_field() }}
                  <div class="col-md-6">
                    <div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
                      <label for="name">First Name: <span style="color:red;">*</span></label>
                      <input type="text" name="first_name" id="first_name" class="form-control" value="{{ old('first_name')}}" autofocus >

                      <span class="text-danger">{{ $errors->first('first_name') }}</span>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group {{ $errors->has('last_name') ? 'has-error' : '' }}">
                      <label for="name">Last Name: <span style="color:red;">*</span></label>
                      <input type="text" name="last_name" id="last_name" class="form-control" value="{{ old('last_name')}}" autofocus >

                      <span class="text-danger">{{ $errors->first('last_name') }}</span>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group {{ $errors->has('street_address') ? 'has-error' : '' }}">
                      <label for="name">Street Address: <span style="color:red;">*</span></label>
                      <textarea class="form-control" name="street_address" id="street_address">{{ old('street_address')}}</textarea>
                      <span class="text-danger">{{ $errors->first('street_address') }}</span>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group {{ $errors->has('country_id') ? 'has-error' : '' }}">
                      <label for="name">Country: <span style="color:red;">*</span></label>
                      <select name="country_id" id="country_id" class="form-control" autofocus >
                        <option value="">Select Any</option>
                        @foreach($country_list as $key => $value)
                        <option value="{{ $key }}">{{$value}}</option>
                        @endforeach
                      </select>

                      <span class="text-danger">{{ $errors->first('country_id') }}</span>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group {{ $errors->has('state_id') ? 'has-error' : '' }}">
                      <label for="name">State: <span style="color:red;">*</span></label>
                      <select name="state_id" id="state_id" class="form-control" autofocus >
                        <option value="">Select Any</option>

                      </select>

                      <span class="text-danger">{{ $errors->first('state_id') }}</span>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group {{ $errors->has('city_id') ? 'has-error' : '' }}">
                      <label for="name">City: <span style="color:red;">*</span></label>
                      <select name="city_id" id="city_id" class="form-control" autofocus >
                        <option value="">Select Any</option>

                      </select>

                      <span class="text-danger">{{ $errors->first('city_id') }}</span>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group {{ $errors->has('zipcode') ? 'has-error' : '' }}">
                      <label for="name">Zipcode: <span style="color:red;">*</span></label>
                      <input type="text" name="zipcode" id="zipcode" class="form-control" value="{{ old('zipcode')}}" autofocus >

                      <span class="text-danger">{{ $errors->first('zipcode') }}</span>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                      <label for="name">Email: <span style="color:red;">*</span></label>
                      <input type="text" name="email" id="email" class="form-control" value="{{ old('email')}}" autofocus >

                      <span class="text-danger">{{ $errors->first('email') }}</span>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group {{ $errors->has('mobile_no') ? 'has-error' : '' }}">
                      <label for="name">Mobile No: <span style="color:red;">*</span></label>
                      <input type="text" name="mobile_no" id="mobile_no" class="form-control" value="{{ old('mobile_no')}}" autofocus >

                      <span class="text-danger">{{ $errors->first('mobile_no') }}</span>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group {{ $errors->has('phone_no') ? 'has-error' : '' }}">
                      <label for="name">Phone No: <span style="color:red;">*</span></label>
                      <input type="text" name="phone_no" id="phone_no" class="form-control" value="{{ old('phone_no')}}" autofocus >

                      <span class="text-danger">{{ $errors->first('phone_no') }}</span>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group {{ $errors->has('avators') ? 'has-error' : '' }}">
                      <label for="name">Image: <span style="color:red;">*</span></label>
                      <input type="file" name="avators" id="avators" class="form-control"  autofocus >

                      <span class="text-danger">{{ $errors->first('avators') }}</span>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="name">Degree: <span style="color:red;">*</span></label>
                      <select class="js-example-basic-multiple form-control" multiple="multiple" name="degree_id[]">
                        @foreach($degree_list as $key => $value)
                        <option value="{{ $key }}">{{$value}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                    <div class="box-footer">
                      <input type="submit" name="submit" id="exact-submit-button" class="btn btn-primary pull-right" value="Submit" >
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
