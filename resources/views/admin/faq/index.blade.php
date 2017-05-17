@extends('admin.layouts.dashboard_layout')
@section('title', 'Faq List')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Faq List
       <!--  <small>advanced tables</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Faq List</li>
        
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

            <div><a href="{!!URL::to('/admin/faq/create')!!}"><button type="button" class="btn bg-purple btn-rightad">ADD</button></a></div>

            <!-- /.box-header -->
            <div class="box-body">
              <div class="alert alert-info" id="result77" style="display:none;"></div>
              @if (Session::has('message'))
                  <div class="alert alert-info" id="result7">{{ Session::get('message') }}</div>
              @endif
               @if (Session::has('error_message'))
                  <div class="alert alert-danger" id="result8">{{ Session::get('error_message') }}</div>
              @endif
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Category</th>
                    <th>Question</th>
                    <th>Answer</th>                    
                    <th>status</th>
                    <th width="11%">Actions</th>
                  </tr>
                </thead>
               
                <tbody>

                  @if (count($faqlist) > 0)
                    @foreach($faqlist as $faqval)
                    
                      <tr>
                        <td>{{ $faqval['faqcategory']['name'] }}</td>
                        <td>{!! \Illuminate\Support\Str::words($faqval['title'], 10,'....')  !!}</td>
                        <td>{!! \Illuminate\Support\Str::words($faqval['description'], 10,'....')  !!}</td>
                        <!-- <td>{{ ($faqval['status'] ==1)? 'Active':'In-Active' }}</td> -->
                        <td>
                          @if($faqval['status'] ==1)
                            <span data-toggle="tooltip" data-original-title="Click here to change status">
                            <input type="checkbox" checked id="tog{{ $faqval['id'] }}" onchange="return changeStatus('/admin/ajaxfaqchangestatus',{{ $faqval['id'] }})" value="1"  data-toggle="toggle2">
                            </span>
                          @endif
                          @if($faqval['status'] ==0)
                          <span data-toggle="tooltip" data-original-title="Click here to change status">
                            <input type="checkbox" id="tog{{ $faqval['id'] }}"  onchange="return changeStatus('/admin/ajaxfaqchangestatus',{{ $faqval['id'] }})" value="0" data-toggle="toggle2">
                          </span>
                          @endif
                        </td>
                        <td>
                          <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                            <!-- we will add this later since its a little more complicated than the other two buttons -->
                          <a href="{!!URL::to('/admin/faq/edit',$faqval['id'])!!}" class="btn btn-primary">Edit</a>
                          <a href="javascript:void(0)" onclick="return deldata('{!!URL::to('/admin/faq/delete',$faqval['id'])!!}')" class="btn btn-danger" >Delete</a>
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