@extends('layouts.inner_layout')
@section('title', 'My Profile')
@section('content')
    <!--Right panel start here-->

    <div class="col-md-8">
        <div class="qtbox">
            <h4><b>Edit Profile</b></h4>

            @if (Session::has('message'))
                <div class="alert alert-info" id="resultdocumentmsg">{{ Session::get('message') }}</div>
            @endif
            @if (Session::has('error_message'))
                <div class="alert alert-warning" id="resultdocumentmsg">{{ Session::get('error_message') }}</div>
              @endif
            <div class="row">
              <form name="frmProfile" id="frmProfile" method="post" action="/update-profile" enctype="multipart/form-data">
                {{csrf_field()}}
                <!-- <div class="col-md-4">
                    <label class="on767">
                        Upload Profile Picture
                        <div class="upload_profile">
                          <input type="file" name="avators" id="file-1" class="inputfile inputfile-1"  />
                          <label for="file-1" style="{{$errors->has('avators')?'border:1px solid #f00':''}}"><i class="fa fa-cloud-upload" aria-hidden="true"></i> <span>Choose a file&hellip;</span></label>
                        </div>
                    </label>
                </div> -->

                <br clear="all">

                <!-- <div class="col-md-2">
                    <label>
                        Title
                        <select name="title" class="listtypeleft1" style="{{$errors->has('title')?'border:1px solid #f00':''}}">
                            <option value="">Select</option>
                            <option value="Mr." {{Auth::guard('front')->user()->title == 'Mr.'?'selected':''}}>Mr.</option>
                            <option value="Mrs." {{Auth::guard('front')->user()->title == 'Mrs.'?'selected':''}}>Mrs.</option>
                            <option value="Miss." {{Auth::guard('front')->user()->title == 'Miss.'?'selected':''}}>Miss.</option>
                        </select>
                    </label>
                </div> -->

                <div class="col-md-6">
                    <label>
                        First Name
                        <input type="text" name="first_name" class="Cinput" value="{{Auth::guard('front')->user()->first_name}}" style="{{$errors->has('first_name')?'border:1px solid #f00':''}}">
                    </label>
                </div>

                <div class="col-md-6">
                    <label>
                        Last Name
                        <input type="text" name="last_name" class="Cinput" value="{{Auth::guard('front')->user()->last_name}}" style="{{$errors->has('last_name')?'border:1px solid #f00':''}}">
                    </label>
                </div>
                <br clear="all">

                <div class="col-md-6">
                    <label>
                        Email
                        <input type="text" name="email_id" value="{{Auth::guard('front')->user()->email_id}}" readonly="readonly" class="Cinput" style="{{$errors->has('email_id')?'border:1px solid #f00':''}}">
                    </label>
                </div>

                <!-- <div class="col-md-6">
                    <label>
                        Username
                        <input type="text" name="username" class="Cinput" style="{{$errors->has('username')?'border:1px solid #f00':''}}" value="{{Auth::guard('front')->user()->username}}">
                    </label>
                </div> -->

                <div class="col-md-6">
                    <label>
                        Mobile
                        <input type="text" name="mobile_no" class="Cinput" value="{{Auth::guard('front')->user()->mobile_no}}" style="{{$errors->has('mobile_no')?'border:1px solid #f00':''}}">
                    </label>
                </div>

                <div class="col-md-3">
                    <label>
                        Sex
                        <select name="sex" class="listtypeleft1" style="{{$errors->has('sex')?'border:1px solid #f00':''}}">
                            <option value="">Select</option>
                            <option value="M" {{Auth::guard('front')->user()->sex == 'M'?'selected':''}}>Male</option>
                            <option value="F" {{Auth::guard('front')->user()->sex == 'F'?'selected':''}}>Female</option>
                        </select>
                    </label>
                </div>


                <div class="col-md-3">
                    <label>
                        Country
                        <select name="country_id" id="country_id" class="listtypeleft1" style="{{$errors->has('country_id')?'border:1px solid #f00':''}}">
                            <option value="">Select</option>
                            @foreach ($country_list as $key => $value)
                              <option value="{{$key}}" {{Auth::guard('front')->user()->country_id == $key?'selected':''}}>{{$value}}</option>
                            @endforeach
                        </select>
                    </label>
                </div>

                <div class="col-md-3">
                    <label>
                        State
                        <select name="state_id" id="state_id" class="listtypeleft1" style="{{$errors->has('state_id')?'border:1px solid #f00':''}}">
                            <option value="">Select</option>
                            @foreach ($state_list as $key => $value)
                              <option value="{{$key}}" {{Auth::guard('front')->user()->state_id == $key?'selected':''}}>{{$value}}</option>
                            @endforeach
                        </select>
                    </label>
                </div>

                <div class="col-md-3">
                    <label>
                        City
                        <select name="city_id" id="city_id" class="listtypeleft1" style="{{$errors->has('city_id')?'border:1px solid #f00':''}}">
                            <option value="">Select</option>
                            @foreach ($city_list as $key => $value)
                              <option value="{{$key}}" {{Auth::guard('front')->user()->city_id == $key?'selected':''}}>{{$value}}</option>
                            @endforeach
                        </select>
                    </label>
                </div>

                <div class="col-md-12">
                    <label>
                        Birthday<br>
                        <select name="dob_year" id="dob_year" class="listtypeleft2" style="{{$errors->has('dob_year')?'border:1px solid #f00':''}}">
                            <option value="">Year</option>
                            @foreach ($years as $key => $value)
                              <option value="{{$key}}" {{$dob_year == $key?'selected':''}}>{{$value}}</option>
                            @endforeach
                        </select>

                        <select name="dob_month" id="dob_month" class="listtypeleft2" style="{{$errors->has('dob_month')?'border:1px solid #f00':''}}">
                            <option value="">Month</option>
                            <option value="0" {{$dob_month == "0"?'selected':''}}>Jan</option>
                            <option value="1" {{$dob_month == "1"?'selected':''}}>Feb</option>
                            <option value="2" {{$dob_month == "2"?'selected':''}}>March</option>
                            <option value="3" {{$dob_month == "3"?'selected':''}}>Apr</option>
                            <option value="4" {{$dob_month == "4"?'selected':''}}>May</option>
                            <option value="5" {{$dob_month == "5"?'selected':''}}>June</option>
                            <option value="6" {{$dob_month == "6"?'selected':''}}>Jul</option>
                            <option value="7" {{$dob_month == "7"?'selected':''}}>Aug</option>
                            <option value="8" {{$dob_month == "8"?'selected':''}}>Sept</option>
                            <option value="9" {{$dob_month == "9"?'selected':''}}>Oct</option>
                            <option value="10" {{$dob_month == "10"?'selected':''}}>Nov</option>
                            <option value="11" {{$dob_month == "11"?'selected':''}}>Dec</option>
                        </select>

                        <select name="dob_days" id="dob_days" class="listtypeleft2" style="{{$errors->has('dob_days')?'border:1px solid #f00':''}}">
                            <option value="">Day</option>
                        </select>
                    </label>
                </div>

                <div class="col-md-12">
                    <label>
                        Biography
                        <textarea name="biography" cols="" rows="5" class="Cinput" style="{{$errors->has('biography')?'border:1px solid #f00':''}}">{{Auth::guard('front')->user()->biography}}</textarea>
                    </label>
                </div>

                <div class="col-sm-3">
                    <button type="submit" class="button">SAVE</button>
                </div>
              </form>
            </div>
        </div>
    </div>
    <!--Right panel end-->


@stop
