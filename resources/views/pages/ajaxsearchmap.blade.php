<div id="hospitallistingmap1" style="width:100%;height:600px;"></div>
<script type="text/javascript">
    jQuery(function($) {
        <!-- Asynchronously Load the map API  -->
        var script = document.createElement('script');
        script.src = "http://maps.googleapis.com/maps/api/js?key=AIzaSyB4eCXS81oEuOHH9BJ_vOVvqQL1qY90kIA&sensor=false&callback=initialize";
        document.body.appendChild(script);
    });
    function initialize() {
        var map;
        var bounds = new google.maps.LatLngBounds();
        var mapOptions = {
            mapTypeId: 'roadmap'
        };
                        
        <!-- Display a map on the page -->
        map = new google.maps.Map(document.getElementById("hospitallistingmap1"), mapOptions);
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
            this.setZoom(5);
            google.maps.event.removeListener(boundsListener);
        });
        
    }

  </script>