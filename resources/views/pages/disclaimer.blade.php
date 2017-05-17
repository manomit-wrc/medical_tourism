@extends('layouts.inner_layout')
@section('title', 'Disclaimer')
@section('content')
<div class="col-md-8">
	  <div class="rightP">
	      <h3><b>{!! $disclaimer_data['disclaimer-title'] !!}</b></h3>
	      {!! $disclaimer_data['disclaimer-description'] !!}

	  </div>
</div>

@stop