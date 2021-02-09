var deviceLocation = new google.maps.LatLng(0, 0);
var requireLocation = new google.maps.LatLng(-6.3487494 , 106.7738856);

function initMap() {
    // The location of Uluru
    var uluru = { lat: -6.175392, lng: 106.827156 };
    // The map, centered at Uluru
    var map = new google.maps.Map(
        document.getElementById('map'), { zoom: 15, center: uluru });
    // The marker, positioned at Uluru
    var marker = new google.maps.Marker({ position: uluru, map: map });
    var infoWindow = new google.maps.InfoWindow;

    getCurrentLocation(infoWindow, map);
}

function getCurrentLocation(infoWindow, map) {

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (position) {
            var pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };

            document.getElementById('lat').value = pos.lat;
            document.getElementById('long').value = pos.lng;
            // infoWindow.setPosition(pos);
            // infoWindow.setContent('Location found.');
            // infoWindow.open(map);
            var marker = new google.maps.Marker({ position: pos, map: map });
            map.setCenter(pos);

            deviceLocation = new google.maps.LatLng(pos.lat, pos.lng);
            
          if (isOnRadius(deviceLocation, requireLocation)) {
             alert ('boleh absen');
          }  else{
            alert ('kejauhan');
          }
           

        }, function () {
            handleLocationError(true, infoWindow, map.getCenter());
            console.log("Handle location error");
            
        });
    } else {
        // Browser doesn't support Geolocation
        handleLocationError(false, infoWindow, map.getCenter());
        console.log("Handle location error");
    }

}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
    infoWindow.setPosition(pos);
    infoWindow.setContent(browserHasGeolocation ?
        'Error: The Geolocation service failed.' :
        'Error: Your browser doesn\'t support geolocation.');
    infoWindow.open(map);
}


function isOnRadius(deviceLocation, requireLocation) {
    if (navigator.geolocation) {
        var from = deviceLocation;//new google.maps.LatLng(location.latitude, location.longitude);
        var to = requireLocation;  //new google.m
        
        aps.LatLng(position.coords.latitude, position.coords.longitude);
        var radius = google.maps.geometry.spherical.computeDistanceBetween(from, to);
        console.log("Radius : " + radius);
        if (radius > 5) {
            return false;
        } else {
            return true;
        }

        // navigator.geolocation.getCurrentPosition(function (position) {
        //     //var location = $('#us3').locationpicker('location');
        //     var from = deviceLocation;//new google.maps.LatLng(location.latitude, location.longitude);
        //     var to = requireLocation;  //new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
        //     alert(google.maps.geometry.spherical.computeDistanceBetween(from, to) <= location.radius);
        // })
    } 
}