@extends('layouts.inner_layout')
@section('title', 'Success story')
@section('content')
<div class="col-md-8">
	    <div class="rightP">
	      <h3><b>{{ $succstory_data->title }}</b></h3>
	      
            <img src="{{url('/uploads/successstories/thumb_745_214/'.$succstory_data->story_image)}}"  alt="{{ $succstory_data->title }}" class="st_img" >
          
	      {!! $succstory_data->description !!}
        </div>
</div>

@stop