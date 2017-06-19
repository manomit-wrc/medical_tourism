@extends('layouts.home_layout')
@section('title', 'Home')
@section('content')
 <!--/////////////////////////////////Medical Category section start///////////////////////////////////////-->
  <div class="container-fluid">
      <div class="row">
          <div class="category">
              <div class="container">
                  <div class="row">
                      <div class="col-md-12">
                          <h2>Medical <strong>category</strong></h2>
                          <p>{{ $homepagecondata[0]->medical_category_description }}</p>
                  
                          <div class="jcarousel-wrapper">
                            <div class="jcarousel">
                                <ul>
                                    @if(count($procedure_lists) > 0)
                                      @foreach($procedure_lists as $procedure_lists)
                                        <li>
                                        <a href="{!!URL::to('search-data?_token='.csrf_token().'&select_treatment=&select_procedure='.$procedure_lists->id.'&txt_search=')!!}" > 
                                        <img src="{{url('/uploads/procedures/thumb/'.$procedure_lists->procedure_image)}}"  alt="Image 1"><h3>{{ $procedure_lists->name }}</h3>
                                        </a></li>
                                      @endforeach
                                    @endif
                                </ul>
                            </div>
                            <a href="#" class="jcarousel-control-prev arrow_M0"><img src="{!!URL::to('storage/frontend/images/mal.png')!!}"  alt="Image 1"></a>
                            <a href="#" class="jcarousel-control-next arrow_M0"><img src="{!!URL::to('storage/frontend/images/mar.png')!!}"  alt="Image 1"></a>
                            <p class="jcarousel-pagination"></p>
                        </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!--/////////////////////////////////Medical Category section end///////////////////////////////////////-->

  <!--/////////////////////////////////Medical Facility section start///////////////////////////////////////-->
   <div class="container-fluid">
      <div class="row">
          <div class="medicalF">
              <div class="container">
                  <div class="row">
                      <div class="col-md-12">
                       <h2>Medical <strong>facility</strong></h2>

                       <div class="jcarousel-wrapper">
                            <div class="jcarousel">
                                <ul>
                                  @if(count($medicalfacility_lists) > 0)
                                    @foreach($medicalfacility_lists as $medicalfacility_lists)
                                    <li><img src="{{url('/uploads/medicalfacilities/thumb_243_149/'.$medicalfacility_lists->facility_image)}}"  alt="{{ $medicalfacility_lists->name }}">
                                        <h3>{{ $medicalfacility_lists->name }}</h3>
                                        <p>{!! \Illuminate\Support\Str::words($medicalfacility_lists->description, 10,'....')  !!}</p>
                                    </li>
                                    @endforeach
                                  @endif
                                </ul>
                            </div>
                            <a href="#" class="jcarousel-control-prev"><img src="{!!URL::to('storage/frontend/images/mal.png')!!}"  alt="Image 1"></a>
                            <a href="#" class="jcarousel-control-next"><img src="{!!URL::to('storage/frontend/images/mar.png')!!}"  alt="Image 1"></a>

                            <p class="jcarousel-pagination pagimob"></p>
                        </div>

                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!--/////////////////////////////////Medical Facility section end///////////////////////////////////////-->


  <!--/////////////////////////////////Accomodation section start///////////////////////////////////////-->
  <div class="container">
      <div class="row">
          <div class="accomodation">
            <div class="col-md-12">
                <h2>accomodation</h2>
            </div>

            <div class="col-md-4">
                <div class="accdbox">
                    <a href="{!!URL::to('/connectivity')!!}"><img src="{{url('/uploads/homepagecontent/thumb_360_167/'.$homepagecondata[0]->accomodation_left_image)}}"  alt="{{ $homepagecondata[0]->accomodation_left_title }}"></a>
                    <h3>{{ $homepagecondata[0]->accomodation_left_title }}</h3>
                    <p>{{ $homepagecondata[0]->accomodation_left_description }}</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="accdbox">
                    <a href="{!!URL::to('/immigration')!!}"><img src="{{url('/uploads/homepagecontent/thumb_360_167/'.$homepagecondata[0]->accomodation_middle_image)}}"  alt="{{ $homepagecondata[0]->accomodation_middle_title }}"></a>
                    <h3>{{ $homepagecondata[0]->accomodation_middle_title }}</h3>
                    <p>{{ $homepagecondata[0]->accomodation_middle_description }}</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="accdbox">
                    <a href="{!!URL::to('/visa')!!}"><img src="{{url('/uploads/homepagecontent/thumb_360_167/'.$homepagecondata[0]->accomodation_right_image)}}"  alt="{{ $homepagecondata[0]->accomodation_right_title }}"></a>
                    <h3>{{ $homepagecondata[0]->accomodation_right_title }}</h3>
                    <p>{{ $homepagecondata[0]->accomodation_right_description }}</p>
                </div>
            </div>
            <br clear="all">
            <!-- <div class="col-md-2 col-md-offset-5">
              <a href="#" class="viewmore">VIEW MORE</a>
            </div> -->
            </div>
          </div>
  </div>
  <!--/////////////////////////////////Accomodation section end///////////////////////////////////////-->
@stop