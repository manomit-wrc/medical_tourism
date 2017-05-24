@extends('admin.layouts.dashboard_layout')
@section('title', 'Add Messages')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Messages
       <!--  <small>advanced tables</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="{!!URL::to('/admin/dashboard')!!}">Home</a></li>
        <li><a href="{!!URL::to('/admin/messages',$patient_id)!!}">Messages</a></li>
        <li class="active">Add</li>
      </ol>
    </section>

  <!-- Main content -->
     <section class="content">
      <div class="row">
  
        <!-- right column -->
        <div class="col-md-12">
          <!-- Horizontal Form -->
          
          <!-- /.box -->
          <!-- general form elements disabled -->
          <div class="box box-warning">
             <!-- if there are creation errors, they will show here -->
            
           
            <div class="box-body">
             
                <form action="{!!URL::to('/admin/messages/store',$patient_id)!!}" method="post">
                    {{ csrf_field() }}
                    <div class="col-md-6">
                        <!-- Subject Form Input -->
                        <div class="form-group">
                            <label class="control-label">Subject</label>
                            <input type="text" class="form-control" name="subject" placeholder="Subject"
                                   value="{{ old('subject') }}">
                        </div>

                        <!-- Message Form Input -->
                        <div class="form-group">
                            <label class="control-label">Message</label>
                            <textarea name="message" class="form-control">{{ old('message') }}</textarea>
                        </div>

                        @if($users->count() > 0)
                          <div class="form-group">
                            <label class="control-label">Patients:</label>
                            <div class="checkbox">
                                @foreach($users as $key=>$user)
                                    <label title="{{ $user->first_name.' '.$user->last_name }}"><input type="checkbox" name="recipients[]" value="{{ $user->id }}">{!! $user->first_name.' '.$user->last_name !!}</label><br/>
                                @endforeach
                            </div>
                          </div>
                        @endif

                        @if($adminusers->count() > 0)
                          <div class="form-group">
                            <label class="control-label">Hospital Admin:</label>
                            <div class="checkbox">
                                @foreach($adminusers as $key=>$adminuser)
                                    <label title="{{ $adminuser->name }}"><input type="checkbox" name="recipients_admin[]" value="{{ $adminuser->id }}">{!! $adminuser->name !!}</label><br/>
                                @endforeach
                            </div>
                          </div>
                        @endif
                
                        <!-- Submit Form Input -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@stop