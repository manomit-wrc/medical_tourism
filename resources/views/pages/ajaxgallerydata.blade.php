<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>
        {!! Html::style('storage/frontend/css/gallery/jcarousel.responsive.css') !!}
      
         {!! Html::script("storage/frontend/js/gallery/jquery1.js") !!}
         {!! Html::script("storage/frontend/js/gallery/jquery.jcarousel.min.js") !!}
         {!! Html::script("storage/frontend/js/gallery/jcarousel.responsive.js") !!}
       
  </head>
  <body>
  
    <div class="jcarousel-wrapper">
                <div class="jcarousel">
                    <ul>
                        <li><img src="{!!URL::to('storage/frontend/images/gallery/m20.jpg')!!}" alt="Image 1"></li>
                        <li><img src="{!!URL::to('storage/frontend/images/gallery/m20.jpg')!!}" alt="Image 2"></li>
                        <li><img src="{!!URL::to('storage/frontend/images/gallery/m20.jpg')!!}" alt="Image 3"></li>
                        <li><img src="{!!URL::to('storage/frontend/images/gallery/m20.jpg')!!}" alt="Image 4"></li>
                        <li><img src="{!!URL::to('storage/frontend/images/gallery/m20.jpg')!!}" alt="Image 5"></li>
                        <li><img src="{!!URL::to('storage/frontend/images/gallery/m20.jpg')!!}" alt="Image 6"></li>
                    </ul>
                </div>

                <a href="#" class="jcarousel-control-prev"><img src="{!!URL::to('storage/frontend/images/gallery/cla.png')!!}" alt=""></a>
                <a href="#" class="jcarousel-control-next"><img src="{!!URL::to('storage/frontend/images/gallery/cra.png')!!}" alt=""></a>

    </div>
<!-- /.cbp-inline --> 


  </body>
</html>