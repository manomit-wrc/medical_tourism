@extends('layouts.inner_layout')
@section('title', 'Privacy Policy')
@section('content')
<div class="col-md-8">
	  <div class="rightP">
	  	  <h3><b>{!! $privacy_policy_data['privacy-policy-title'] !!}</b></h3>
	      {!! $privacy_policy_data['privacy-policy-description'] !!}
	  </div>
</div>

@stop