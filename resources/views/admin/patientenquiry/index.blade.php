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
             <div class="table-responsive">

                <table class="table table-condensed">
                     <tr><td><b>From</b></td><td><b>Subject</b></td><td align="right"><b>Date</b></td></tr>
                     @if (count($patient_enq_data) > 0)
                        @foreach($patient_enq_data as $key=>$val)
                      <tr>
                       <!-- <td><b>{{ $val['first_name'].' '.$val['last_name'] }}</b></td> -->
                      
                       <td>
                         <a href="{!!URL::to('/admin/patientenquiry/show',$val['id'])!!}" data-toggle="tooltip" data-original-title="View" class="colblack">
                        {{ $val['first_name'].' '.$val['last_name'] }}<b>{{ $val['total']>1?'('.$val['total'].')':'' }}</b>
                         </a>
                      </td>
                        <td>
                          <a href="{!!URL::to('/admin/patientenquiry/show',$val['id'])!!}" data-toggle="tooltip" data-original-title="View" class="colblack">
                            {!! \Illuminate\Support\Str::words($val['subject'], 10,'....')  !!}
                          </a>
                        </td>
                        <!-- <td align="right">
                          <div class="chatarea">
                              <a href="javascript:void(0)" onclick="showhide()"><i class="fa fa-commenting" aria-hidden="true"></i></a>
                                <div id="newpost" class="chatbox" style="display:none;">
                                  <textarea class="Cinput" rows="3"></textarea>
                                  <button type="button" class="buttonchat">SEND</button>
                                </div>
                          </div>
                        </td> -->
                        <td align="right">
                         <a href="{!!URL::to('/admin/patientenquiry/show',$val['id'])!!}" data-toggle="tooltip" data-original-title="View" class="colblack">
                          {{ date("d F Y",strtotime($val['created_at'])) }} at {{ date("g:ha",strtotime($val['created_at'])) }}
                          <i class="fa fa-paperclip" aria-hidden="true"></i>
                         </a>
                         </td>
                      </tr>
                       @endforeach
                      @endif
                </table>
            </div>
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
