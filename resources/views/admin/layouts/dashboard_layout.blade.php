<!DOCTYPE html>
<html>
	@include('element.head')
  	<body class="hold-transition skin-blue sidebar-mini">
  	   <div class="wrapper">
    	@include('element.header')
    	@include('element.leftpanel')
    	@yield('content')
    	@include('element.footer')
      @include('element.footer_script')
  	</body>
</html>
