<!DOCTYPE html>
<html>
  <head>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCBKCBxM6X5I1L5jsU8J4MlnvXImTbr8o4&sensor=false"></script>
    <style>
    html, body, #map_canvas{width:100%;height:100%;}
    </style>
  </head>
  <body onload="locate()">
    <div id="map_canvas"></div>
  </body>
  <script>
    function locate(){
        navigator.geolocation.getCurrentPosition(initialize,fail);
    }

    function initialize(position) {
        var myLatLng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
         var rll = new google.maps.LatLng(41.542461367944,-8.4010434150696);
        var mapOptions = {
                center: new google.maps.LatLng(41.542461367944,-8.4010434150696),
                zoom: 10,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            }
        var map = new google.maps.Map(document.getElementById('map_canvas'),
                                      mapOptions);
        var userMarker = new google.maps.Marker({
            position: myLatLng,
            map: map,
        });
        var rMarker = new google.maps.Marker({
            position: rll,
            map: map,
        });
      }

     function fail(){
         alert('navigator.geolocation failed, may not be supported');
     }
    </script>
</html>