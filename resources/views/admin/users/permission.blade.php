@extends('admin.layouts.dashboard_layout')
@section('title', 'Permission')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Permission
       <!--  <small>advanced tables</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="{!!URL::to('/admin/dashboard')!!}">Home</a></li>
        <li><a href="{!!URL::to('/admin/adminuser')!!}">User</a></li>
        <li class="active">Permission</li>
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

                <form method="post" name="frmPermission"  >
                  {{ csrf_field() }}
                  <div class="col-md-6">
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
                    <div class="form-group">
                      <input type="button" name="btn_check_all" id="btn_check_all" class="btn btn-info pull-right" value="Check All" >
                      <input type="button" name="btn_uncheck_all" id="btn_uncheck_all" class="btn btn-info pull-right" value="Un-Check All" >
                    </div>
                    @php
                     $chkvar=''; 
                    @endphp
                    @foreach($routeCollection as $key => $rc)
                    @php
                     //print_r(explode("/",$rc->getPath()));
                     $var=explode("/",$rc->getPath()); 
                    @endphp
                    @if($var[0]=='admin')
                      <div class="col-xs-6">
                        <p><b>{{ (!empty($var[1]) && $chkvar!=$var[1])?$var[1]:"" }}</b></p>
                         <input type="checkbox" id="ch{{ $key }}"  class="chk-route-list" value="{{ $rc->getPath() }}" autofocus > {{ $rc->getPath() }}
                      </div>
                      @php 
                      $chkvar=!empty($var[1])?$var[1]:"";
                      @endphp
                    @endif
                    @endforeach
                    <div class="box-footer">
                      <input type="button" name="submit" id="exact-submit-button" class="btn btn-primary pull-right exact-submit-button" value="Submit" >
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
