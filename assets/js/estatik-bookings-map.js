window.initMap = function() {
    var mapElement = document.getElementById('booking-map');
    if (mapElement) {
        var address = mapElement.getAttribute('data-address');
        var geocoder = new google.maps.Geocoder();
        geocoder.geocode({'address': address}, function(results, status) {
            if (status === 'OK') {
                var map = new google.maps.Map(mapElement, {
                    zoom: 15,
                    center: results[0].geometry.location
                });
                new google.maps.Marker({
                    map: map,
                    position: results[0].geometry.location
                });
            } else {
                console.error('Google Maps не смог найти адрес из-за: ' + status);
            }
        });
    }
};

if (window.addEventListener) {
    window.addEventListener('load', window.initMap);
} else {
    window.attachEvent('onload', window.initMap);
}
