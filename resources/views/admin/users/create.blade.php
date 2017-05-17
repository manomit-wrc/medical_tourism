@extends('admin.layouts.dashboard_layout')
@section('title', 'Add User')
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
        <li><a href="{!!URL::to('/admin/adminuser')!!}">User</a></li>
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

                <form method="post" name="frmUser" action="/admin/adminuser/add" >
                  {{ csrf_field() }}
                  <div class="col-md-6">
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                      <label for="name">Name: <span style="color:red;">*</span></label>
                      <input type="text" name="name" id="name" class="form-control" value="{{ old('name')}}" autofocus >

                      <span class="text-danger">{{ $errors->first('name') }}</span>
                    </div>
                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                      <label for="name">Email: <span style="color:red;">*</span></label>
                      <input type="text" name="email" id="email" class="form-control" value="{{ old('email')}}" autofocus >

                      <span class="text-danger">{{ $errors->first('email') }}</span>
                    </div>
                    <div class="form-group {{ $errors->has('role') ? 'has-error' : '' }}">
                      <label for="name">Role: <span style="color:red;">*</span></label>
                      <select name="role" id="role" class="form-control" autofocus >
                        <option value="">Select Any</option>
                        @foreach($role_list as $key => $value)
                        <option value="{{ $key }}">{{$value}}</option>
                        @endforeach
                      </select>

                      <span class="text-danger">{{ $errors->first('role') }}</span>
                    </div>
                    <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                      <label for="name">Password: <span style="color:red;">*</span></label>
                      <input type="password" name="password" id="password" class="form-control" autofocus >

                      <span class="text-danger">{{ $errors->first('password') }}</span>
                    </div>
                    <div class="form-group {{ $errors->has('confirm_password') ? 'has-error' : '' }}">
                      <label for="name">Confirm Password: <span style="color:red;">*</span></label>
                      <input type="password" name="confirm_password" id="confirm_password" class="form-control" autofocus >

                      <span class="text-danger">{{ $errors->first('confirm_password') }}</span>
                    </div>

                    <div>
                      <input type="submit" name="submit" id="exact-submit-button" class="btn btn-primary pull-left" value="Submit" >
                    </div>
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
