window.initMap = function() {
    const mapElement = document.getElementById('booking-map');
    if (mapElement) {
        const address = mapElement.getAttribute('data-address');
        const geocoder = new google.maps.Geocoder();
        geocoder.geocode({'address': address}, function(results, status) {
            if (status === 'OK') {
                const map = new google.maps.Map(mapElement, {
                    zoom: 15,
                    center: results[0].geometry.location
                });
                new google.maps.Marker({
                    map: map,
                    position: results[0].geometry.location
                });
            } else {
                document.getElementById('booking-map').innerHTML = '<p>Google Maps could not load the address due to: ' + status + '</p>';
                document.getElementById('booking-map').style.backgroundColor = '#f7f7f7';
            }
        });
    } else {
        console.error('Failed to initialize Google Maps: Map element not found.');
    }
};

if (window.addEventListener) {
    window.addEventListener('load', window.initMap);
} else {
    window.attachEvent('onload', window.initMap);
}
