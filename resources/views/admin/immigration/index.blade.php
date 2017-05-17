@extends('admin.layouts.dashboard_layout')
@section('title', 'Immigration')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Immigration
       <!--  <small>advanced tables</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Immigration</li>
      </ol>
    </section>
    <style>
        .toggle2 {
          height: 23px !important;
        }
    </style>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <!-- <h3 class="box-title">Data Table With Full Features</h3> -->
            </div>

            <div><a href="{!!URL::to('/admin/immigration/create')!!}"><button type="button" class="btn bg-purple btn-rightad">ADD</button></a></div>

            <!-- /.box-header -->
            <div class="box-body">
              <div class="alert alert-info" id="result77" style="display:none;"></div>
              @if (Session::has('message'))
                  <div class="alert alert-info" id="result7">{{ Session::get('message') }}</div>
              @endif
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Place</th>
                    <th>Name and Designation</th>
                    <th>Office address</th>
                    <th>Telephone</th>
                     <th>Email</th>
                     <th>Status</th>
                    <th width="11%">Actions</th>
                  </tr>
                </thead>
               
                <tbody>
                  @if (count($immigration_lists) > 0)
                    @foreach($immigration_lists as $immigration_lists)
                      <tr>
                        <td>{{ $immigration_lists->city->name }}</td>
                        <td>{{ $immigration_lists->name }}<br/>{{ $immigration_lists->designation }}</td>
                        <td>{{ $immigration_lists->address }} {{ $immigration_lists->city->name }} <br/>{{ $immigration_lists->city->name }}</td>
                        <td>{{ $immigration_lists->telephone }}</td>
                        <td>{{ $immigration_lists->email }}</td>
                        <td>
                          @if($immigration_lists->status ==1)
                            <span data-toggle="tooltip" data-original-title="Click here to change status">
                            <input type="checkbox" checked id="tog{{ $immigration_lists->id }}" onchange="return changeStatus('/admin/ajaximmchangestatus',{{ $immigration_lists->id }})" value="1"  data-toggle="toggle2">
                            </span>
                          @endif
                          @if($immigration_lists->status ==0)
                          <span data-toggle="tooltip" data-original-title="Click here to change status">
                            <input type="checkbox" id="tog{{ $immigration_lists->id }}"  onchange="return changeStatus('/admin/ajaximmchangestatus',{{ $immigration_lists->id }})" value="0" data-toggle="toggle2">
                          </span>
                          @endif
                        </td>
                        <td>
                          <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                            <!-- we will add this later since its a little more complicated than the other two buttons -->
                             <!-- {!! Form::open(array('method' => 'DELETE','url' => array('admin/immigration/delete', $immigration_lists->id),'class' => 'pull-right')) !!}
                                  {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                              {!! Form::close() !!} -->
                          <a href="{!!URL::to('/admin/immigration/edit',$immigration_lists->id)!!}" class="btn btn-primary">Edit</a>
                          <a href="javascript:void(0)" onclick="return deldata('{!!URL::to('/admin/immigration/delete',$immigration_lists->id)!!}')" class="btn btn-danger" >Delete</a>
                        </td>
                      </tr>
                    @endforeach
                  @endif
                </tbody>
                <tfoot>
                <!-- <tr>
                  <th>Rendering engine</th>
                  <th>Browser</th>
                </tr> -->
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@stop