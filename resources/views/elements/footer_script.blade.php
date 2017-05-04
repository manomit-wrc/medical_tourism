    {!!Html::script("storage/frontend/js/jquery.min.js")!!}
    {!!Html::script("storage/frontend/js/bootstrap.min.js")!!}
    {!!Html::script("storage/frontend/js/jquery.jcarousel.min.js")!!}
    {!!Html::script("storage/frontend/js/jcarousel.responsive.js")!!}
    {!!Html::script("storage/frontend/js/owl.carousel.min.js")!!}
 
    <script type="text/javascript">
      $(document).ready(function(){
          $("#testimonial-slider").owlCarousel({
              items:1,
              itemsDesktop:[1000,1],
              itemsDesktopSmall:[979,1],
              itemsTablet:[768,1],
              pagination:true,
              //navigation:true,
              //navigationText:["<",">"],
              slideSpeed:1000,
              singleItem:true,
              autoPlay:true
          });
            
            /*Slider video start*/
           
           $(".youtubeModalclass").click(function () {
                var youtubeid =$(this).attr('data-id');
                var url='//www.youtube.com/embed/'+youtubeid;
               // alert(url);

                /* Assign empty url value to the iframe src attribute when modal hide, which stop the video playing */
                $("#VideoModal").on('hide.bs.modal', function(){
                   $("#iframeVideo").attr('src', '');
                });
                
                /* Assign the initially stored url back to the iframe src attribute when modal is displayed again */
                $("#VideoModal").on('show.bs.modal', function(){
                    $("#iframeVideo").attr('src', url);
                });

            });
          
            /*Slider video end*/
      });
    </script>
