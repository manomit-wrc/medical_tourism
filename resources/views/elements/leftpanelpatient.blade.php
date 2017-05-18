 <!--Left panel start here-->
  <div class="col-md-4">
      <div class="qtbox">
        <div class="user_img">
            <div class="editP"><a href="javascript:void(0)" data-toggle="modal" data-target="#profileimage_modal"><i class="fa fa-pencil" aria-hidden="true"></i></a></div>
            <span id="upload"><img src="{!! Auth::guard('front')->user()->photo() !!}" alt=""></span>
        </div>

        <h5 class="user_name">{{Auth::guard('front')->user()->first_name}}&nbsp;{{Auth::guard('front')->user()->last_name}}</h5>
        @if($country_details['countries']['name'] && $state_details['states']['name'] && $city_details['cities']['name'])
          <h5 class="user_address"><i class="fa fa-map-marker" aria-hidden="true"></i>{{$city_details['cities']['name']}},&nbsp;{{$state_details['states']['name']}}, &nbsp;{{$country_details['countries']['name']}}</h5>
        @else
          <h5 class="user_address"><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;</h5>
        @endif

        <button type="button" class="{{ (Request::segment(1) == 'change-password') ? 'active_btn':'qtboxbtn' }} " onclick="window.location.href = '/change-password'"><i class="fa fa-lock" aria-hidden="true"></i> Change Password</button>
        <button type="button" class="{{ (Request::segment(1) == 'profile') ? 'active_btn':'qtboxbtn' }}" onclick="window.location.href = '/profile'"><i class="fa fa-user" aria-hidden="true"></i> Profile</button>
        <button type="button" class="{{ (Request::segment(1) == 'upload-documents') ? 'active_btn':'qtboxbtn' }}" onclick="window.location.href = '/upload-documents'"><i class="fa fa-cog" aria-hidden="true"></i> Documents</button>
        <button type="button" class="{{ (Request::segment(1) == 'my-enquiry') ? 'active_btn':'qtboxbtn' }}" onclick="window.location.href = '/my-enquiry'"><i class="fa fa-file" aria-hidden="true"></i> My Enquiry</button>

        <!-- <button type="button" class="qtboxbtn" onclick="window.location.href = '/patient-logout'"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</button> -->

      </div>
      @if(Request::segment(1) != 'contact')
          <div class="qc">
              <a href="{!!URL::to('/contact')!!}">
              <img src="{!!URL::to('storage/frontend/images/mail.png')!!}" alt=""><br>
              quick <strong>contact</strong>
              </a>
          </div>
      @endif
  </div>

  <!--Left panel end-->