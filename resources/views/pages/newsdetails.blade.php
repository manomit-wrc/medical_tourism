@extends('layouts.inner_layout')
@section('title', 'News Details')
@section('content')
<div class="col-md-8">
    <div class="rightP">
        <!--<h3>Our <b>Services</b></h3>-->
        <div class="row">

            <div class="col-sm-12">
                <div class="detailsP">
                    <img src="{{url('/uploads/medicalfacilities/thumb_745_214/'.$news_data->facility_image)}}" alt="News Image">
                    <h4><b>{{ $news_data->title }}</b></h4>
                    <p>Updated : {{ \Carbon\Carbon::parse($news_data->updated_at)->format('F j, Y')}}</p>
                </div>



                <div class="tabbed">
                   

                    <!-- Tab panes -->
                    <div class="tab-content">
                      <div role="tabpanel" class="tab-pane active">
                          <p>{{ $news_data->description }}</p>
                      
                    </div>

                  </div>
            </div>                          
        </div>
    </div>
</div>

@stop