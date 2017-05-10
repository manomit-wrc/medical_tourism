@extends('layouts.inner_layout')
@section('title', 'Success story')
@section('content')
<div class="col-md-8">
	    <div class="rightP">
	      <h3><b>{{ $succstory_data->title }}</b></h3>
	      <p>
            <img src="{{url('/uploads/successstories/thumb_745_214/'.$succstory_data->story_image)}}"  alt="{{ $succstory_data->title }}" >
          </p>
	      <p>{!! $succstory_data->description !!}</p>
        </div>
</div>

@stop