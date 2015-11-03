var map;
function initMap() {
  var myLatLng = {lat: 59.331, lng: 18.071};

  map = new google.maps.Map(document.getElementById('map-canvas'), {
    center: myLatLng,
    zoom: 12
  });
  var marker = new google.maps.Marker({
    map: map,
    position: myLatLng
  });
}
$('#map').on('shown.bs.modal', function() {
  var myLatLng = {lat: 59.331, lng: 18.071};

  map = new google.maps.Map(document.getElementById('map-canvas'), {
    center: myLatLng,
    zoom: 12
  });
  var marker = new google.maps.Marker({
    map: map,
    position: myLatLng
  });
});
