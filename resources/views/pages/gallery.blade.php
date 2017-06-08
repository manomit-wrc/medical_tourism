@extends('layouts.gallery_layout')
@section('title', 'Enquiry')
@section('content')



    <div class="container-fluid inner tp60 bp0">
          
      <!-- <div id="js-inline-filter" class="cbp-filter-container text-center">
        <div data-filter="*" class="cbp-filter-item-active cbp-filter-item"><span>All</span></div>
        <div data-filter=".nature" class="cbp-filter-item"><span>Nature</span></div>
        <div data-filter=".conceptual" class="cbp-filter-item"><span>Conceptual</span></div>
        <div data-filter=".food-drink" class="cbp-filter-item"><span>Food & Drink</span></div>
        <div data-filter=".portrait" class="cbp-filter-item"><span>Portrait</span></div>
      </div> -->
      <div class="clearfix"></div>
      <div class="divide25"></div>
      <div id="js-grid-inline" class="cbp cbp-l-grid-inline">
        
        <div class="cbp-item conceptual food-drink"> <a href="javascript:void(0);" onclick="gallerysearch();" class="cbp-caption cbp-singlePageInline">
          <div class="cbp-caption-defaultWrap"> <img src="{!!URL::to('storage/frontend/images/gallery/m1.jpg')!!}" alt=""> </div>
          <div class="cbp-caption-activeWrap">
            <div class="cbp-l-caption-alignCenter">
              <div class="cbp-l-caption-body">
                <div class="cbp-l-caption-title">Coffee Time</div>
              </div>
            </div>
          </div>
          </a> </div>
        <div class="cbp-item nature portrait"> <a href="post1.html" class="cbp-caption cbp-singlePageInline">
          <div class="cbp-caption-defaultWrap"> <img src="{!!URL::to('storage/frontend/images/gallery/m2.jpg')!!}" alt=""> </div>
          <div class="cbp-caption-activeWrap">
            <div class="cbp-l-caption-alignCenter">
              <div class="cbp-l-caption-body">
                <div class="cbp-l-caption-title">Transportation</div>
              </div>
            </div>
          </div>
          </a> </div>
        <div class="cbp-item nature portrait"> <a href="post1.html" class="cbp-caption cbp-singlePageInline">
          <div class="cbp-caption-defaultWrap"> <img src="{!!URL::to('storage/frontend/images/gallery/m3.jpg')!!}" alt=""> </div>
          <div class="cbp-caption-activeWrap">
            <div class="cbp-l-caption-alignCenter">
              <div class="cbp-l-caption-body">
                <div class="cbp-l-caption-title">Colorful Objects</div>
              </div>
            </div>
          </div>
          </a> </div>
        <div class="cbp-item portrait food-drink"> <a href="post1.html" class="cbp-caption cbp-singlePageInline">
          <div class="cbp-caption-defaultWrap"> <img src="{!!URL::to('storage/frontend/images/gallery/m4.jpg')!!}" alt=""> </div>
          <div class="cbp-caption-activeWrap">
            <div class="cbp-l-caption-alignCenter">
              <div class="cbp-l-caption-body">
                <div class="cbp-l-caption-title">Clever & Creative</div>
              </div>
            </div>
          </div>
          </a> </div>
        <div class="cbp-item conceptual nature"> <a href="post1.html" class="cbp-caption cbp-singlePageInline">
          <div class="cbp-caption-defaultWrap"> <img src="{!!URL::to('storage/frontend/images/gallery/m5.jpg')!!}" alt=""> </div>
          <div class="cbp-caption-activeWrap">
            <div class="cbp-l-caption-alignCenter">
              <div class="cbp-l-caption-body">
                <div class="cbp-l-caption-title">Old Suitcases</div>
              </div>
            </div>
          </div>
          </a> </div>
        <div class="cbp-item nature portrait"> <a href="post1.html" class="cbp-caption cbp-singlePageInline">
          <div class="cbp-caption-defaultWrap"> <img src="{!!URL::to('storage/frontend/images/gallery/m6.jpg')!!}" alt=""> </div>
          <div class="cbp-caption-activeWrap">
            <div class="cbp-l-caption-alignCenter">
              <div class="cbp-l-caption-body">
                <div class="cbp-l-caption-title">Pretty Tulips</div>
              </div>
            </div>
          </div>
          </a> </div>
        <div class="cbp-item conceptual food-drink"> <a href="post1.html" class="cbp-caption cbp-singlePageInline">
          <div class="cbp-caption-defaultWrap"> <img src="{!!URL::to('storage/frontend/images/gallery/m7.jpg')!!}" alt=""> </div>
          <div class="cbp-caption-activeWrap">
            <div class="cbp-l-caption-alignCenter">
              <div class="cbp-l-caption-body">
                <div class="cbp-l-caption-title">Happy Workshop</div>
              </div>
            </div>
          </div>
          </a> </div>
        <div class="cbp-item nature portrait"> <a href="post1.html" class="cbp-caption cbp-singlePageInline">
          <div class="cbp-caption-defaultWrap"> <img src="{!!URL::to('storage/frontend/images/gallery/m8.jpg')!!}" alt=""> </div>
          <div class="cbp-caption-activeWrap">
            <div class="cbp-l-caption-alignCenter">
              <div class="cbp-l-caption-body">
                <div class="cbp-l-caption-title">People & Portaits</div>
              </div>
            </div>
          </div>
          </a> </div>
        <div class="cbp-item nature portrait"> <a href="post1.html" class="cbp-caption cbp-singlePageInline">
          <div class="cbp-caption-defaultWrap"> <img src="{!!URL::to('storage/frontend/images/gallery/m9.jpg')!!}" alt=""> </div>
          <div class="cbp-caption-activeWrap">
            <div class="cbp-l-caption-alignCenter">
              <div class="cbp-l-caption-body">
                <div class="cbp-l-caption-title">Macro Shots</div>
              </div>
            </div>
          </div>
          </a> </div>
        <div class="cbp-item motion graphic"> <a href="post1.html" class="cbp-caption cbp-singlePageInline">
          <div class="cbp-caption-defaultWrap"> <img src="{!!URL::to('storage/frontend/images/gallery/m10.jpg')!!}" alt=""> </div>
          <div class="cbp-caption-activeWrap">
            <div class="cbp-l-caption-alignCenter">
              <div class="cbp-l-caption-body">
                <div class="cbp-l-caption-title">Stray Cats</div>
              </div>
            </div>
          </div>
          </a> </div>
        <div class="cbp-item web-design print"> <a href="post1.html" class="cbp-caption cbp-singlePageInline">
          <div class="cbp-caption-defaultWrap"> <img src="{!!URL::to('storage/frontend/images/gallery/m11.jpg')!!}" alt=""> </div>
          <div class="cbp-caption-activeWrap">
            <div class="cbp-l-caption-alignCenter">
              <div class="cbp-l-caption-body">
                <div class="cbp-l-caption-title">Spectacular Fireworks</div>
              </div>
            </div>
          </div>
          </a> </div>
        <div class="cbp-item print motion"> <a href="post1.html" class="cbp-caption cbp-singlePageInline">
          <div class="cbp-caption-defaultWrap"> <img src="{!!URL::to('storage/frontend/images/gallery/m12.jpg')!!}" alt=""> </div>
          <div class="cbp-caption-activeWrap">
            <div class="cbp-l-caption-alignCenter">
              <div class="cbp-l-caption-body">
                <div class="cbp-l-caption-title">Delicious Sweets</div>
              </div>
            </div>
          </div>
          </a> </div>
        <div class="cbp-item motion graphic"> <a href="post1.html" class="cbp-caption cbp-singlePageInline">
          <div class="cbp-caption-defaultWrap"> <img src="{!!URL::to('storage/frontend/images/gallery/m13.jpg')!!}" alt=""> </div>
          <div class="cbp-caption-activeWrap">
            <div class="cbp-l-caption-alignCenter">
              <div class="cbp-l-caption-body">
                <div class="cbp-l-caption-title">Pretty Cupcakes</div>
              </div>
            </div>
          </div>
          </a> </div>
        <div class="cbp-item web-design print"> <a href="post1.html" class="cbp-caption cbp-singlePageInline">
          <div class="cbp-caption-defaultWrap"> <img src="{!!URL::to('storage/frontend/images/gallery/m14.jpg')!!}" alt=""> </div>
          <div class="cbp-caption-activeWrap">
            <div class="cbp-l-caption-alignCenter">
              <div class="cbp-l-caption-body">
                <div class="cbp-l-caption-title">Wonderful Bikes</div>
              </div>
            </div>
          </div>
          </a> </div>
        <div class="cbp-item print motion"> <a href="post1.html" class="cbp-caption cbp-singlePageInline">
          <div class="cbp-caption-defaultWrap"> <img src="{!!URL::to('storage/frontend/images/gallery/m15.jpg')!!}" alt=""> </div>
          <div class="cbp-caption-activeWrap">
            <div class="cbp-l-caption-alignCenter">
              <div class="cbp-l-caption-body">
                <div class="cbp-l-caption-title">Street Life</div>
              </div>
            </div>
          </div>
          </a> </div>
        <div class="cbp-item motion graphic"> <a href="post1.html" class="cbp-caption cbp-singlePageInline">
          <div class="cbp-caption-defaultWrap"> <img src="{!!URL::to('storage/frontend/images/gallery/m16.jpg')!!}" alt=""> </div>
          <div class="cbp-caption-activeWrap">
            <div class="cbp-l-caption-alignCenter">
              <div class="cbp-l-caption-body">
                <div class="cbp-l-caption-title">Urban Shots</div>
              </div>
            </div>
          </div>
          </a> </div>
        <div class="cbp-item web-design print"> <a href="post1.html" class="cbp-caption cbp-singlePageInline">
          <div class="cbp-caption-defaultWrap"> <img src="{!!URL::to('storage/frontend/images/gallery/m17.jpg')!!}" alt=""> </div>
          <div class="cbp-caption-activeWrap">
            <div class="cbp-l-caption-alignCenter">
              <div class="cbp-l-caption-body">
                <div class="cbp-l-caption-title">Colorful Umbrellas</div>
              </div>
            </div>
          </div>
          </a> </div>
        <div class="cbp-item print motion"> <a href="post1.html" class="cbp-caption cbp-singlePageInline">
          <div class="cbp-caption-defaultWrap"> <img src="{!!URL::to('storage/frontend/images/gallery/m18.jpg')!!}" alt=""> </div>
          <div class="cbp-caption-activeWrap">
            <div class="cbp-l-caption-alignCenter">
              <div class="cbp-l-caption-body">
                <div class="cbp-l-caption-title">The Contrast</div>
              </div>
            </div>
          </div>
          </a> </div>
        <div class="cbp-item motion graphic"> <a href="post1.html" class="cbp-caption cbp-singlePageInline">
          <div class="cbp-caption-defaultWrap"> <img src="{!!URL::to('storage/frontend/images/gallery/m19.jpg')!!}" alt=""> </div>
          <div class="cbp-caption-activeWrap">
            <div class="cbp-l-caption-alignCenter">
              <div class="cbp-l-caption-body">
                <div class="cbp-l-caption-title">Tiny Mushrooms</div>
              </div>
            </div>
          </div>
          </a> </div>
        <div class="cbp-item web-design print"> <a href="post1.html" class="cbp-caption cbp-singlePageInline">
          <div class="cbp-caption-defaultWrap"> <img src="{!!URL::to('storage/frontend/images/gallery/m20.jpg')!!}" alt=""> </div>
          <div class="cbp-caption-activeWrap">
            <div class="cbp-l-caption-alignCenter">
              <div class="cbp-l-caption-body">
                <div class="cbp-l-caption-title">Smiling Faces</div>
              </div>
            </div>
          </div>
          </a> </div>
      </div>
      <!-- /.cbp -->
      
      <div class="divide15"></div>
    </div>
    <!-- /.container-fluid --> 

    <script>

function gallerysearch(){
  var val = $("#searchname").val();
     $.ajax({
        type:"POST",
        url: "/gallerysearch",
        data: {            
          _token: "{{csrf_token()}}"
        },
          success:function(response) { //alert(response);
            $(".cbp-popup-content").html(response);                        
          }
      });
}
</script>





          
@stop