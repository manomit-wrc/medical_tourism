@extends('admin.layouts.dashboard_layout')
@section('title', 'Test Centre')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Test Centre
       <!--  <small>advanced tables</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Test Centre</li>
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

            <div class="topbtn"><a href="{!!URL::to('/admin/testcentre/create')!!}"><button type="button" class="btn bg-purple btn-rightad" data-toggle="tooltip" data-original-title="Add">ADD</button></a></div>

            <!-- /.box-header -->
            <div class="box-body">
              <div class="alert alert-info" id="result77" style="display:none;"></div>
              @if (Session::has('message'))
                  <div class="alert alert-info" id="result7">{{ Session::get('message') }}</div>
              @endif
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Centre name</th>
                    <th>Address</th>
                    <th>Status</th>
                    <th width="35%">Actions</th>
                  </tr>
                </thead>
               
                <tbody>
                
                  @if (count($testcentre_list) > 0)
                    @foreach($testcentre_list as $testcentre_val)
                                      
                      <tr>
                        <td>{{ $testcentre_val->name }}</td>
                        <td>{{ $testcentre_val->address }}</td>
                        <td>
                          @if($testcentre_val->status ==1)
                            <span data-toggle="tooltip" data-original-title="Click here to change status">
                            <input type="checkbox" checked id="tog{{ $testcentre_val->id }}" onchange="return changeStatus('/admin/testcentre/changestatus',{{ $testcentre_val->id }})" value="1"  data-toggle="toggle2">
                            </span>
                          @endif
                          @if($testcentre_val->status ==0)
                          <span data-toggle="tooltip" data-original-title="Click here to change status">
                            <input type="checkbox" id="tog{{ $testcentre_val->id }}"  onchange="return changeStatus('/admin/testcentre/changestatus',{{ $testcentre_val->id }})" value="0" data-toggle="toggle2">
                          </span>
                          @endif
                        </td>
                        <td>
                          <a href="{!!URL::to('/admin/testcentre/medicaltest',$testcentre_val->id)!!}" data-toggle="tooltip" data-original-title="Medical Test"><i class="fa fa-medkit" style="color:green;" aria-hidden="true"></i></a>&nbsp;                                            
                          <a href="{!!URL::to('/admin/testcentre/edit',$testcentre_val->id)!!}" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil-square-o" style="color:green;" aria-hidden="true"></i></a>&nbsp;
                       
                          <a href="javascript:void(0)" onclick="return deldata('{!!URL::to('/admin/testcentre/delete',$testcentre_val->id)!!}')" data-toggle="tooltip" data-original-title="Delete" ><i class="fa fa-times" style="color:red;" aria-hidden="true"></i></a>
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