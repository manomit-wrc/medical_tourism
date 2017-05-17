    <div class="container-fluid">
        <div class="row">
            <div class="main_nav">
                <div class="container">
                    <div class="row">
                        <nav class="navbar navbar-default">
                            <div class="navbar-header">
                              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                              </button>
                            </div>
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                              <ul class="nav navbar-nav">
                                <li class="{{ Request::segment(1) === '' ? 'active' : null }}"><a href="{!!URL::to('/')!!}">Home</a></li>
                                <li class="{{ Request::segment(1) === 'about' ? 'active' : null }}"><a href="{!!URL::to('/about')!!}">About Swasthya Bandhav</a></li>
                                <li class="{{ Request::segment(1) === 'services' ? 'active' : null }}"><a href="{!!URL::to('/services')!!}">Services</a></li>
                              </ul>                              
                              <ul class="nav navbar-nav navbar-right">
                                <li class="{{ Request::segment(1) === 'enquiry' ? 'active' : null }}"><a href="{!!URL::to('/enquiry')!!}">Enquiry</a></li>
                                <li class="{{ Request::segment(1) === 'facilities' ? 'active' : null }}"><a href="{!!URL::to('/facilities')!!}">facilities</a></li>
                                <li class="{{ Request::segment(1) === 'doctors' || Request::segment(1) === 'doctordetail' ? 'active' : null }}"><a href="{!!URL::to('/doctors')!!}">doctors</a></li>
                                <li class="{{ Request::segment(1) === 'contact' ? 'active' : null }}"><a href="{!!URL::to('/contact')!!}">contact us</a></li>                           
                              </ul>
                            </div>                          
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>