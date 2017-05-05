<div class="container-fluid">
    <div class="row">
        <div class="headerbottom">
            <div class="container">
                <div class="row">
                  <div class="fieldbox">
                    <select name="" class="listtype">
                        <option value="Specility">Specility</option>
                        <option value="Specility">Specility</option>
                        <option value="Specility">Specility</option>
                    </select>
                  </div>

                  <div class="fieldbox">
                    <select name="" class="listtype">
                        <option value="Procedure">Procedure</option>
                        <option value="Procedure">Procedure</option>
                        <option value="Procedure">Procedure</option>
                    </select>
                  </div>

                  <div class="fieldbox">
                    <select name="" class="listtype">
                        <option value="Location">Location</option>
                        <option value="Location">Location</option>
                        <option value="Location">Location</option>
                    </select>
                  </div>

                  <div class="fieldbox">
                    <select name="" class="listtype">
                        <option value="Language">Language</option>
                        <option value="Language">Language</option>
                        <option value="Language">Language</option>
                    </select>
                  </div>
                  
                  <div class="fieldsearch">
                  <button type="button"><i class="fa fa-search" aria-hidden="true"></i> SEARCH</button>
                  </div>
                </div>
            </div>
        </div>
    </div>
  </div>

<!--/////////////////////////////////Medical Category section start///////////////////////////////////////-->
  <div class="container-fluid">
      <div class="row">
          <div class="category">
              <div class="container">
                  <div class="row">
                      <div class="col-md-12">
                          <h2>Medical <strong>category</strong></h2>
                          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the 
industry's standard dummy text</p>
                  
                          <div class="jcarousel-wrapper">
                            <div class="jcarousel">
                                <ul>
                                    @if(count($procedure_lists) > 0)
                                      @foreach($procedure_lists as $procedure_lists)
                                        <li><img src="{{url('/uploads/procedures/thumb/'.$procedure_lists->procedure_image)}}"  alt="Image 1"><h3>{{ $procedure_lists->name }}</h3></li>
                                      @endforeach
                                    @endif
                                </ul>
                            </div>
                            <p class="jcarousel-pagination"></p>
                        </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!--/////////////////////////////////Medical Category section end///////////////////////////////////////-->

  <!--/////////////////////////////////Medical Facility section start///////////////////////////////////////-->
   <div class="container-fluid">
      <div class="row">
          <div class="medicalF">
              <div class="container">
                  <div class="row">
                      <div class="col-md-12">
                       <h2>Medical <strong>facility</strong></h2>

                       <div class="jcarousel-wrapper">
                            <div class="jcarousel">
                                <ul>
                                  @if(count($medicalfacility_lists) > 0)
                                    @foreach($medicalfacility_lists as $medicalfacility_lists)
                                    <li><img src="{{url('/uploads/medicalfacilities/thumb_243_149/'.$medicalfacility_lists->facility_image)}}"  alt="{{ $medicalfacility_lists->name }}">
                                        <h3>{{ $medicalfacility_lists->name }}</h3>
                                        <p>{!! \Illuminate\Support\Str::words($medicalfacility_lists->description, 10,'....')  !!}</p>
                                    </li>
                                    @endforeach
                                  @endif
                                </ul>
                            </div>
                            <a href="#" class="jcarousel-control-prev"><img src="{!!URL::to('storage/frontend/images/mal.png')!!}"  alt="Image 1"></a>
                            <a href="#" class="jcarousel-control-next"><img src="{!!URL::to('storage/frontend/images/mar.png')!!}"  alt="Image 1"></a>

                            <p class="jcarousel-pagination pagimob"></p>
                        </div>

                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!--/////////////////////////////////Medical Facility section end///////////////////////////////////////-->


  <div class="container">
      <div class="row">
          <div class="accomodation">
            <div class="col-md-12">
                <h2>accomodation</h2>
            </div>

            <div class="col-md-4">
                <div class="accdbox">
                    <img src="{!!URL::to('storage/frontend/images/acc1.jpg')!!}"  alt="Image 1">
                    <h3>Connectivity to India</h3>
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="accdbox">
                    <img src="{!!URL::to('storage/frontend/images/acc2.jpg')!!}"  alt="Image 1">
                    <h3>Connectivity to India</h3>
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="accdbox">
                     <img src="{!!URL::to('storage/frontend/images/acc3.jpg')!!}"  alt="Image 1">
                    <h3>Connectivity to India</h3>
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                </div>
            </div>
            <br clear="all">
            <div class="col-md-2 col-md-offset-5">
              <a href="#" class="viewmore">VIEW MORE</a>
            </div>
            </div>
          </div>
  </div>