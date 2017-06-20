@extends('layouts.inner_layout')
@section('title', 'Search Details')
@section('content')
<div class="col-md-8">
    <div class="rightP">
        <!--<h3>Our <b>Services</b></h3>-->
        <div class="row">

          <div class="col-md-6">
            <div class="Himg">
                <img src="{{url('/uploads/hospitals/'.$hospital_data->avators)}}" alt="Hospital Image">
                <h4><b>{{ $hospital_data->name }}</b></h4>
                <p><i class="fa fa-globe" aria-hidden="true"></i> <a href="">{{ $hospital_data->website }}</a></p>
            </div>
          </div>

          <div class="col-md-6">
              <div class="Hright">
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><b>Address</b></td>
                    <td>:</td>
                    <td>{{ $hospital_data->street_address }}</td>
                  </tr>
                  <tr>
                    <td><b>City</b></td>
                    <td>:</td>
                    <td>{{ $hospital_data->city->name }} - {{ $hospital_data->zipcode }}</td>
                  </tr>
                  <tr>
                    <td width="30%"><b>Phone no</b></td>
                    <td>:</td>
                    <td>{{ $hospital_data->phone }}</td>
                  </tr>
                  <tr>
                    <td><b>Email</b></td>
                    <td>:</td>
                    <td>{{ $hospital_data->email }}</td>
                  </tr>
                </table>
              </div>

              <div class="Hright">
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><b>No. of Hospital Beds</b></td>
                    <td>:</td>
                    <td>{{ $hospital_data->number_of_beds }}</td>
                  </tr>
                  <tr>
                    <td><b>No. of ICU Beds</b></td>
                    <td>:</td>
                    <td>{{ $hospital_data->number_of_icu_beds }}</td>
                  </tr>
                  <tr>
                    <td width="60%"><b>No. of Operating Rooms</b></td>
                    <td>:</td>
                    <td>{{ $hospital_data->number_of_operating_rooms }}</td>
                  </tr>
                  <tr>
                    <td><b>Payment Mode</b></td>
                    <td>:</td>
                    <td>card, cash, wire</td>
                  </tr>
                  <tr>
                    <td><b>Avg. International Patients</b></td>
                    <td>:</td>
                    <td>{{ $hospital_data->number_of_avg_international_patients }}</td>
                  </tr>
                </table>
              </div>
          </div>


            <div class="col-sm-12">
                <div class="detailsP">
                    <!-- <img src="{{url('/uploads/hospitals/'.$hospital_data->avators)}}" alt="Hospital Image"> -->
                    <!-- <h4><b>{{ $hospital_data->name }}</b></h4> -->
                    <!-- <p><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;{{ $hospital_data->country->name }}, {{ $hospital_data->state->name }},, {{ $hospital_data->city->name }}</p> -->
                     <!-- <p><i class="fa fa-globe" aria-hidden="true"></i> <a href="">{{ $hospital_data->website }}</a></p> -->

                    
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