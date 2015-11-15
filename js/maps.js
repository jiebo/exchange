var map;

$('#map').on('shown.bs.modal', function() {
    if(!$("#map-canvas").hasClass('map-constructed')) {
        $("#map-canvas").addClass('map-constructed');
        var centre = {lat: locations[0][1] , lng: locations[0][2]};
        
        map = new google.maps.Map(document.getElementById('map-canvas'), {
            center: centre,
            zoom: Number(locations[0][0])
        });

        var infowindow = new google.maps.InfoWindow();

        var marker, i;

        for(i=1; i<locations.length; i++) {
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                map: map
            });
            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                    infowindow.setContent(locations[i][0]);
                    infowindow.open(map, marker);
                }
            })(marker, i));
            if(i === 1) {
                infowindow.setContent(locations[i][0]);
                infowindow.open(map, marker);
                setTimeout(function() {
                    infowindow.close();
                }, 3500);
            }
        };
    } 
});
