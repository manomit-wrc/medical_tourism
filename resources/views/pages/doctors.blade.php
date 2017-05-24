@extends('layouts.inner_layout')
@section('title', 'Doctors')
@section('content')
<div class="col-md-8">
    <div class="rightP">
        <h3>Our <b>Doctors</b></h3>
        <div class="row">

              <div class="fieldboxD">
                <select name="" class="listtypeleft">
                    <option value="Specility">Specility</option>
                    <option value="Specility">Specility</option>
                    <option value="Specility">Specility</option>
                </select>
              </div>

              <div class="fieldboxD">
                <select name="" class="listtypeleft">
                    <option value="Procedure">Procedure</option>
                    <option value="Procedure">Procedure</option>
                    <option value="Procedure">Procedure</option>
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
                    <a href="{!!URL::to('/doctordetail/'.$doctor_data->id)!!}"><img src="{{url('/uploads/doctors/thumb/'.$doctor_data->avators)}}" alt="doctor Image"></a>
                    <h4>{{ $doctor_data->first_name.' '.$doctor_data->last_name }}</h4>
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