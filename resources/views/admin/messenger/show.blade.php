@extends('admin.layouts.dashboard_layout')
@section('title', 'Message')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{ $thread->subject }}
       <!--  <small>advanced tables</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><a href="{!!URL::to('/admin/messages')!!}">Message</a></li>
        <li class="active">View</li>
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

           <!--  <div class="topbtn"><a href="{!!URL::to('/admin/messages/create')!!}"><button type="button" class="btn bg-purple btn-rightad">ADD</button></a></div> -->

            <!-- /.box-header -->
            <div class="box-body">
              <div class="alert alert-info" id="result77" style="display:none;"></div>
              @each('admin.messenger.partials.messages', $thread->messages, 'message')

              @include('admin.messenger.partials.form-message')
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