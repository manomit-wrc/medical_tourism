@extends('admin.layouts.dashboard_layout')
@section('title', 'Procedure')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Procedure
       <!--  <small>advanced tables</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Procedure</li>
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
            <div class="topbtn"><a href="{!!URL::to('/admin/procedure/create')!!}"><button type="button" class="btn bg-purple btn-rightad">ADD</button></a></div>
            <!-- /.box-header -->
            <div class="box-body">
            <div class="alert alert-info" id="result77" style="display:none;"></div>
              @if (Session::has('message'))
                  <div class="alert alert-info" id="result7">{{ Session::get('message') }}</div>
              @endif
              <table id="datatbl_procedure_id" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Procedure name</th>
                    <th>Procedure Image</th>
                    <th>Status</th>
                    <th width="11%">Actions</th>
                    <th style="display:none;"></th>
                  </tr>
                </thead>
               
                <tbody>
                  @if (count($procedure_lists) > 0)
                    @foreach($procedure_lists as $procedure_lists)
                      <tr>
                        <td>{{ $procedure_lists->name }}</td>
                        <td>
                          <img src="{{url('/uploads/procedures/thumb/'.$procedure_lists->procedure_image)}}" alt="Procedure Image" class="procedure_img" >
                        </td>
                        <!-- <td>{{ ($procedure_lists->status ==1)? 'Active':'In-Active' }}</td> -->
                        <td>
                          @if($procedure_lists->status ==1)
                            <span data-toggle="tooltip" data-original-title="Click here to change status">
                            <input type="checkbox" checked id="tog{{ $procedure_lists->id }}" onchange="return changeStatus('/admin/procedure/changestatus',{{ $procedure_lists->id }})" value="1"  data-toggle="toggle2">
                            </span>
                          @endif
                          @if($procedure_lists->status ==0)
                          <span data-toggle="tooltip" data-original-title="Click here to change status">
                            <input type="checkbox" id="tog{{ $procedure_lists->id }}"  onchange="return changeStatus('/admin/procedure/changestatus',{{ $procedure_lists->id }})" value="0" data-toggle="toggle2">
                          </span>
                          @endif
                        </td>
                        <td>
                          <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                            <!-- we will add this later since its a little more complicated than the other two buttons -->
                          <a href="{!!URL::to('/admin/procedure/edit',$procedure_lists->id)!!}" class="btn btn-primary">Edit</a>                            
							            <a href="javascript:void(0)" onclick="return deldata('{!!URL::to('/admin/procedure/delete',$procedure_lists->id)!!}')" class="btn btn-danger" >Delete</a>
						              
                        </td>
                        <td style="display:none;"><input type="hidden" value="{{ $procedure_lists->id }}"></td>
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