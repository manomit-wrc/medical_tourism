@extends('layouts.inner_layout')
@section('title', 'My Enquiry')
@section('content')
<div class="col-md-8">
    <div class="qtbox">
        <h3>My <b>Enquiries</b></h3>
       
        <script>
           function showhide()
           {
                 var div = document.getElementById("newpost");
                  if (div.style.display !== "none") {
                      div.style.display = "none";
                  }else{
                      div.style.display = "block";
                  }
          }
        </script>

        


            <div class="table-responsive">
                 <div class="topbtn">
                      <a href="{{ url('/enquirysend') }}"><button type="button" class="btn bg-purple btn-rightad">Add New</button></a>
                 </div>

                <table class="table table-condensed">
                     @if (count($patient_enq_data) > 0)
                        @foreach($patient_enq_data as $val)
                      <tr>
                       <!--  <td><b>{{ $val->first_name.' '.$val->last_name }}</b></td> -->
                       <td>Swaasthya Bandhav</td>
                        <td>{!! \Illuminate\Support\Str::words($val->subject, 10,'....')  !!}</td>
                        <td align="right">
                          <div class="chatarea">
                              <a href="javascript:void(0)" onclick="showhide()"><i class="fa fa-commenting" aria-hidden="true"></i></a>
                                <div id="newpost" class="chatbox" style="display:none;">
                                  <textarea class="Cinput" rows="3"></textarea>
                                  <button type="button" class="buttonchat">SEND</button>
                                </div>
                          </div>
                        </td>
                        <td align="right">{{ date("d F Y",strtotime($val->created_at)) }} at {{ date("g:ha",strtotime($val->created_at)) }}</td>
                      </tr>
                       @endforeach
                      @endif
                </table>
            </div>

    </div>
</div>
@stop