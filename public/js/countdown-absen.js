var serverDate = new Date();

function enableAbsenMasuk(enable) {
    if (enable) {
        document.getElementById('btn-in').removeAttribute('disabled');
    } else {
        document.getElementById('btn-in').disabled = true;
    }
}

function enableAbsenPulang(enable) {
    if (enable) {
        document.getElementById('btn-out').removeAttribute('disabled');
    } else {
        document.getElementById('btn-out').disabled = true;
    }
}

function startCountDown(timeIn) {
    var dateToGo = new Date(timeIn);


     //dateToGo.setHours(dateToGo.getHours() + 4);
    dateToGo.setMinutes(dateToGo.getMinutes() + 1);
    var countDownDate = dateToGo.getTime();

    console.log("IN : " + dateToGo);
    console.log("Should out : " + dateToGo);

    // Update the count down every 1 second
    var x = setInterval(function () {
        var now = serverDate.getTime();

        // Find the distance between now and the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Display the result in the element with id="demo"
        document.getElementById("count-down").value = days + "d " + hours + "h "
            + minutes + "m " + seconds + "s ";

        console.log(document.getElementById("count-down").value);

        // If the count down is finished, write some text
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("count-down").value = "EXPIRED";
            enableAbsenPulang(true);
        } else {
            enableAbsenPulang(false);
        }

        serverDate.setSeconds(serverDate.getSeconds() + 1);
    }, 1000);
}

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

            var timeOut = document.getElementById('time-out').value;

            if (timeOut.length > 0) {
                enableAbsenPulang(false);
                enableAbsenMasuk(false);
            } else {
                var timeIn = document.getElementById('time-in').value;
                if (timeIn.length > 0) {
                    var serverDateInString = document.getElementById('server-date').value;
                    serverDate = new Date(serverDateInString);

                    startCountDown(timeIn);
                    enableAbsenMasuk(false);
                } else {
                    var deviceLocation = new google.maps.LatLng(pos.lat, pos.lng); // lokasi komitras
                    var requireLocation = new google.maps.LatLng(-6.2087634,106.84559899999999);

                    //var deviceLocation = new google.maps.LatLng(pos.lat, pos.lng);   // lokasi test 
                    //var requireLocation = new google.maps.LatLng(-6.2087634,106.84559899999999);

                    if (isOnRadius(deviceLocation, requireLocation)) {
                        alert('boleh absen');
                        enableAbsenMasuk(true);
                        enableAbsenPulang(false);
                    } else {
                        alert('belum di lokasi yang di tentukan ');
                        enableAbsenMasuk(false);
                        enableAbsenPulang(false);
                    }
                }
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
        var to = requireLocation;  //new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
        var radius = google.maps.geometry.spherical.computeDistanceBetween(from, to);
        console.log("Radius : " + radius);
        if (radius > 1000) {
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