@extends('layouts.inner_layout')
@section('title', 'Services')
@section('content')
<div class="col-md-8">
    <div class="rightP">
        <h3>Our <b>Services</b></h3>
        <div class="row">
            @if (count($service_lists) > 0)
                @foreach($service_lists as $service_lists)
                    <div class="col-sm-6 col-md-6">
                        <div class="servicesboxnew">
                            <a  href="{!!URL::to('/servicedetails/'.$service_lists->id)!!}"><img src="{{url('/uploads/medicalfacilities/thumb_352_170/'.$service_lists->facility_image)}}" alt=""></a>
                            <h4><a href="{!!URL::to('/servicedetails/'.$service_lists->id)!!}">{{ $service_lists->name }}</a></h4>
                            <p>{!! \Illuminate\Support\Str::words($service_lists->description, 10,'....')  !!}</p>
                            <a class="viewdetailsnew" href="{!!URL::to('/servicedetails/'.$service_lists->id)!!}">VIEW MORE</a>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>

@stop