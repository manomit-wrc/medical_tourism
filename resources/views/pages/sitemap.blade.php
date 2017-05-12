@extends('layouts.inner_layout')
@section('title', 'Site map')
@section('content')
<div class="col-md-8">
	    <div class="rightP">
		     <h3><b>{!! $sitemap_data['sitemap-title'] !!}</b></h3>
		      {!! $sitemap_data['sitemap-description'] !!}
	    </div>
</div>

@stop