
  <div class="container-fluid">
      <div class="row">
          <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
              <!-- Indicators -->
              <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
              </ol>
              <!-- Wrapper for slides -->
              <div class="carousel-inner" role="listbox">
                <div class="item active">
                  <img src="{!!URL::to('storage/frontend/images/slide1.jpg')!!}" class="imageWDTH" alt=""> 
                  <div class="carousel-caption">
                    <div class="banner_text">
                        <h1>Welcome to Swasthya Bandhav</h1>
                        <h2>A Premier Healthcare</h2>
                    </div>
                    <div class="videobx">
                        <div class="play"><a href="#" data-toggle="modal" data-target="#VideoModal"><i class="fa fa-play-circle" aria-hidden="true"></i></a></div>
                        <img src="{!!URL::to('storage/frontend/images/dr1.jpg')!!}" alt="">
                    </div>
                  </div>
                </div>
                <div class="item">
                  <img src="{!!URL::to('storage/frontend/images/slide1.jpg')!!}" class="imageWDTH" alt="">
                  <div class="carousel-caption">
                    <div class="banner_text">
                        <h1>Welcome to Swasthya Bandhav</h1>
                        <h2>A Premier Healthcare</h2>
                    </div>
                    <div class="videobx">
                        <div class="play"><a href="#" data-toggle="modal" data-target="#VideoModal"><i class="fa fa-play-circle" aria-hidden="true"></i></a></div>
                        <img src="{!!URL::to('storage/frontend/images/dr1.jpg')!!}" alt="">
                    </div>
                  </div>
                </div>
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
            <video width="100%" controls>
              <source src="mov_bbb.mp4" type="video/mp4">
              <source src="mov_bbb.ogg" type="video/ogg">
              Your browser does not support HTML5 video.
            </video>
        </div>                  
      </div>
    </div>
  </div>