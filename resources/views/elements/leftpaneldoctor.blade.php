<div class="col-md-4">
         <div class="qtbox">
            <div class="dr_img">
               @if (!empty($doctor_details->avators))
                <img src="{{url('/uploads/doctors/thumb_250_250/'.$doctor_details->avators)}}" alt="doctor Image">
               @else
                <img src="{{url('/uploads/doctors/noimage_user.jpg')}}" alt="No Image">
               @endif
            </div>

            <h4 class="user_name">{{ $doctor_details->first_name.' '.$doctor_details->last_name }}</h4>
            <hr>
            @php
                $doctor_degrees_var = '';
                $i=1;
            @endphp 
            @if (count($doctor_degree_details) > 0)
                @foreach($doctor_degree_details as $doctor_degrees_arr)
                    @php 
                     $j=count($doctor_degrees_arr['degrees']);
                    @endphp

                    @foreach($doctor_degrees_arr['degrees'] as $doctor_degrees_array)
                       @php
                        $doctor_degrees_var.= $doctor_degrees_array['name'];
                       @endphp 

                       @if ($i != $j)
                         @php
                           $doctor_degrees_var.=' , ';
                          @endphp 
                       @endif

                       @php
                        $i++;
                       @endphp 

                    @endforeach
                @endforeach
            @endif
            <h5 class="user_address">{{ $doctor_degrees_var }}</h5>
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