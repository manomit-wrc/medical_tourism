@extends('layouts.inner_layout')
@section('title', 'Immigration')
@section('content')
<div class="col-md-8">
      <div class="rightP">
          <h3>Immigration</b></h3>
          <p>Details of Foreigner's Regional Registration Offices (Primarily for visa extension / renewal which may be required for longer duration of treatment</p>
          <div class="table-responsive">
              <table class="table table-bordered tablebg">
              <thead>
                <tr class="table_topbg">
                  <th>Country</th>
                  <th>Place</th>
                  <th>Name and Designtion</th>
                  <th>Office address</th>
                  <th>Telephone</th>
                  <th>Email</th>
                </tr>
              </thead>
              <tbody>
                 @php
                  $i=1;
                 @endphp 

                 @if (count($immigration_lists) > 0)
                    @foreach($immigration_lists as $immigration_lists)
                      <tr {{ $i % 2 == 0 ? 'style=background-color:#eeeef0' : '' }} >
                        <td>{{ $immigration_lists->country->name }}</td>
                        <td>{{ $immigration_lists->city->name }}</td>
                        <td>{{ $immigration_lists->name }} , {{ $immigration_lists->designation }} {{ $immigration_lists->city->name }}</td>
                        <td>{{ $immigration_lists->address }}, {{ $immigration_lists->city->name }}</td>
                        <td>{{ $immigration_lists->telephone }}</td>
                        <td>{{ $immigration_lists->email }}</td>
                      </tr>
                      @php
                        $i++;
                      @endphp 
                    @endforeach
                  @endif  
                
              </tbody>
            </table>
        </div>

      </div>
  </div>

@stop