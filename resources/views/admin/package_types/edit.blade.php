@extends('admin.layouts.dashboard_layout')
@section('title', 'Edit PackageType')
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

                <form method="post" name="frmPackageType" action="/admin/package-types/update/{{$package_details->id}}" enctype="multipart/form-data" >
                  {{ csrf_field() }}
                  <div class="col-md-12">
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                      <label for="name">Name: <span style="color:red;">*</span></label>
                      <input type="text" name="name" id="name" class="form-control" value="{{ $package_details->name }}" autofocus >

                      <span class="text-danger">{{ $errors->first('name') }}</span>
                    </div>
                    <div class="form-group {{ $errors->has('ckeditor') ? 'has-error' : '' }}">
                      <label for="name">Description: <span style="color:red;">*</span></label>
                      <textarea name="ckeditor" id="textarea_id" class="form-control ckeditor" >{{ $package_details->description }}</textarea>
                      <span class="text-danger">{{ $errors->first('ckeditor') }}</span>
                    </div>
                    <div class="form-group">
                          <label for="name">Status: </label>
                          <select name="status" id="status" class="form-control" autofocus >
                            <option value="1" {{ $package_details->status == "1" ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ $package_details->status == "0" ? 'selected' : '' }}>In-Active</option>
                          </select>                          
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
