$(function(e) {
   var map;
function markAddress(address){
    
var geocoder = new  google.maps.Geocoder();
geocoder.geocode( {"address": address} , function(GeocoderResult, GeocoderStatus){
    //alert(GeocoderResult[0].geometry.bounds);
    if (GeocoderStatus===google.maps.GeocoderStatus.OK){
        map.fitBounds(GeocoderResult[0].geometry.bounds);
        var markerOptions = {
            position: GeocoderResult[0].geometry.location
        };
        var marker = new google.maps.Marker(markerOptions);
        marker.setMap(map);
    }
        
});
}
function initialize() {
  var mapOptions = {
    zoom: 2,
    center: new google.maps.LatLng(0, 0),
   // mapTypeId: google.maps.MapTypeId.ROADMAP
  };
    map = new google.maps.Map(document.getElementById('map-canvas'),mapOptions);
   markAddress(COUNTRY); 
    

}
google.maps.event.addDomListener(window, 'load', initialize); 
});