$(function(e) {
   var map;
function initialize() {
  var mapOptions = {
    zoom: 3,
    center: new google.maps.LatLng(61.52401, 105.318756),
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };
  map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);
      
var markerOptions = {
    position: new google.maps.LatLng(61.52401, 105.318756)
};
var marker = new google.maps.Marker(markerOptions);
marker.setMap(map);
var geocoder = new  google.maps.Geocoder();
geocoder.geocode( {"address": "france"} , function(GeocoderResult, GeocoderStatus){
    //alert(GeocoderResult[0].geometry.bounds);
    if (GeocoderStatus===google.maps.GeocoderStatus.OK)
        map.fitBounds(GeocoderResult[0].geometry.bounds);
});
}
google.maps.event.addDomListener(window, 'load', initialize); 
});