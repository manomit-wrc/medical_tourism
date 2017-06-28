<!DOCTYPE html>
<html>
	@include('admin.element.head')
  	<body class="hold-transition skin-blue sidebar-mini">
  		<!--On  Page load default Loader include section start here -->
         <div class="se-pre-con"></div>
       <!-- Ends -->
  	   <div class="wrapper">
    	@include('admin.element.header')
    	@include('admin.element.leftpanel')
    	@yield('content')
    	@include('admin.element.footer')
      @include('admin.element.footer_script')
  	</body>
</html>
