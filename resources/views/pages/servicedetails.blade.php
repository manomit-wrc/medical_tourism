@extends('layouts.inner_layout')
@section('title', 'Service Details')
@section('content')
<div class="col-md-8">
    <div class="rightP">
        <!--<h3>Our <b>Services</b></h3>-->
        <div class="row">

            <div class="col-sm-12">
                
                <div class="sernewD">
                    <div class="detailsP">
                    <img src="{{url('/uploads/medicalfacilities/thumb_745_214/'.$service_data->facility_image)}}" alt="Facility Image">
                    <h4><b>{{ $service_data->name }}</b></h4>
                    <p>{{ $service_data->description }}</p>
                </div>
                </div>

            </div>

            
    </div>
</div>

@stop