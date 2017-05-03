@extends('admin.layouts.dashboard_layout')
@section('title', 'Medical Test Categories')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Medical Test Categories
       <!--  <small>advanced tables</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Medical Test Categories</li>
        
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

            <div><a href="{!!URL::to('/admin/medicaltestcategories/create')!!}"><button type="button" class="btn bg-purple">ADD</button></a></div>

            <!-- /.box-header -->
            <div class="box-body">
              @if (Session::has('message'))
                  <div class="alert alert-info">{{ Session::get('message') }}</div>
              @endif
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Status</th>                    
                    <th>Actions</th>
                  </tr>
                </thead>
               
                <tbody>
                  @if (count($medicaltestcategories) > 0)
                    @foreach($medicaltestcategories as $medtescatval)
                      <tr>
                        <td>{{ $medtescatval->cat_name }}</td>
                        <td>{{ ($medtescatval->status==1)? 'active':'inactive' }}</td>                        
                        <td>
                          <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                            <!-- we will add this later since its a little more complicated than the other two buttons -->
                            {!! Form::open(array('method' => 'DELETE','url' => array('admin/medicaltestcategories/delete', $medtescatval->id),'class' => 'pull-right')) !!}
                                  {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                              {!! Form::close() !!}
                             
                          <a href="{!!URL::to('/admin/medicaltestcategories/edit',$medtescatval->id)!!}" class="btn btn-primary">Edit</a>
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