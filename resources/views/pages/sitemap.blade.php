@extends('layouts.inner_layout')
@section('title', 'Site map')
@section('content')
<div class="col-md-8">
	  <div class="rightP">
	      <h3><b>Site Map</b></h3>
	      <p>
	      	<ul>
	              <li><a href="{!!URL::to('/')!!}">Home</a></li>
	              <li><a href="{!!URL::to('/about')!!}">About Swasthya Bandhav</a></li>
	              <li><a href="{!!URL::to('/services')!!}">Services</a></li>
	              <li><a href="{!!URL::to('/enquiry')!!}">Enquiry</a></li>
	              <li><a href="{!!URL::to('/news')!!}">News</a></li>
	              <li><a href="{!!URL::to('/contact')!!}">Contact Us</a></li>
	              <li><a href="{!!URL::to('/faqs')!!}">FAQ</a></li>
            </ul>
	      </p>

	      </div>
</div>

@stop