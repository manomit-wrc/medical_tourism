@extends('layouts.inner_layout')
@section('title', 'About')
@section('content')
<div class="col-md-8">
                          <div class="rightP">
                              <h3>Our <b>Services</b></h3>
                              <div class="row">

                                  <div class="col-sm-6 col-md-6">
                                      <div class="servicesbox">
                                          <img src="{!!URL::to('storage/frontend/images/sr1.jpg')!!}" alt="">
                                          <h4>Apollo hospital kolkata</h4>
                                          <p>Lorem Ipsum is simply dummy text of the printing.</p>
                                          <a class="viewdetails" href="{!!URL::to('/servicedetails')!!}">VIEW MORE</a>
                                      </div>
                                  </div>

                                  <div class="col-sm-6 col-md-6">
                                      <div class="servicesbox">
                                          <img src="{!!URL::to('storage/frontend/images/sr2.jpg')!!}" alt="">
                                          <h4>AMRI hospital kolkata</h4>
                                          <p>Lorem Ipsum is simply dummy text of the printing.</p>
                                          <a class="viewdetails" href="{!!URL::to('/servicedetails')!!}">VIEW MORE</a>
                                      </div>
                                  </div>

                                  <div class="col-sm-6 col-md-6">
                                      <div class="servicesbox">
                                          <img src="{!!URL::to('storage/frontend/images/sr3.jpg')!!}" alt="">
                                          <h4>RUBY hospital kolkata</h4>
                                          <p>Lorem Ipsum is simply dummy text of the printing.</p>
                                          <a class="viewdetails" href="{!!URL::to('/servicedetails')!!}">VIEW MORE</a>
                                      </div>
                                  </div>

                                  <div class="col-sm-6 col-md-6">
                                      <div class="servicesbox">
                                          <img src="{!!URL::to('storage/frontend/images/sr4.jpg')!!}" alt="">
                                          <h4>Peerless hospital kolkata</h4>
                                          <p>Lorem Ipsum is simply dummy text of the printing.</p>
                                          <a class="viewdetails" href="{!!URL::to('/servicedetails')!!}">VIEW MORE</a>
                                      </div>
                                  </div>

                              </div>
                          </div>
                      </div>

@stop