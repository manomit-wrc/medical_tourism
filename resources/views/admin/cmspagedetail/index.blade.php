@extends('admin.layouts.dashboard_layout')
@section('title', 'CMS List')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        CMS List
       <!--  <small>advanced tables</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">CMS List</li>        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <!-- <h3 class="box-title">Data Table With Full Features</h3> -->
            </div>

            <div class="topbtn"><a href="{!!URL::to('/admin/cmspagedetail/create')!!}"><button type="button" class="btn bg-purple btn-rightad" data-toggle="tooltip" data-original-title="Add"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;ADD</button></a></div>

            <!-- /.box-header -->
            <div class="box-body">
              @if (Session::has('message'))
                  <div class="alert alert-info" id="result7">{{ Session::get('message') }}</div>
              @endif
               @if (Session::has('error_message'))
                  <div class="alert alert-danger" id="result8">{{ Session::get('error_message') }}</div>
              @endif
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Page Name</th>
                    <th>Page Variable</th>
                    <th>Variable's Value</th>                                       
                    <th>status</th>
                    <th width="11%">Actions</th>
                  </tr>
                </thead>
               
                <tbody>

                  @if (count($cmspagedtl) > 0)
                    @foreach($cmspagedtl as $cmsval)
                    
                      <tr>
                        <td>{{ $cmsval['cmspage']['pagename'] }}</td>
                        <td>{{ $cmsval['slag'] }}</td> 
                        <td>{!! \Illuminate\Support\Str::words($cmsval['description'], 10,'....') !!}</td>                        
                        <td>{{ ($cmsval['status'] ==1)? 'Active':'In-Active' }}</td>
                        <td>
                          <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                            <!-- we will add this later since its a little more complicated than the other two buttons -->                                                         
                          <a href="{!!URL::to('/admin/cmspagedetail/edit',$cmsval['id'])!!}" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil-square-o" style="color:green;" aria-hidden="true"></i></a>
                          <!--<a href="{!!URL::to('/admin/cmspagedetail/delete',$cmsval['id'])!!}" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger" >Delete</a>-->
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