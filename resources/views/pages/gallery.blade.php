@extends('layouts.gallery_layout')
@section('title', 'Gallery')
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
        
      @if (count($albums) > 0)
        @foreach($albums as $album)
        <div class="cbp-item conceptual food-drink"> <a href="javascript:void(0);" onclick="gallerysearch({{ $album->id }});" class="cbp-caption cbp-singlePageInline">
          <div class="cbp-caption-defaultWrap"> <img src="{{url('/uploads/albums/'.$album->cover_image)}}" alt="{{ $album->name }}"> </div>
          <div class="cbp-caption-activeWrap">
            <div class="cbp-l-caption-alignCenter">
              <div class="cbp-l-caption-body">
                <div class="cbp-l-caption-title">{{ $album->name }}</div>
              </div>
            </div>
          </div>
          </a>
        </div>
        @endforeach
      @endif

        

      </div>
      <!-- /.cbp -->
      
      <div class="divide15"></div>
    </div>
    <!-- /.container-fluid --> 

    <script>

function gallerysearch(galid){
  //alert(galid);
  
     $.ajax({
        type:"POST",
        url: "/gallerysearch",
        data: { 
           galid: galid,           
          _token: "{{csrf_token()}}"
        },
          success:function(response) { //alert(response);
            $(".cbp-popup-content").html(response);                        
          }
      });
}
</script>
@stop