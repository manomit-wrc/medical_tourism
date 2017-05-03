<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Swasthya Bandhav | Log in</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  {!! Html::style('storage/admin/css/bootstrap.min.css') !!}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  {!! Html::style('storage/admin/css/AdminLTE.min.css') !!}
  {!! Html::style('storage/admin/css/blue.css') !!}
  
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  </head>
  <body class="hold-transition login-page">
      <div class="login-box">
          @yield('content')
      </div>
  {!! Html::script('storage/admin/js/jquery-2.2.3.min.js') !!}    
  {!! Html::script('storage/admin/js/bootstrap.min.js') !!}
  {!! Html::script('storage/admin/js/icheck.min.js') !!}
  
  <script>
    $(function () {
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%'
      });
    });
 </script>
  </body>
</html>