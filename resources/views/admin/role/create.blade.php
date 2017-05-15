@extends('admin.layouts.dashboard_layout')
@section('title', 'Role')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Role
       <!--  <small>advanced tables</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="{!!URL::to('/admin/dashboard')!!}">Home</a></li>
        <li><a href="{!!URL::to('/admin/role')!!}">Role</a></li>
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

                <form method="post" name="frmRole" action="/admin/role/add" >
                  {{ csrf_field() }}
                  <div class="col-md-6">
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                      <label for="name">Role Name: <span style="color:red;">*</span></label>
                      <input type="text" name="name" id="name" class="form-control" autofocus >

                      <span class="text-danger">{{ $errors->first('name') }}</span>
                    </div>
                    <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                      <label for="name">Status: <span style="color:red;">*</span></label>
                      <select name="status" id="status" class="form-control" autofocus >
                        <option value="1">Active</option>
                        <option value="0">In-Active</option>
                      </select>
                      
                      <span class="text-danger">{{ $errors->first('status') }}</span>
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
