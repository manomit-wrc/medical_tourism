<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Swaasthya Bandhav - @yield('title')</title>

    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Bootstrap -->
    
      {!! Html::style('storage/frontend/css/responsive.css') !!}
      {!! Html::style('storage/frontend/css/bootstrap.min.css') !!}
      {!! Html::style('storage/frontend/css/style.css') !!}

      {!! Html::style('storage/frontend/css/font-awesome.min.css') !!}

      {!! Html::style('storage/frontend/css/owl.carousel.min.css') !!}
      {!! Html::style('storage/frontend/css/owl.theme.min.css') !!}
       
      {!!Html::script("storage/frontend/js/jquery.min.js")!!}  
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    @if(Request::segment(1) == 'gallery')
      {!! Html::style('storage/frontend/css/gallery/plugins.css') !!}
      {!! Html::style('storage/frontend/css/gallery/forest.css') !!}
      {!! Html::style('storage/frontend/css/gallery/type/icons.css') !!}
    @endif
     <script type="text/javascript">
          var base_url = "{!! URL::to('/')!!}";
     </script>
     <link rel="icon" href="{!!URL::to('storage/frontend/images/favicon.ico')!!}" type="image/gif" >
</head>
