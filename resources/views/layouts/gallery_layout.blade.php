<!DOCTYPE html>
<html lang="en">
	@include('elements.head')
  	<body>
      <!--On  Page load default Loader include section start here -->
         <div class="se-pre-con"></div>
      <!-- Ends -->
    	@include('elements.header')
    	@include('elements.headernav')
      <div class="container-fluid">
        <div class="row">
            <div class="category">
      	              @yield('content')
            </div>
        </div>
      </div>
    	@include('elements.footer')
      @include('elements.footer_script')
  	</body>
</html>
