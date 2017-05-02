 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    {!!Html::script("storage/frontend/js/bootstrap.min.js")!!}
    {!!Html::script("storage/frontend/js/jquery.jcarousel.min.js")!!}
    {!!Html::script("storage/frontend/js/jcarousel.responsive.js")!!}
   
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
 
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
