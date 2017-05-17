
  <div class="container-fluid">
      <div class="row">
          <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
              <!-- Indicators -->
              <ol class="carousel-indicators">
                @if(count($banner_lists) > 0)
                   @for ($j = 0; $j < count($banner_lists); $j++)
                    <li data-target="#carousel-example-generic" data-slide-to="{{ $j }}"></li>
                   @endfor
                @endif  
              </ol>
              <!-- Wrapper for slides -->
              <div class="carousel-inner" role="listbox">
              @if(count($banner_lists) > 0)
                @php
                  $i = 1 ;
                @endphp 
                
                @foreach($banner_lists as $banner_lists)
                
                  @php
                    $active_class = ($i == 1) ? 'active' : '';
                  @endphp 
                  
                  <div class="item {{ $active_class }}">
                    <img src="{{url('/uploads/banners/'.$banner_lists->banner_image)}}" class="imageWDTH" alt=""> 
                    <div class="carousel-caption">
                      <div class="banner_text">
                          <h1>{{ $banner_lists->banner_heading }}</h1>
                          <h2>{{ $banner_lists->banner_sub_heading }}</h2>
                      </div>

                      <div class="videobx">
                          @php
                            $banner_url=$banner_lists->banner_url;
                            preg_match("#([\/|\?|&]vi?[\/|=]|youtu\.be\/|embed\/)(\w+)#", $banner_url, $matches);
                            // var_dump(end($matches));
                          @endphp
                          <div class="play">
                            <a href="#" data-toggle="modal" data-target="#VideoModal"  class="youtubeModalclass" data-id="{{ end($matches) }}" ><i class="fa fa-play-circle" aria-hidden="true"></i></a>
                          </div>
                         
                         <!--  <img src="{!!URL::to('storage/frontend/images/dr1.jpg')!!}" alt=""> -->
                         <img src="http://img.youtube.com/vi/{{ end($matches) }}/0.jpg" alt="">
                      </div>
                    </div>
                  </div>
                  @php
                    $i++;
                  @endphp 

                @endforeach
              @endif
                
              </div>
              <!-- Controls -->
              <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <img src="{!!URL::to('storage/frontend/images/al.png')!!}" alt="">
              </a>
              <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <img src="{!!URL::to('storage/frontend/images/ar.png')!!}" alt="">
              </a>
            </div>
      </div>
  </div>

  <!-- Video Modal -->
  <div class="modal fade" id="VideoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Video</h4>
        </div>
        <div class="modal-body">
             <iframe id="iframeVideo" width="560" height="315" src="" frameborder="0" allowfullscreen></iframe>
        </div>                  
      </div>
    </div>
  </div>