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
var geocoder = google.maps.Geocoder();
geocoder
}
google.maps.event.addDomListener(window, 'load', initialize); 
});