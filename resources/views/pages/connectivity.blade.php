@extends('layouts.inner_layout')
@section('title', 'Connectivity')
@section('content')
<div class="col-md-8">
      <div class="rightP">
          <h3>Connectivity to <b>India</b></h3>
          
          <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                  <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      Afghanistan
                    </a>
                  </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                  <div class="panel-body">
                   

                      <h4>Major Airlines operating on this route:</h4>
                        <ul>
                            <li>Safi Airways</li>
                            <li>Air India</li>
                            <li>Kam Air</li>
                            <li>Spice Jet</li>
                        </ul>

                      <h4>Major Airports in India where flights land:</h4>
                        <ul>
                            <li>Delhi – Indira Gandhi International Airport</li>
                        </ul>

                      <h4>Average Cost of Flights from Afghanistan to India</h4>
                        <ul>
                            <li>9,000- 14,000 INR (Economy Class per adult - one way)</li>
                        </ul>

                      Alternative Modes of Transport

                          None


                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingTwo">
                  <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      Bangladesh
                    </a>
                  </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                  <div class="panel-body">
                      <h4>Major Airlines operating on this route:</h4>
                      <ul>
                          <li>Air India<li>
                          <li>Jet Airways</li>
                          <li>Biman Bangladesh Airlines</li>
                      </ul>

                      <h4>Major Airports in India where flights land:</h4>
                      <ul>
                          <li>Delhi – Indira Gandhi International Airport</li>
                          <li>Mumbai - Chhatrapati Shivaji International Airport</li>
                          <li>Kolkata – Netaji Subhash Chandra Bose International Airport</li>
                      </ul>

                      <h4>Average Cost of Flights from Bangladesh to India</h4>
                      <ul>
                          <li>8,000-12,000 INR (Economy Class per adult - one way)</li>
                      </ul>

                      <h4>Alternative Modes of Transport</h4>
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingThree">
                  <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                      Germany
                    </a>
                  </h4>
                </div>
                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                  <div class="panel-body">                                       

                      <h4>Major Airlines operating on this route:</h4>
                      <ul>
                          <li>Air India</li>
                          <li>Lufthansa</li>
                      </ul>

                      <h4>Major Airports in India where flights land:</h4>
                      <ul>
                          <li>Bengaluru - Kempegowda International Airport</li>
                          <li>Delhi – Indira Gandhi International Airport</li>
                          <li>Mumbai - Chhatrapati Shivaji International Airport</li>
                          <li>Chennai - Chennai International Airport</li>
                      </ul>

                      <h4>Average Cost of Flights from Germany to India</h4>
                      <ul>
                          <li>32,000-40,000 INR (Economy Class per adult - one way)</li>
                      </ul>

                      <h4>Alternative Modes of Transport</h4>
                      <ul>
                          <li>None</li>
                      </ul>


                  </div>
                </div>
              </div>
          </div>

      </div>
  </div>

@stop