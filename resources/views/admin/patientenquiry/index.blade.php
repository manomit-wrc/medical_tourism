@extends('admin.layouts.dashboard_layout')
@section('title', 'Enquiry')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Enquiry
       <!--  <small>advanced tables</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="javascript:void(0)">Home</a></li>
        <li class="active">Enquiry</li>

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

            <div class="topbtn">
               <!-- <a href="{{ url('/admin/patients/create') }}"><button type="button" class="btn bg-purple btn-rightad">Reply to Patient</button></a>&nbsp;&nbsp;
               <a href="{{ url('/admin/patients/create') }}"><button type="button" class="btn bg-purple btn-rightad">Reply to Hospital</button></a> -->
             </div>

            <!-- /.box-header -->
            <div class="box-body">
              @if (Session::has('message'))
                  <div class="alert alert-info" id="result7">{{ Session::get('message') }}</div>
              @endif
              <table id="datatbl_langcapability_id" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th style="display:none;"></th>
                    <th>Sender</th>
                    <th>Subject</th>
                    <th>Posted On</th>
                   
                  </tr>
                </thead>

                <tbody>
                  @if (count($patient_enq_data) > 0)
                    @foreach($patient_enq_data as $val)
                     <tr>
                        <td style="display:none;"><input type="hidden" value="{{ $val->id }}"></td>
                        <td> <a href="{!!URL::to('/admin/patientenquiry/show',$val->patient_id)!!}" data-toggle="tooltip" data-original-title="View">{{ $val->first_name.' '.$val->last_name }} </a></td>
                        <td> <a href="{!!URL::to('/admin/patientenquiry/show',$val->patient_id)!!}" data-toggle="tooltip" data-original-title="View">{{ $val->subject }} </a></td>
                        <td> <a href="{!!URL::to('/admin/patientenquiry/show',$val->patient_id)!!}" data-toggle="tooltip" data-original-title="View">{{ date("d F Y",strtotime($val->created_at)) }} at {{ date("g:ha",strtotime($val->created_at)) }} </a></td>
                     </tr>
                    @endforeach
                  @endif
                </tbody>
                <tfoot>
               <!--  <tr>
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
