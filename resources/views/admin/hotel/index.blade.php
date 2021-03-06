@extends('admin.layouts.dashboard_layout')
@section('title', 'Hotel')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Hotel
       <!--  <small>advanced tables</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Hotel</li>
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

            <div class="topbtn"><a href="{!!URL::to('/admin/hotel/create')!!}"><button type="button" class="btn bg-purple btn-rightad" data-toggle="tooltip" data-original-title="Add"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;ADD</button></a></div>

            <!-- /.box-header -->
            <div class="box-body">
              <div class="alert alert-info" id="result77" style="display:none;"></div>
              @if (Session::has('message'))
                  <div class="alert alert-info" id="result7">{{ Session::get('message') }}</div>
              @endif
              <table id="datatbl_hotel_id" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th style="display:none;"></th>
                    <th>Hotel name</th>
                    <th>Address</th>
                    <th>Status</th>
                    <th width="15%">Actions</th>
                  </tr>
                </thead>
               
                <tbody>
                  @if (count($hotels_list) > 0)
                    @foreach($hotels_list as $hotels_list)
                      <tr>
                        <td style="display:none;"><input type="hidden" value="{{ $hotels_list->id }}"></td>
                        <td>{{ $hotels_list->name }}</td>
                        <td>{{ $hotels_list->address }} , {{ $hotels_list->city->name }} , {{ $hotels_list->city->state->name }} , {{ $hotels_list->city->state->country->name }}</td>
                        <td>
                          @if($hotels_list->status ==1)
                            <span data-toggle="tooltip" data-original-title="Click here to change status">
                            <input type="checkbox" checked id="tog{{ $hotels_list->id }}" onchange="return changeStatus('/admin/hotel/changestatus',{{ $hotels_list->id }})" value="1"  data-toggle="toggle2">
                            </span>
                          @endif
                          @if($hotels_list->status ==0)
                          <span data-toggle="tooltip" data-original-title="Click here to change status">
                            <input type="checkbox" id="tog{{ $hotels_list->id }}"  onchange="return changeStatus('/admin/hotel/changestatus',{{ $hotels_list->id }})" value="0" data-toggle="toggle2">
                          </span>
                          @endif
                        </td>
                        <td>
                          <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                            <!-- we will add this later since its a little more complicated than the other two buttons -->                            
                          <a href="{!!URL::to('/admin/hotel/show',$hotels_list->id)!!}" data-toggle="tooltip" data-original-title="View" ><i class="fa fa-eye-slash" aria-hidden="true"></i></a>&nbsp;   
                          <a href="{!!URL::to('/admin/hotel/edit',$hotels_list->id)!!}" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil-square-o" style="color:green;" aria-hidden="true"></i></a>&nbsp;
                          <a href="javascript:void(0)" onclick="return deldata('{!!URL::to('/admin/hotel/delete',$hotels_list->id)!!}')" data-toggle="tooltip" data-original-title="Delete" ><i class="fa fa-times" style="color:red;" aria-hidden="true"></i></a>
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