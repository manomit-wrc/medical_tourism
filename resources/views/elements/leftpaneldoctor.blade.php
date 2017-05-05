<div class="col-md-4">
         <div class="qtbox">
            <div class="dr_img">
               
                <img src="{{url('/uploads/doctors/thumb/'.$doctor_data->avators)}}" alt="doctor Image">
            </div>

            <h4 class="user_name">{{ $doctor_data->first_name.' '.$doctor_data->last_name }}</h4>
            <hr>
            <h5 class="user_address">MD, DM - Cardiology</h5>
            <hr>
            <h5 class="user_address">HOD Cardiology</h5>                            
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