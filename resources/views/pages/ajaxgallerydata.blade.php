 {!! Html::style('storage/frontend/css/gallery/jcarousel.responsive.css') !!}
 {!! Html::script("storage/frontend/js/gallery/jquery1.js") !!}
 {!! Html::script("storage/frontend/js/gallery/jquery.jcarousel.min.js") !!}
 {!! Html::script("storage/frontend/js/gallery/jcarousel.responsive.js") !!}
   
  
    <div class="jcarousel-wrapper">
                <div class="jcarousel">
                    <ul>
                        @if (count($album->Photos) > 0)
                            @foreach($album->Photos as $photo)
                              <li><img src="{{url('/uploads/albums/'.$photo->image)}}" alt="{{ $photo->description }}"></li>
                            @endforeach
                        @endif
                    </ul>
                </div>
                <p class="jcarousel-pagination" data-jcarouselpagination="true"></p>

                <a href="#" class="jcarousel-control-prev"><img src="{!!URL::to('storage/frontend/images/gallery/cla.png')!!}" alt=""></a>
                <a href="#" class="jcarousel-control-next"><img src="{!!URL::to('storage/frontend/images/gallery/cra.png')!!}" alt=""></a>

    </div>
<!-- /.cbp-inline --> 

