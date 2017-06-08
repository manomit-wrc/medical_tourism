<!DOCTYPE html>
<html lang="en">
	@include('elements.head')
  	<body>
    	@include('elements.header')
    	@include('elements.headernav')
      @include('elements.innersubheader')
      <div class="container-fluid">
        <div class="row">
            <div class="category">
                
                      
                      @if(Request::segment(1) != 'search-data')
                        @if(Request::segment(1) == 'doctordetail')
                            @include('elements.leftpaneldoctor')
                        @elseif(Request::segment(1) != 'profile' && Request::segment(1) != 'upload-documents' && Request::segment(1) != 'change-password' && Request::segment(1) != 'activate'  && Request::segment(1) != 'my-enquiry' && Request::segment(1) != 'enquiry' && Request::segment(1) != 'gallery')
                            @include('elements.leftpanel')
                        @elseif(Request::segment(1) != 'enquiry' && Request::segment(1) != 'gallery')
                            @include('elements.leftpanelpatient')    
                        @endif
                      @endif

      	              @yield('content')
                
            </div>
        </div>
      </div>
    	@include('elements.footer')
      @include('elements.footer_script')
  	</body>
</html>
