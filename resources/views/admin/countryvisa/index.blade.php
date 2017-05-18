@extends('admin.layouts.dashboard_layout')
@section('title', 'Visa')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Visa
       <!--  <small>advanced tables</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Visa</li>
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

            <div><a href="{!!URL::to('/admin/countryvisa/create')!!}"><button type="button" class="btn bg-purple btn-rightad">ADD</button></a></div>

            <!-- /.box-header -->
            <div class="box-body">
              <div class="alert alert-info" id="result77" style="display:none;"></div>
              @if (Session::has('message'))
                  <div class="alert alert-info" id="result7">{{ Session::get('message') }}</div>
              @endif
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Country Name</th>
                    <th>Pdf Link</th>
                    <th>Status</th>
                    <th width="11%">Actions</th>
                  </tr>
                </thead>
               
                <tbody>
                  @if (count($counvisa_lists) > 0)
                    @foreach($counvisa_lists as $counvisa_lists)
                      <tr>
                        <td>{{ $counvisa_lists->country->name }}</td>
                        <td><a href="{{url('/uploads/countryvisa/'.$counvisa_lists->upload_pdf)}}" target="_blank">PDF LINK</a></td>
                        <td>
                          @if($counvisa_lists->status ==1)
                            <span data-toggle="tooltip" data-original-title="Click here to change status">
                            <input type="checkbox" checked id="tog{{ $counvisa_lists->id }}" onchange="return changeStatus('/admin/countryvisa/changestatus',{{ $counvisa_lists->id }})" value="1"  data-toggle="toggle2">
                            </span>
                          @endif
                          @if($counvisa_lists->status ==0)
                          <span data-toggle="tooltip" data-original-title="Click here to change status">
                            <input type="checkbox" id="tog{{ $counvisa_lists->id }}"  onchange="return changeStatus('/admin/countryvisa/changestatus',{{ $counvisa_lists->id }})" value="0" data-toggle="toggle2">
                          </span>
                          @endif
                        </td>
                        <td>
                          <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                            <!-- we will add this later since its a little more complicated than the other two buttons -->
                              <!-- {!! Form::open(array('method' => 'DELETE','url' => array('admin/countryvisa/delete', $counvisa_lists->id),'class' => 'pull-right')) !!}
                                  {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                              {!! Form::close() !!} -->
                          <a href="{!!URL::to('/admin/countryvisa/edit',$counvisa_lists->id)!!}" class="btn btn-primary">Edit</a>
                          <a href="javascript:void(0)" onclick="return deldata('{!!URL::to('/admin/countryvisa/delete',$counvisa_lists->id)!!}')" class="btn btn-danger" >Delete</a>
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