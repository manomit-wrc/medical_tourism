<div class="container-fluid">
      <div class="row">
          <div class="ssbg">
              <div class="container">
                  <div class="row">
                      <div class="col-md-7 col-md-offset-5">
                          <h2><strong>Success</strong> stories</h2>
                          <div class="successbox">
                              <div id="testimonial-slider" class="owl-carousel">
                              
                                 @if (count($successstory_lists) > 0)
                                        @foreach($successstory_lists as $successstory_lists)
                                          <div class="testimonial">
                                              <div class="pic">
                                                <a href="{!!URL::to('/successstory_details/'.$successstory_lists->id)!!}">
                                                  <img src="{{url('/uploads/successstories/thumb_200_200/'.$successstory_lists->story_image)}}" alt="" class="img-responsive">
                                                </a>
                                              </div>

                                              <p class="description">
                                              <b><a href="{!!URL::to('/successstory_details/'.$successstory_lists->id)!!}">{!! \Illuminate\Support\Str::words($successstory_lists->title, 5,'....')  !!}</a></b><br>
                                              {!! \Illuminate\Support\Str::words(strip_tags($successstory_lists->description), 10,'....')  !!}
                                              <br>
                                              <span>WRC Technologies</span>
                                              </p>
                                          </div>
                                        @endforeach
                                  @endif


                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>


<div class="container-fluid">
      <div class="row">
          <div class="footer">
              <div class="container">
                  <div class="row">
                      <div class="col-md-2">
                          <h3>Swasthya Bandhav</h3>
                          <ul>
                              <li><a href="{!!URL::to('/')!!}">Home</a></li>
                              <li><a href="{!!URL::to('/about')!!}">About Swasthya Bandhav</a></li>
                              <li><a href="{!!URL::to('/services')!!}">Services</a></li>
                              <li><a href="{!!URL::to('/enquiry')!!}">Enquiry</a></li>
                              <li><a href="{!!URL::to('/news')!!}">News</a></li>
                              <li><a href="{!!URL::to('/contact')!!}">Contact Us</a></li>
                              <li><a href="{!!URL::to('/faqs')!!}">FAQ</a></li>
                          </ul>
                      </div>
                      
                      <div class="col-md-3">
                          <h3>Medical Providers</h3>
                          <ul>
                            @if (count($providertype_lists) > 0)
                              @foreach($providertype_lists as $providertype_lists)
                              <li><a href="#">{{ $providertype_lists->name }}</a></li>
                              @endforeach
                            @endif
                          </ul>
                      </div>

                      <div class="col-md-2">
                          <h3>Medical Treatment</h3>
                          <ul>
                            @if (count($treatment_lists) > 0)
                              @foreach($treatment_lists as $treatment_lists)
                              <li><a href="#">{{ ucfirst(strtolower($treatment_lists->name)) }}</a></li>
                              @endforeach
                            @endif
                          </ul>
                      </div>
                      <div class="col-md-2">
                          <h3>Facility Locations</h3>
                          <ul>
                              @if (count($city_lists) > 0)
                              @foreach($city_lists as $city_lists)
                              <li><a href="#">{{ ucfirst(strtolower($city_lists->name)) }}</a></li>
                              @endforeach
                            @endif
                          </ul>
                      </div>
                      <div class="col-md-3">
                          <h3>Connect With Us</h3>
                          <a href="#" class="socialF"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                          <a href="#" class="socialF"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                          <a href="#" class="socialF"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                          <a href="#" class="socialF"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                          <a href="#" class="socialF"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-12">
                          <div class="footerdown">
                              <div class="row">
                              <div class="col-md-6 col-sm-6">
                                  <div class="copy">
                                  Copyright <script>document.write(new Date().getFullYear())</script>. All rights reserved
                                  </div>
                              </div>

                              <div class="col-md-6  col-sm-6">
                                  <div class="designby">
                                  Powered by<a href="http://www.wrctechnologies.com/" target="_blank"> WRC Technologies</a>
                                  </div>
                              </div>
                              </div>

                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
