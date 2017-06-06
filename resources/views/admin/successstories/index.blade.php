@extends('admin.layouts.dashboard_layout')
@section('title', 'Success story')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Success story
       <!--  <small>advanced tables</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Success story</li>
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

            <div class="topbtn"><a href="{!!URL::to('/admin/successstories/create')!!}"><button type="button" class="btn bg-purple btn-rightad">ADD</button></a></div>

            <!-- /.box-header -->
            <div class="box-body">
              <div class="alert alert-info" id="result77" style="display:none;"></div>
              @if (Session::has('message'))
                  <div class="alert alert-info" id="result7">{{ Session::get('message') }}</div>
              @endif
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th width="15%">Actions</th>
                  </tr>
                </thead>
               
                <tbody>
                  @if (count($succstory_lists) > 0)
                    @foreach($succstory_lists as $succstory_lists)
                      <tr>
                        <td>{{ $succstory_lists->title }}</td>
                        <td>
                          <img class="procedure_img" src="{{url('/uploads/successstories/thumb_200_200/'.$succstory_lists->story_image)}}" alt="{{ $succstory_lists->title }}" >
                        </td>
                        <!-- <td>{{ ($succstory_lists->status ==1)? 'Active':'In-Active' }}</td> -->
                        <td>
                          @if($succstory_lists->status ==1)
                            <span data-toggle="tooltip" data-original-title="Click here to change status">
                            <input type="checkbox" checked id="tog{{ $succstory_lists->id }}" onchange="return changeStatus('/admin/successstories/changestatus',{{ $succstory_lists->id }})" value="1"  data-toggle="toggle2">
                            </span>
                          @endif
                          @if($succstory_lists->status ==0)
                          <span data-toggle="tooltip" data-original-title="Click here to change status">
                            <input type="checkbox" id="tog{{ $succstory_lists->id }}"  onchange="return changeStatus('/admin/successstories/changestatus',{{ $succstory_lists->id }})" value="0" data-toggle="toggle2">
                          </span>
                          @endif
                        </td>
                        <td>
                          <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                            <!-- we will add this later since its a little more complicated than the other two buttons -->
                            
                          <a href="{!!URL::to('/admin/successstories/show',$succstory_lists->id)!!}" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>&nbsp;    
                          <a href="{!!URL::to('/admin/successstories/edit',$succstory_lists->id)!!}" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil-square-o" style="color:green;" aria-hidden="true"></i></a>&nbsp;
                          <a href="javascript:void(0)" onclick="return deldata('{!!URL::to('/admin/successstories/delete',$succstory_lists->id)!!}')" data-toggle="tooltip" data-original-title="Delete" ><i class="fa fa-times" style="color:red;" aria-hidden="true"></i></a>
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