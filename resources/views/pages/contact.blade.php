@extends('layouts.inner_layout')
@section('title', 'Contact Us')
@section('content')
<div class="col-md-8">
    <div class="rightP">
        <h3>Contact <b>Us</b></h3>
        <div class="row">

            <div class="col-sm-6 col-md-6">
                    <h4><b>Swasthya Bandhav</b></h4>
                    <p class="mar0">Indo Japan Building, Saltlake, Kolkata - 700091</p>
                    <p class="mar0"><i class="fa fa-phone" aria-hidden="true"></i> +91 123456789</p>
                    <p class="mar0"><i class="fa fa-fax" aria-hidden="true"></i> 123456</p>
                    <p class="mar0"><i class="fa fa-envelope-open" aria-hidden="true"></i> info@wrctechnologies.com</p>

                    <div class="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d58951.74393883239!2d88.39451046560634!3d22.5609944218999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a02744d986f9f2d%3A0x5c3e7e60b349fbd9!2sBidhannagar%2C+West+Bengal!5e0!3m2!1sen!2sin!4v1492678390875" width="100%" height="372" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
            </div>

            <div class="col-sm-6 col-md-6">
                @if($errors->any())
                      <div class="alert alert-danger">
                          @foreach($errors->all() as $error)
                              <p>{{ $error }}</p>
                          @endforeach
                      </div>
                @endif

                @if (Session::has('message'))
                  <div class="alert alert-info">{{ Session::get('message') }}</div>
                @endif

                {!! Form::open(array('method' => 'POST','role'=>'form','files' => true,'route'=>'contactus.store','id'=>'banner_add')) !!}
                    <label>
                        Name <span style="color:red;">* </span>
                        {!! Form::text('name','',array('class'=>'Cinput','id'=>'name','placeholder'=>'Enter name')) !!}
                    </label>

                    <label>
                        Email <span style="color:red;">* </span>
                        {!! Form::text('email','',array('class'=>'Cinput','id'=>'email','placeholder'=>'Enter email address')) !!}
                    </label>

                    <label>
                        Mobile number <span style="color:red;">* </span>
                        {!! Form::text('mobile_no','',array('class'=>'Cinput','id'=>'mobile_no','placeholder'=>'Enter mobile number')) !!}
                    </label>

                    <label>
                        Subject <span style="color:red;">* </span>
                        {!! Form::text('subject','',array('class'=>'Cinput','id'=>'subject','placeholder'=>'Enter subject')) !!}
                    </label>

                    <label>
                        Message <span style="color:red;">* </span>
                        {!! Form::textarea('message','',array('class'=>'Cinput','id'=>'message_id','placeholder'=>'Enter message')) !!}
                    </label>
                     
                     {!! Html::decode(Form::submit("SEND",array('class'=>"button",'id'=>'exact-submit-button'))) !!}
                   
                {!! Form::token()!!}
                {!! Form::close() !!}

            </div>

            

            

        </div>
    </div>
</div>
@stop