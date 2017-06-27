@extends('admin.layouts.dashboard_layout')
@section('title', 'Doctor')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Doctor
       <!--  <small>advanced tables</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="{!!URL::to('/admin/dashboard')!!}">Home</a></li>
        <li><a href="{!!URL::to('/admin/doctors')!!}">Doctors</a></li>
        <li class="active">View</li>
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

            <div class="box-body">

            <div class="topbtn">
            @php
            if($next !=''){
            @endphp
              <a href="{!!URL::to('/admin/doctors/view/'.$next)!!}">
            @php
            }
            @endphp
              <button data-original-title="Next" data-toggle="tooltip" class="btn btn-primary btnright" type="button">NEXT <i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
               @php
            if($next !=''){
            @endphp
              </a>
            @php
            }
            if($previous !=''){
            @endphp             
              <a href="{!!URL::to('/admin/doctors/view/'.$previous)!!}">
            @php
            }
            @endphp
              <button data-original-title="Previous" data-toggle="tooltip" class="btn btn-primary btnright" type="button"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> PREV</button>
            @php
            if($previous !=''){
            @endphp  
              </a>
            @php
            }
            @endphp 
            </div>

                <div class="col-md-4">
                  <div class="col_box">

                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="name">Name: </label>
                      {{ $doctor_details->first_name }} &nbsp; {{ $doctor_details->last_name }}
                      </div>
                  </div>               
                 

                  
                  <!-- /.textarea input -->

                  <div class="col-md-12">
                    <div class="form-group">
                      <!-- <label for="name">Street Address: <span style="color:red;">*</span></label> -->
                      <label for="name">Street Address: </label>
                      {{ $doctor_details->street_address }}                     
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="name">Country:</label>                     
                        @foreach($country_list as $key => $value)
                        {{ ($key == $doctor_details->country_id)? $value:'' }}
                        @endforeach                     
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="name">State:</label>                      
                        @foreach($state_list as $key => $value)
                        {{ ($key == $doctor_details->state_id)? $value:'' }}
                        @endforeach                      
                    </div>
                  </div>

                  </div>

                  </div>



                  <div class="col-md-4">
                  <div class="col_box">

                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="name">City: </label>                      
                        @foreach($city_list as $key => $value)
                        {{ ($key == $doctor_details->city_id)? $value:'' }}
                        @endforeach   
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group">                      
                      <label for="name">Zipcode: </label>
                     {{ $doctor_details->zipcode }}
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group">                     
                      <label for="name">Email:</label>
                      {{ $doctor_details->email }}
                  </div>
                  </div>
                   <div class="col-md-12">
                    <div class="form-group">                      
                      <label for="name">Sex:</label>
                      {{ ($doctor_details->sex == "male") ? 'Male' : '' }}
                      {{ ($doctor_details->sex == "female") ? 'Female' : '' }}
                    </div>
                  </div>

                </div>
               </div>


                  <div class="col-md-4">
                  <div class="col_box">

                  <div class="col-md-12">
                    <div class="form-group">                      
                      <label for="name">Registration Number:</label>
                      {{ ($doctor_details->reg_no)? $doctor_details->reg_no:''  }}
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group">                      
                      <label for="name">Mobile No:</label>
                      {{ $doctor_details->mobile_no }}
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group">                     
                      <label for="name">Phone No:</label>
                     {{ $doctor_details->phone_no }}                      
                    </div>
                  </div>

                  

                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="name">Degree:</label>                     
                        @foreach($degree_list as $key => $value)
                       {{ in_array($key, $degrees_array)? $value:'' }}
                        @endforeach                  
                    </div>
                  </div>

                  </div>
                </div>



                  <div class="col-md-6">
                  <div class="col_box">
                  <div class="col-md-12">
                    <div class="form-group">                      
                      <label for="name">Speciality:</label>                     
                        @foreach($procedure_list as $key => $value)
                       {{ in_array($key, $procedures_array)? $value:'' }}
                        @endforeach                      
                    </div>
                  </div>
                 </div>
                </div>

                <div class="col-md-6">
                  <div class="col_box">

                  <div class="col-md-12">
                  <div class="form-group">                   
                   <label for="name">Bio :</label>                  
                    {{ strip_tags($doctor_details->about) }}    
                  </div>
                  </div>
                  </div>
                  </div>
                  
                  <div class="col-md-4">
                    <div class="form-group">                     
                      <!-- <label for="name">Image: </label> -->
                      @php
                    if($doctor_details->avators !=''){
                    @endphp                     
                      <img src="{{url('/uploads/doctors/thumb/'.$doctor_details->avators)}}" alt="Doctor Image" class="img_broder">
                      @php
                    }
                   @endphp                      
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

