@extends('layouts.inner_layout')
@section('title', 'Doctors')
@section('content')
<div class="col-md-8">
    <div class="rightP">
        <h3>Our <b>Doctors</b></h3>
        <div class="row">

              <div class="fieldboxD">
                <select name="select_procedure" class="listtypeleft">
                    <option value="">Speciality</option>
                     @foreach($procedure_list as $key=>$value)
                      <option value="{{$key}}" >{{$value}}</option>
                    @endforeach
                </select>
              </div>

              <div class="fieldboxD">
                <select name="" class="listtypeleft">
                     <option value="">Procedure</option>
                    @foreach($treatment_list as $key=>$value)
                        <option value="{{$key}}" >{{$value}}</option>
                    @endforeach
                </select>
              </div>

              <div class="fieldboxD">
                <input type="text" name="" class="inputleft"> 
              </div>                 
                  
              <div class="fieldsearchD">
                  <button type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
              </div>
              <br clear="all"> 

         @if (count($doctor_data) > 0)
            @foreach($doctor_data as $doctor_data)
            <div class="col-sm-6 col-md-4">
                <div class="servicesboxN">
                    @if(Auth::guard('front')->check())
                    <a href="{!!URL::to('/doctordetail/'.$doctor_data->id)!!}">
                    @else  
                    <a href="#" data-toggle="modal" data-target="#LoginModal"> 
                    @endif 
                    @php
                    if($doctor_data->avators !=''){
                    @endphp
                    <img src="{{url('/uploads/doctors/thumb/'.$doctor_data->avators)}}" alt="doctor Image">
                    @php
                    }else {
                    @endphp
                    <img src="{{url('/uploads/doctors/noimage_user.jpg')}}" alt="doctor Image">
                     @php
                    }
                   @endphp
                    </a>
                    <h4>
                      @if(Auth::guard('front')->check())
                        <a href="{!!URL::to('/doctordetail/'.$doctor_data->id)!!}">
                      @else  
                        <a href="#" data-toggle="modal" data-target="#LoginModal"> 
                      @endif
                          {{ $doctor_data->first_name.' '.$doctor_data->last_name }}
                      </a>  
                    </h4>
                    <p>{!! \Illuminate\Support\Str::words($doctor_data->about, 8,'....')  !!}</p>
                    <a href="#" class="socialD1"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                    <a href="#" class="socialD2"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                    <a href="#" class="socialD3"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                    <!-- <a class="viewdetails" href="{!!URL::to('/doctordetail/'.$doctor_data->id)!!}">VIEW MORE</a> -->
                </div>
            </div>
            @endforeach
        @endif

        </div>
    </div>
</div>
@stop