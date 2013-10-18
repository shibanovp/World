var map;
function initialize() {
  var mapOptions = {
    zoom: 3,
    center: new google.maps.LatLng(61.52401, 105.318756),
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };
  map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);
}

google.maps.event.addDomListener(window, 'load', initialize);