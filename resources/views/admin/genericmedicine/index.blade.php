@extends('admin.layouts.dashboard_layout')
@section('title', 'Generic Medicine')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Generic Medicine
       <!--  <small>advanced tables</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Generic Medicine</li>
        
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

            <div class="topbtn"><a href="{!!URL::to('/admin/genericmedicine/create')!!}"><button type="button" class="btn bg-purple btn-rightad" data-toggle="tooltip" data-original-title="Add"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;ADD</button></a></div>

            <!-- /.box-header -->
            <div class="box-body">
            <div class="alert alert-info" id="result77" style="display:none;"></div>
              @if (Session::has('message'))
                  <div class="alert alert-info" id="result7">{{ Session::get('message') }}</div>
              @endif
              <table id="datatbl_genmed_id" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th style="display:none;"></th>
                    <th>Generic Name of the Medicine</th>
                    <th>Brand Name</th>
                    <th>Strip/Unit</th>
                    <th>MRP</th>
                    <th>Status</th>
                    <th width="11%">Actions</th>
                  </tr>
                </thead>               
                <tbody>
                  @if (count($genericmedicine) > 0)
                    @foreach($genericmedicine as $genmedval)
                      <tr>
                        <td style="display:none;"><input type="hidden" value="{{ $genmedval->id }}"></td>
                        <td>{{ $genmedval->generic_name_of_the_medicine }}</td>
                        <td>{{ $genmedval->brand_name }}</td>
                        <td>{{ $genmedval->unit }}</td>
                        <td>{{ $genmedval->price }}</td>
                       <!--  <td>{{ ($genmedval->status ==1)? 'Active':'In-Active' }}</td> -->
                       <td>
                          @if($genmedval->status ==1)
                            <span data-toggle="tooltip" data-original-title="Click here to change status">
                            <input type="checkbox" checked id="tog{{ $genmedval->id }}" onchange="return changeStatus('/admin/genericmedicine/changestatus',{{ $genmedval->id }})" value="1"  data-toggle="toggle2">
                            </span>
                          @endif
                          @if($genmedval->status ==0)
                          <span data-toggle="tooltip" data-original-title="Click here to change status">
                            <input type="checkbox" id="tog{{ $genmedval->id }}"  onchange="return changeStatus('/admin/genericmedicine/changestatus',{{ $genmedval->id }})" value="0" data-toggle="toggle2">
                          </span>
                          @endif
                        </td>
                        <td>
                          <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                            <!-- we will add this later since its a little more complicated than the other two buttons -->
                          <a href="{!!URL::to('/admin/genericmedicine/edit',$genmedval->id)!!}" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil-square-o" style="color:green;" aria-hidden="true"></i></a>&nbsp;                        
                          <a href="javascript:void(0)" onclick="return deldata('{!!URL::to('/admin/genericmedicine/delete',$genmedval->id)!!}')" data-toggle="tooltip" data-original-title="Delete" ><i class="fa fa-times" style="color:red;" aria-hidden="true"></i></a>
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