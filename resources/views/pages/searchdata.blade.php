@extends('layouts.inner_layout')
@section('title', 'Hospitals')
@section('content')

<div class="col-md-8">
   
    <div class="mapbg">
      @php
       //echo "<pre>"; print_r($locations); die;
      @endphp
      <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d471219.7256039201!2d88.36825265!3d22.6759958!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1496723901569" width="100%" height="600" frameborder="0" style="border:0" allowfullscreen></iframe> -->
       <div id="hospitallistingmap"></div>
    </div>
    
</div>

<div class="col-md-4">
    <div class="filtersearch">
        <input type="text" name="" placeholder="Search" >
        <button type="button"></button>
    </div>   
    <div id="myScrollWrapper"> 
	@if (count($search_data) > 0)
            @foreach($search_data as $searchval)
    <div class="filterbox">
    <a href="{!!URL::to('/searchdetails/'.$searchval->id)!!}">
      <img src="{{url('/uploads/hospitals/thumb/'.$searchval->avators)}}" alt="{{ $searchval->name }}"></a>
      <h3>{{ $searchval->name }}</h3>
      <h4>{{ $searchval->country->name }}, {{ $searchval->state->name }}, {{ $searchval->city->name }}</h4>
    </div>
	@endforeach
	@endif
    <!-- <div class="filterbox">
      <img src="http://localhost:8000/storage/frontend/images/host.jpg" alt="">
      <h3>Apollo Hospitals</h3>
      <h4>India, West Bengal, Kolkata</h4>
    </div>
    
    <div class="filterbox">
      <img src="http://localhost:8000/storage/frontend/images/host.jpg" alt="">
      <h3>Apollo Hospitals</h3>
      <h4>India, West Bengal, Kolkata</h4>
    </div>
    
    <div class="filterbox">
      <img src="http://localhost:8000/storage/frontend/images/host.jpg" alt="">
      <h3>Apollo Hospitals</h3>
      <h4>India, West Bengal, Kolkata</h4>
    </div>
    
    <div class="filterbox">
      <img src="http://localhost:8000/storage/frontend/images/host.jpg" alt="">
      <h3>Apollo Hospitals</h3>
      <h4>India, West Bengal, Kolkata</h4>
    </div>
    
    <div class="filterbox">
      <img src="http://localhost:8000/storage/frontend/images/host.jpg" alt="">
      <h3>Apollo Hospitals</h3>
      <h4>India, West Bengal, Kolkata</h4>
    </div>
    
    <div class="filterbox">
      <img src="http://localhost:8000/storage/frontend/images/host.jpg" alt="">
      <h3>Apollo Hospitals</h3>
      <h4>India, West Bengal, Kolkata</h4>
    </div>
    
    <div class="filterbox">
      <img src="http://localhost:8000/storage/frontend/images/host.jpg" alt="">
      <h3>Apollo Hospitals</h3>
      <h4>India, West Bengal, Kolkata</h4>
    </div>
    
    <div class="filterbox">
      <img src="http://localhost:8000/storage/frontend/images/host.jpg" alt="">
      <h3>Apollo Hospitals</h3>
      <h4>India, West Bengal, Kolkata</h4>
    </div> -->

    </div>

    <div class="scrollbar"></div>

</div>
@stop