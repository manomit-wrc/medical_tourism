@extends('layouts.inner_layout')
@section('title', 'News')
@section('content')
<div class="col-md-8">
    <div class="rightP">
        <h3><b>News</b></h3>
        <div class="row">
            @if (count($news_lists) > 0)
                @foreach($news_lists as $news_lists)
                    <div class="col-sm-6 col-md-6">
                        <div class="servicesbox">
                           <!--  <img src="{{url('/uploads/medicalfacilities/thumb_352_170/'.$news_lists->facility_image)}}" alt=""> -->
                            <h4>{{ $news_lists->title }}</h4>
                            <p>Updated : {{ \Carbon\Carbon::parse($news_lists->updated_at)->format('F j, Y')}}</p>
                            <p>{!! \Illuminate\Support\Str::words($news_lists->description, 10,'....')  !!}</p>
                            <a class="viewdetails" href="{!!URL::to('/newsdetails/'.$news_lists->id)!!}">VIEW MORE</a>
                        </div>
                    </div>
                @endforeach
            @endif

        </div>
    </div>
</div>

@stop