@extends('layouts.inner_layout')
@section('title', 'Search Details')
@section('content')
<div class="col-md-8">
    <div class="rightP">
        <!--<h3>Our <b>Services</b></h3>-->
        <div class="row">

            <div class="col-sm-12">
                <div class="detailsP">
                    <img src="{{url('/uploads/hospitals/thumb/'.$hospital_data->avators)}}" alt="Hospital Image">
                    <h4><b>{{ $hospital_data->name }}</b></h4>
                    <p><i class="fa fa-map-marker" aria-hidden="true"></i>{{ $hospital_data->city->name }}, Kolkata</p>
                     <p><i class="fa fa-globe" aria-hidden="true"></i> <a href="">{{ $hospital_data->website }}</a></p>

                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                          <ul class="address">
                            <li>
                              <strong>Address</strong>
                              <span><em>:</em>  {{ $hospital_data->street_address }} </span>
                            </li>
                            <li>
                              <strong>City</strong>
                              <span><em>:</em>   Panchkula - 134112 </span>
                            </li>
                            <li>
                              <strong>Phone no</strong>
                              <span><em>:</em>  {{ $hospital_data->phone }}</span>
                            </li>
                            <li>
                              <strong>Email</strong>
                              <span><em>:</em>  {{ $hospital_data->email }} </span>
                            </li>
                            <li>
                               <strong></strong>
                              <span><em></em> </span>
                            </li>
                          </ul>     
                        </div>

                        <div class="col-md-6 col-sm-6">
                          <ul class="number">
                            <li>
                              <strong>No. of Hospital Beds</strong>
                              <span>:  {{ $hospital_data->number_of_beds }}</span>
                            </li>
                            <li>
                              <strong>No. of ICU Beds</strong>
                              <span>:   {{ $hospital_data->number_of_icu_beds }}</span>
                            </li>
                            <li>
                              <strong>No. of Operating Rooms</strong>
                              <span>:  {{ $hospital_data->number_of_operating_rooms }}</span>
                            </li>
                            <li>
                              <strong>Payment Mode</strong>
                              <span>:  card, cash, wire</span>
                            </li>
                            <li>
                              <strong>Avg. International Patients</strong>
                              <span>:  {{ $hospital_data->number_of_avg_international_patients }}</span>
                            </li>
                                                               
                          </ul>
                        </div>

                        <div class="clearfix"></div>

                    </div>
                </div>



                <div class="tabbed">
                    <ul class="nav nav-tabs" role="tablist">
                      <li role="presentation" class="active"><a href="#aboutus" aria-controls="aboutus" role="tab" data-toggle="tab">About Us</a></li>
                      <li role="presentation"><a href="#treatment" aria-controls="Treatment" role="tab" data-toggle="tab">Facilities & Services</a></li>
                      <li role="presentation"><a href="#facilities" aria-controls="facilities" role="tab" data-toggle="tab">Facilities</a></li>
                      <li role="presentation"><a href="#distination" aria-controls="distination" role="tab" data-toggle="tab">Distination</a></li>
                      <li role="presentation"><a href="#cp" aria-controls="cp" role="tab" data-toggle="tab">contact provider</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                      <div role="tabpanel" class="tab-pane active" id="aboutus">
                          {!! $hospital_data->description !!}
                      </div>
                      <div role="tabpanel" class="tab-pane" id="treatment">
                          <p>No data available</p>
                      </div>
                      <div role="tabpanel" class="tab-pane" id="facilities">
                          <p>No data available</p>
                      </div>
                      <div role="tabpanel" class="tab-pane" id="distination">
                          <p>No data available</p>
                      </div>
                      <div role="tabpanel" class="tab-pane" id="cp">
                          <p>No data available</p>
                      </div>
                    </div>

                  </div>
            </div>                          
        </div>
    </div>
</div>

@stop