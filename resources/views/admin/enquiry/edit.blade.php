@extends('admin.layouts.dashboard_layout')
@section('title', 'View Enquiry')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        View Enquiry
       <!--  <small>advanced tables</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="{!!URL::to('/admin/dashboard')!!}">Home</a></li>
        <li><a href="{!!URL::to('/admin/enquiry')!!}">Enquiry</a></li>         
        <li class="active">View Enquiry</li>
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
           <?php //echo "<pre>"; print_r($enqdata->id); die; ?>
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title"><span><i class="fa fa-eye"></i></span> View details of {{ $enqdata->full_name }}  </h3>
            </div>
             <!-- if there are creation errors, they will show here -->
             
            <!-- /.box-header -->
            @if($errors->any())
              <div class="alert alert-danger">
                  @foreach($errors->all() as $error)
                      <p>{{ $error }}</p>
                  @endforeach
              </div>
            @endif
            <div class="box-body">            
                    <div class="col-md-6"> 

                      <div class="form-group">
                          {!! Html::decode(Form::label('full_name','Name: ')) !!}
                          {{ ($enqdata->full_name)?  $enqdata->full_name:''}}
                      </div>
                      <div class="form-group">
                          {!! Html::decode(Form::label('email','Email: ')) !!}
                          {{ ($enqdata->email)? $enqdata->email:'' }}
                      </div>
                      
                      <div class="form-group">
                          {!! Html::decode(Form::label('mobile_no','Mobile No: ')) !!}
                          {{ ($enqdata->mobile_no)? $enqdata->mobile_no:'' }}
                      </div>
                     
                      <div class="form-group">
                        {!! Html::decode(Form::label('treatment','Mobile No: ')) !!}
                        {{ ($enqdata->treatment->name)? $enqdata->treatment->name:'' }}
                      </div> 

                                     
                       
                      <div class="form-group">
                          {!! Html::decode(Form::label('comments','Message: ')) !!}
                          {{ ($enqdata->comments)? $enqdata->comments:'' }}
                      </div>   

                    </div>             
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