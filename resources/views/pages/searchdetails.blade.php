@extends('layouts.inner_layout')
@section('title', 'Service Details')
@section('content')
<div class="col-md-8">
    <div class="rightP">
        <!--<h3>Our <b>Services</b></h3>-->
        <div class="row">

            <div class="col-sm-12">
                <div class="detailsP">
                    <img src="{!!URL::to('storage/frontend/images/hostpital.jpg')!!}" alt="">
                    <h4><b>Apollo hospital kolkata</b></h4>
                    <p><i class="fa fa-map-marker" aria-hidden="true"></i> India, Kolkata</p>
                     <p><i class="fa fa-globe" aria-hidden="true"></i> <a href="">www.ddd.com</a></p>

                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                          <ul class="address">
                            <li>
                              <strong>Address</strong>
                              <span><em>:</em>  Sector 21, Panchkula, Haryana </span>
                            </li>
                            <li>
                              <strong>City</strong>
                              <span><em>:</em>   Panchkula - 134112 </span>
                            </li>
                            <li>
                              <strong>Phone no</strong>
                              <span><em>:</em>  +91-172-4500000</span>
                            </li>
                            <li>
                              <strong>Email</strong>
                              <span><em>:</em>  sanjay.jain@alchemisthospitals.com, </span>
                            </li>

                          </ul>     
                        </div>

                        <div class="col-md-6 col-sm-6">
                          <ul class="number">
                            <li>
                              <strong>No. of Hospital Beds</strong>
                              <span>:  98</span>
                            </li>
                            <li>
                              <strong>No. of ICU Beds</strong>
                              <span>:   38</span>
                            </li>
                            <li>
                              <strong>No. of Operating Rooms</strong>
                              <span>:  5</span>
                            </li>
                            <li>
                              <strong>Payment Mode</strong>
                              <span>:  card, cash, wire</span>
                            </li>
                                                               
                          </ul>
                        </div>

                        <div class="clearfix"></div>

                    </div>
                </div>



                <div class="tabbed">
                    <ul class="nav nav-tabs" role="tablist">
                      <li role="presentation" class="active"><a href="#aboutus" aria-controls="aboutus" role="tab" data-toggle="tab">About Us</a></li>
                      <li role="presentation"><a href="#treatment" aria-controls="Treatment" role="tab" data-toggle="tab">Treatment</a></li>
                      <li role="presentation"><a href="#facilities" aria-controls="facilities" role="tab" data-toggle="tab">Facilities</a></li>
                      <li role="presentation"><a href="#distination" aria-controls="distination" role="tab" data-toggle="tab">Distination</a></li>
                      <li role="presentation"><a href="#cp" aria-controls="cp" role="tab" data-toggle="tab">contact provider</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                      <div role="tabpanel" class="tab-pane active" id="aboutus">
                          <p>The idea of Health Tourism, as an independent thing, was made popular in the late 1990s.People from the west travelled to countries in Asia mostly for cosmetic surgeries, for practical reasons of efficiency and cost effectiveness. In these two decades, the trend has changed from travel for wellness to a more serious proposition- a wholesome Medical Tourism. The global growth in the flow of patients and health professionals, as well as medical technology across National borders has given rise to new pattern of consumption and production of healthcare services.</p>
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