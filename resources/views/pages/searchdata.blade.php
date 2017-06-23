@extends('layouts.inner_layout')
@section('title', 'Hospitals')
@section('content')
<div class="col-md-8">   
    <div class="mapbg" id="searmap"><?php // "<pre>"; print_r($locations); die; ?>
       <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d471219.7256039201!2d88.36825265!3d22.6759958!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1496723901569" width="100%" height="600" frameborder="0" style="border:0" "allowfullscreen"></iframe> -->
       <div id="hospitallistingmap" style="width:100%;height:600px;"></div>
       <script type="text/javascript">
    jQuery(function($) {
        <!-- Asynchronously Load the map API  -->
        var script = document.createElement('script');
        script.src = "http://maps.googleapis.com/maps/api/js?key=AIzaSyB4eCXS81oEuOHH9BJ_vOVvqQL1qY90kIA&sensor=false&callback=initialize";
        document.body.appendChild(script);
    });
	//var image = 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png';
	
    function initialize() {
        var map;
        var bounds = new google.maps.LatLngBounds();
        var mapOptions = {
            mapTypeId: 'roadmap'
        };
                        
        <!-- Display a map on the page -->
        map = new google.maps.Map(document.getElementById("hospitallistingmap"), mapOptions);
        map.setTilt(45);
          
        var locations = <?php print_r(json_encode($locations)) ?>;
        <!-- Multiple Markers -->
        var markers = [];  
         $.each(locations, function( index, value ){
           markers.push([value.city, value.lat,value.longi,value.ord]);
         });
        <!-- Multiple Markers -->
        /*var markers = [
            ['Coogee Beach', -33.923036, 151.259052, 5],
            ['Cronulla Beach', -34.028249, 151.157507, 3],
            ['Manly Beach', -33.80010128657071, 151.28747820854187, 2],
            ['Maroubra Beach', -33.950198, 151.259302, 1]
        ];*/
                           
        <!-- Info Window Content -->
        var infoWindowContent = [];  
         $.each(locations, function( index, value ){
           infoWindowContent.push(['<div class="info_content">' +
            '<h3>'+value.city+'</h3>' +
            '</div>']);
         });
        /*var infoWindowContent = [
            ['<div class="info_content">' +
            '<h3>Bondi Beach</h3>' +
            '</div>'],
            ['<div class="info_content">' +
            '<h3>Coogee Beach</h3>' +
            '</div>'],
            ['<div class="info_content">' +
            '<h3>Cronulla Beach</h3>' +
            '</div>'],
            ['<div class="info_content">' +
            '<h3>Manly Beach</h3>' +
            '</div>'],
            ['<div class="info_content">' +
            '<h3>Maroubra Beach</h3>' +
            '</div>']
        ];*/
            
        <!-- Display multiple markers on a map -->
        var infoWindow = new google.maps.InfoWindow(), marker, i;
        
        <!-- Loop through our array of markers & place each one on the map   -->
        for( i = 0; i < markers.length; i++ ) {
            var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
            bounds.extend(position);
            marker = new google.maps.Marker({
                position: position,
                map: map,
				        icon: map,				
                title: markers[i][0]
            });
            
            <!-- Allow each marker to have an info window     -->
            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                    infoWindow.setContent(infoWindowContent[i][0]);
                    infoWindow.open(map, marker);
                }
            })(marker, i));
            <!-- Automatically center the map fitting all markers on the screen -->
            map.fitBounds(bounds);
        }
        <!-- Override our map zoom level once our fitBounds function runs (Make sure it only runs once) -->
        var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
            this.setZoom(3);
            google.maps.event.removeListener(boundsListener);
        });
        
    }

  </script>
    </div>  
</div>

<div class="col-md-4">
    <div class="filtersearch">
        <input type="text" name="searchname" id="searchname" placeholder="Search" >
        <button type="button" onclick="getsearchval(); getsearchvalmap();"></button>
    </div>   


    <div id="vertical-scrollbar-demo" class="gray-skin demo"> 
	@if (count($search_data) > 0)
            @foreach($search_data as $searchval)

    <div class="filterbox">
    <a href="{!!URL::to('/searchdetails/'.$searchval->id)!!}">
      <img src="{{url('/uploads/hospitals/thumb/'.$searchval->avators)}}" alt="{{ $searchval->name }}">
      <h3>{{ $searchval->name }}</h3></a>
      <h4>{{ $searchval->country->name }}, {{ $searchval->state->name }}, {{ $searchval->city->name }}</h4>
    </div>

	@endforeach
	@endif
    </div>

<script type="text/javascript">
    $(window).load(function () {
        $(".demo").customScrollbar();
        $("#fixed-thumb-size-demo").customScrollbar({fixedThumbHeight: 50, fixedThumbWidth: 60});
    });
</script>

<script>
function getsearchval(){
  var val = $("#searchname").val();
     $.ajax({
        type:"POST",
        url: "/hospitalsearch-res",
        data: {
          search_val: val,          
          txt_search: "{{ $_GET['txt_search'] }}",
          select_treatment: "{{ $_GET['select_treatment'] }}",
          select_procedure: "{{ $_GET['select_procedure'] }}",                    
          _token: "{{csrf_token()}}"
        },
          success:function(response) {
            $("#vertical-scrollbar-demo").html(response);                        
          }
      });
}
function getsearchvalmap(){
  var val = $("#searchname").val();
     $.ajax({
        type:"POST",
        url: "/hospitalsearch-resmap",
        data: {
          search_val: val,          
          select_treatment: "{{ $_GET['select_treatment'] }}",
          select_procedure: "{{ $_GET['select_procedure'] }}",
          txt_search: "{{ $_GET['txt_search'] }}",                     
          _token: "{{csrf_token()}}"
        },
          success:function(response) {
            $("#searmap").html(response);                        
          }
      });
}
</script>
</div>
@stop