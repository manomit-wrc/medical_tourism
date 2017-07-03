@extends('admin.layouts.dashboard_layout')
@section('title', 'Patient Enquiry')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
    <?php echo $patient_enq_data[0]['first_name'].' '.$patient_enq_data[0]['last_name'].'\'s '.'Enquiry'; ?>
       <!--  <small>advanced tables</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="javascript:void(0)">Home</a></li>
         <li><a href="{!!URL::to('/admin/patients')!!}">Patient</a></li>
        <li class="active">Patient Enquiry</li>

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

            <div class="topbtn"><!-- <a href="{{ url('/admin/patients/create') }}"><button type="button" class="btn bg-purple btn-rightad">ADD</button></a> --></div>

            <!-- /.box-header -->
            <div class="box-body">
              @if (Session::has('message'))
                  <div class="alert alert-info" id="result7">{{ Session::get('message') }}</div>
              @endif
              <table id="datatbl_patient_id" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th style="display:none;"></th>
                    <th>Sender</th>
                    <th>Reciever</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Date</th>
                   <!--  <th>Status</th>
                    <th width="18%">Actions</th> -->
                  </tr>
                </thead>

                <tbody>
                  <?php //echo "<pre>"; print_r($patient_enq_data); die; ?>
                  @if (count($patient_enq_data) > 0)
                  
                    @foreach($patient_enq_data as $key=>$val)
                      <tr><?php //echo $val['sender_name']; die;?>
                        <td style="display:none;"><input type="hidden" value="{{ $val['id'] }}"></td>
                        <td>
                          {{ $val['sender_name'] }}
                           @if ($val['sender_type']==1)
                             <i class="fa fa-user-secret" aria-hidden="true"></i>
                           @endif 
                           @if ($val['sender_type']==3)
                            <i class="fa fa-hospital-o" aria-hidden="true"></i>
                           @endif
                        </td>
                        <td>{{ $val['reciever_name'] }}
                           @if ($val['reciever_type']==1)
                             <i class="fa fa-user-secret" aria-hidden="true"></i>
                           @endif 
                           @if ($val['reciever_type']==3)
                            <i class="fa fa-hospital-o" aria-hidden="true"></i>
                           @endif
                        </td>
                        <td>{{ $val['subject'] }}</td>
                        <td>{{ $val['message'] }}</td>
                        <td>
                         {{ date("d F Y",strtotime($val['created_at'])) }} at {{ date("g:ha",strtotime($val['created_at'])) }}
                        </td>
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
