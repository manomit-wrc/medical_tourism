@extends('layouts.inner_layout')
@section('title', 'Doctors')
@section('content')
<div class="col-md-8">
    <div class="rightP">
        <h3>Our <b>Doctors</b></h3>
        <div class="row">
         @if (count($doctor_data) > 0)
            @foreach($doctor_data as $doctor_data)
            <div class="col-sm-6 col-md-4">
                <div class="servicesbox">
                    <img src="{{url('/uploads/doctors/thumb/'.$doctor_data->avators)}}" alt="doctor Image">
                    <h4>{{ $doctor_data->first_name.' '.$doctor_data->last_name }}</h4>
                    <p>Lorem Ipsum is simply dummy text of the printing.</p>
                    <!--<a class="viewdetails" href="details.html">VIEW MORE</a>-->
                    <a href="#" class="socialD"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                    <a href="#" class="socialD"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                    <a href="#" class="socialD"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                    <a class="viewdetails" href="{!!URL::to('/doctordetail/'.$doctor_data->id)!!}">VIEW MORE</a>
                </div>
            </div>
            @endforeach
        @endif

        </div>
    </div>
</div>
@stop