<!DOCTYPE html>
<html lang="en">
	@include('elements.head')
  	<body>
       <!--On  Page load default Loader include section start here -->
         <div class="se-pre-con"></div>
      <!-- Ends -->
    	@include('elements.header')
    	@include('elements.headernav')
      @include('elements.slider')
    	@include('elements.homesearch')
    	@yield('content')
    	@include('elements.footer')
      @include('elements.footer_script')
  	</body>
</html>

