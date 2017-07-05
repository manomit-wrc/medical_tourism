<!DOCTYPE html>
<html lang="en">
	@include('elements.head')
  	<body>
       <!--On  Page load default Loader include section start here -->
         <div class="se-pre-con"></div>
      <!-- Ends -->
    	@include('elements.header')
    	@include('elements.headernav')
      @include('elements.innersubheader')
      <div class="container-fluid">
        <div class="row">
            <div class="category">
                <div class="container">
                    <div class="row">
                      
                      @if(Request::segment(1) != 'search-data')
                        @if(Request::segment(1) == 'doctordetail')
                            @include('elements.leftpaneldoctor')
<<<<<<< HEAD
                        @elseif(Request::segment(1) != 'profile' && Request::segment(1) != 'upload-documents' && Request::segment(1) != 'change-password' && Request::segment(1) != 'activate'  && Request::segment(1) != 'my-enquiry'  && Request::segment(1) != 'my-enquiry-details' && Request::segment(1) != 'enquirysend' && Request::segment(1) != 'enquiry'  && Request::segment(1) != 'suggestion' && Request::segment(1) != 'gallery')
=======
                        @elseif(Request::segment(1) != 'profile' && Request::segment(1) != 'upload-documents' && Request::segment(1) != 'change-password' && Request::segment(1) != 'activate'  && Request::segment(1) != 'my-enquiry' && Request::segment(1) != 'enquirysend' && Request::segment(1) != 'my-enquiry-details' && Request::segment(1) != 'enquiry'  && Request::segment(1) != 'suggestion' && Request::segment(1) != 'gallery')
>>>>>>> 8a6577ba42120de03821a389be4cb9e4d9952bd4
                            @include('elements.leftpanel')
                        @elseif(Request::segment(1) != 'enquiry' && Request::segment(1) != 'gallery' && Request::segment(1) != 'suggestion' && Request::segment(1) != 'activate')
                            @include('elements.leftpanelpatient')    
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
