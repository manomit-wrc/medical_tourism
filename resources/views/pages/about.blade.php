@extends('layouts.inner_layout')
@section('title', 'About')
@section('content')
<div class="col-md-8">
	<div class="rightP">
       <h3><b>{!! $aboutpage_data['about-us-title'] !!}</b></h3>
       <p>{!! $aboutpage_data['about-us-description'] !!}</p>
    </div>
</div>

@stop