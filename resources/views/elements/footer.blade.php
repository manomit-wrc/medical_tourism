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
                                 <!--  <div class="testimonial">
                                     
                                          <div class="pic">
                                               <img src="{{url('/uploads/successstories/thumb/'.$successstory_lists->story_image)}}" class="img-responsive" alt="Image 1">
                                          </div>
                                          <p class="description">
                                            <b>{{ $successstory_lists->title }}</b><br>
                                            {!! \Illuminate\Support\Str::words($successstory_lists->description, 10,'....')  !!}
                                          <br>
                                          <span>WRC Technologies</span>
                                          </p>
                                      
                                  </div> -->

                                  <div class="testimonial">
                                      <div class="pic">
                                          <img src="{{url('/uploads/successstories/'.$successstory_lists->story_image)}}" alt="" class="img-responsive">
                                      </div>
                                      
                                      <p class="description">
                                      <b>{!! \Illuminate\Support\Str::words($successstory_lists->title, 5,'....')  !!}</b><br>
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
                              <li><a href="#">Home</a></li>
                              <li><a href="#">About Swasthya Bandhav</a></li>
                              <li><a href="#">Services</a></li>
                              <li><a href="#">Inquiry</a></li>
                              <li><a href="#">Contact Us</a></li>
                          </ul>
                      </div>
                      <div class="col-md-3">
                          <h3>Medical Providers</h3>
                          <ul>
                              <li><a href="#">Ayurveda & Alternate Medicine</a></li>
                              <li><a href="#">Medical Treatment</a></li>
                              <li><a href="#">Wellness & Rejuvenation</a></li>
                          </ul>
                      </div>
                      <div class="col-md-2">
                          <h3>Medical Treatment</h3>
                          <ul>
                              <li><a href="#">Gastroenterology</a></li>
                              <li><a href="#">Vascular Surgery</a></li>
                              <li><a href="#">Allergy</a></li>
                              <li><a href="#">Sleep Medicine</a></li>
                              <li><a href="#">Ophthalmology (Eye)</a></li>
                          </ul>
                      </div>
                      <div class="col-md-2">
                          <h3>Facility Locations</h3>
                          <ul>
                              <li><a href="#">Varanasi</a></li>
                              <li><a href="#">Kolkata</a></li>
                              <li><a href="#">Delhi</a></li>
                              <li><a href="#">Calicut</a></li>
                              <li><a href="#">Surat</a></li>
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
                                  Copyright 2017. All rights reserved
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