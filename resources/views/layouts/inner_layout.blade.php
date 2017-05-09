<!DOCTYPE html>
<html lang="en">
	@include('elements.head')
  	<body>
    	@include('elements.header')
    	@include('elements.headernav')
      <div class="container-fluid">
        <div class="row">
            <div class="category">
                <div class="container">
                    <div class="row">
                      @if(Request::segment(1) != 'enquiry' && Request::segment(1) != 'profile' && Request::segment(1) != 'change-password' && Request::segment(1) != 'activate' && Request::segment(1) != 'upload-documents')
                       @include('elements.leftpanel')
                        @if(Request::segment(1) == 'doctordetail')
                          @include('elements.leftpaneldoctor')
                        @endif
                      @endif
      	               @yield('content')
                    </div>
                </div>
            </div>
        </div>
      </div>
    	@include('elements.footer')
      @include('elements.footer_script')
  	</body>
</html>
