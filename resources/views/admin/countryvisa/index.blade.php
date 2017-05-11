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
              @if (Session::has('message'))
                  <div class="alert alert-info">{{ Session::get('message') }}</div>
              @endif
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Country Name</th>
                    <th>Pdf Link</th>
                    <th>Actions</th>
                  </tr>
                </thead>
               
                <tbody>
                  @if (count($counvisa_lists) > 0)
                    @foreach($counvisa_lists as $counvisa_lists)
                      <tr>
                        <td>{{ $counvisa_lists->country->name }}</td>
                        <td><a href="{{url('/uploads/countryvisa/'.$counvisa_lists->upload_pdf)}}" target="_blank">PDF LINK</a></td>
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