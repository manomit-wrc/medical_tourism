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
          }
          else {
              div.style.display = "block";
          }
           }
        </script>

        


            <div class="table-responsive">
                <table class="table table-condensed">
                  <tr>
                    <td><b>Swaasthya Bandhav</b></td>
                    <td>Test reports</td>
                    <td align="right">
                      <div class="chatarea">
                          <a href="javascript:void(0)" onclick="showhide()"><i class="fa fa-commenting" aria-hidden="true"></i></a>
                            <div id="newpost" class="chatbox" style="display:none;">
                              <textarea class="Cinput" rows="3"></textarea>
                              <button type="button" class="buttonchat">SEND</button>
                            </div>
                      </div>
                    </td>
                    <td align="right">Jul 4</td>
                  </tr>

                  <tr>
                    <td><b>Swaasthya Bandhav</b></td>
                    <td>Test reports</td>
                    <td align="right">
                      <div class="chatarea">
                          <a href="javascript:void(0)" onclick="showhide()"><i class="fa fa-commenting" aria-hidden="true"></i></a>
                            <div id="newpost" class="chatbox" style="display:none;">
                              <textarea class="Cinput" rows="3"></textarea>
                              <button type="button" class="buttonchat">SEND</button>
                            </div>
                      </div>
                    </td>
                    <td align="right">Jul 4</td>
                  </tr>

                  <tr>
                    <td><b>Swaasthya Bandhav</b></td>
                    <td>Test reports</td>
                    <td align="right">
                      <div class="chatarea">
                          <a href="javascript:void(0)" onclick="showhide()"><i class="fa fa-commenting" aria-hidden="true"></i></a>
                            <div id="newpost" class="chatbox" style="display:none;">
                              <textarea class="Cinput" rows="3"></textarea>
                              <button type="button" class="buttonchat">SEND</button>
                            </div>
                      </div>
                    </td>
                    <td align="right">Jul 4</td>
                  </tr>

                  <tr>
                    <td>Swaasthya Bandhav</td>
                    <td>Test reports</td>
                    <td align="right">
                      <div class="chatarea">
                          <a href="javascript:void(0)" onclick="showhide()"><i class="fa fa-commenting" aria-hidden="true"></i></a>
                            <div id="newpost" class="chatbox" style="display:none;">
                              <textarea class="Cinput" rows="3"></textarea>
                              <button type="button" class="buttonchat">SEND</button>
                            </div>
                      </div>
                    </td>
                    <td align="right">Jul 4</td>
                  </tr>
                  
                  
                </table>
            </div>

    </div>
</div>
@stop