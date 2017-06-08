         {!! Html::style('storage/frontend/css/gallery/jcarousel.responsive.css') !!}
         {!! Html::script("storage/frontend/js/gallery/jquery1.js") !!}
         {!! Html::script("storage/frontend/js/gallery/jquery.jcarousel.min.js") !!}
         {!! Html::script("storage/frontend/js/gallery/jcarousel.responsive.js") !!}
   
  
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
                <p class="jcarousel-pagination" data-jcarouselpagination="true"></p>

                <a href="#" class="jcarousel-control-prev"><img src="{!!URL::to('storage/frontend/images/gallery/cla.png')!!}" alt=""></a>
                <a href="#" class="jcarousel-control-next"><img src="{!!URL::to('storage/frontend/images/gallery/cra.png')!!}" alt=""></a>

    </div>
<!-- /.cbp-inline --> 

