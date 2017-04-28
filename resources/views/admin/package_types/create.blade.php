@extends('admin.layouts.dashboard_layout')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        PackageType
       <!--  <small>advanced tables</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="{!!URL::to('/admin/dashboard')!!}">Home</a></li>
        <li><a href="{!!URL::to('/admin/package-types')!!}">PackageType</a></li>
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

                <form method="post" name="frmPackageType" action="/admin/package-types/store" enctype="multipart/form-data" >
                  {{ csrf_field() }}
                  <div class="col-md-6">
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                      <label for="name">Name: <span style="color:red;">*</span></label>
                      <input type="text" name="name" id="name" class="form-control" value="{{ old('name')}}" autofocus >

                      <span class="text-danger">{{ $errors->first('name') }}</span>
                    </div>
                    <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                      <label for="name">Description: <span style="color:red;">*</span></label>
                      <textarea name="description" id="description" class="form-control" ></textarea>
                      <span class="text-danger">{{ $errors->first('description') }}</span>
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
