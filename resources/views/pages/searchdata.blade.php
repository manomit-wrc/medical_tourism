@extends('layouts.inner_layout')
@section('title', 'Hospitals')
@section('content')

<div class="col-md-8">
    <div class="rightP">
        <h3>Our <b>Hospitals</b></h3>
        <div class="row">

              <!-- <div class="fieldboxD">
                <select name="" class="listtypeleft">
                    <option value="Specility">Specility</option>
                    <option value="Specility">Specility</option>
                    <option value="Specility">Specility</option>
                </select>
              </div>
              
              <div class="fieldboxD">
                <select name="" class="listtypeleft">
                    <option value="Procedure">Procedure</option>
                    <option value="Procedure">Procedure</option>
                    <option value="Procedure">Procedure</option>
                </select>
              </div>
              
              <div class="fieldboxD">
                <input type="text" name="" class="inputleft"> 
              </div>                 
                  
              <div class="fieldsearchD">
                  <button type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
              </div> -->
               
               @php
              if (app('request')->input('txt_search') !='' && !empty(app('request')->input('txt_search'))){
                  $txt_search = app('request')->input('txt_search');
              }else{
                  $txt_search ='';
              }
              if (app('request')->input('select_treatment') !='' && !empty(app('request')->input('select_treatment'))){
                  $select_treatment = app('request')->input('select_treatment');
              }else{
                  $select_treatment ='';
              }
              if (app('request')->input('select_procedure') !='' && !empty(app('request')->input('select_procedure'))){
                  $select_procedure = app('request')->input('select_procedure');
              }else{
                  $select_procedure ='';
              }                  
              @endphp 
              <form name="frmSearch" id="frmSearch" method="get" action="/search-data">
              {{csrf_field()}}
                <div class="fieldboxD">
                  <select name="select_treatment" class="listtypeleft" id="select_treatment">
                          <option value="">Specility</option>
                          @foreach($treatment_list as $key=>$value)
                            <option value="{{$key}}" {{ ($select_treatment == $key)? 'selected':'' }}>{{$value}}</option>
                          @endforeach
                      </select>
                </div>

                <div class="fieldboxD">
                  <select name="select_procedure" class="listtypeleft" id="select_procedure">
                        <option value="">Procedure</option>
                        @foreach($procedure_list as $key=>$value)
                          <option value="{{$key}}" {{ ($select_procedure == $key)? 'selected':'' }}>{{$value}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="fieldboxD">
                  <input type="text" name="txt_search" value="{{ $txt_search }}" id="txt_search" class="inputleft">
                </div>                 
                    
                <div class="fieldsearchD">
                    <button type="submit" id="btn-search"><i class="fa fa-search" aria-hidden="true"></i></button>
                </div>
              </form>
              <br clear="all">              
          
         @if (count($search_data) > 0)
            @foreach($search_data as $searchval)            
            <div class="col-sm-6 col-md-4">
                <div class="servicesboxN">
                    <a href="{!!URL::to('/searchdetails/'.$searchval['id'])!!}"><img src="{{url('/uploads/hospitals/thumb/'.$searchval['avators'])}}" alt="{{ $searchval['name'] }}"></a>
                    <h4>{{ $searchval['name'] }}</h4>
                    <p>{!! \Illuminate\Support\Str::words($searchval['description'], 8,'....')  !!}</p>
                    <a href="#" class="socialD1"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                    <a href="#" class="socialD2"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                    <a href="#" class="socialD3"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                    <!-- <a class="viewdetails" href="{!!URL::to('/doctordetail/'.$searchval['id'])!!}">VIEW MORE</a> -->
                </div>
            </div>
            @endforeach
            @else
            <div class="col-sm-6 col-md-4">
                <div style="margin-top:10px;" >
                    No record found
                </div></div>
            @endif
        </div>
    </div>
</div>
@stop