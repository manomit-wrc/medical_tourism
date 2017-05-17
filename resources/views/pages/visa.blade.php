@extends('layouts.inner_layout')
@section('title', 'Visa')
@section('content')
<div class="col-md-8">
      <div class="rightP">
          <h3>visa</b></h3>
          <p>Obtaining India medical visa from the respective countries.</p>
          
          <div class="row">
            @if (count($cntvisa_lists) > 0)
             @foreach($cntvisa_lists as $cntvisa_lists)
                <div class="col-sm-3">
                    <a href="{{url('/uploads/countryvisa/'.$cntvisa_lists->upload_pdf)}}" target="_blank" class="country_name">{{ $cntvisa_lists->country->name }}</a>
                </div>
              @endforeach
           @endif
          </div>


      </div>
</div>

@stop