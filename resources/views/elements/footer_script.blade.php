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
      });
    </script>
