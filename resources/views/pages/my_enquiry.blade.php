@extends('layouts.inner_layout')
@section('title', 'My Enquiry')
@section('content')
<div class="col-md-8">
    <div class="qtbox">
        <h3>My <b>Enquiries</b></h3>

        @if (Session::has('message'))
                <div class="alert alert-info" id="resultdocumentmsg">{{ Session::get('message') }}</div>
        @endif
        @if (Session::has('error_message'))
            <div class="alert alert-warning" id="resultdocumentmsg">{{ Session::get('error_message') }}</div>
        @endif


            <div class="table-responsive">
                <div class="col-md-3 col-md-offset-9">
                   <div class="topbtn">
                        <a href="{{ url('/enquirysend') }}"><button type="button" class="btn bg-purple btn-rightad"><i class="fa fa-plus" aria-hidden="true"></i> Add New</button></a>
                   </div>
                 </div>

                 <div>&nbsp;</div>

                <table class="table table-condensed">
                     @if (count($patient_enq_data) > 0)
                        @foreach($patient_enq_data as $key=>$val)
                      <tr bgcolor="{{ $val['total']>1?'#E6E6FA':'' }}">
                       <!-- <td><b>{{ $val['first_name'].' '.$val['last_name'] }}</b></td> -->
                      
                       <td>
                         <a href="{!!URL::to('/my-enquiry-details',$val['id'])!!}" data-toggle="tooltip" data-original-title="View">
                        Swaasthya Bandhav <b>{{ $val['total']>1?'('.$val['total'].')':'' }}</b>
                         </a>
                      </td>
                        <td>
                          <a href="{!!URL::to('/my-enquiry-details',$val['id'])!!}" data-toggle="tooltip" data-original-title="View">
                            {!! \Illuminate\Support\Str::words($val['subject'], 10,'....')  !!}
                          </a>
                        </td>
                        <!-- <td align="right">
                          <div class="chatarea">
                              <a href="javascript:void(0)" onclick="showhide()"><i class="fa fa-commenting" aria-hidden="true"></i></a>
                                <div id="newpost" class="chatbox" style="display:none;">
                                  <textarea class="Cinput" rows="3"></textarea>
                                  <button type="button" class="buttonchat">SEND</button>
                                </div>
                          </div>
                        </td> -->
                        <td align="right">
                         <a href="{!!URL::to('/my-enquiry-details',$val['id'])!!}" data-toggle="tooltip" data-original-title="View">
                          {{ date("d F Y",strtotime($val['created_at'])) }} at {{ date("g:ha",strtotime($val['created_at'])) }}</td>
                         </a>
                      </tr>
                       @endforeach
                      @endif
                </table>
            </div>

    </div>
</div>
@stop