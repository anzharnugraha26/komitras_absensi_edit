function searchEmployee(event) {
    const url = new URL('http://localhost:8000/api/findByNik?nik=12133505');
    
    url.searchParams.append('nik', event.target.value);
    fetch(url, {
        method: 'GET'
    }).then((response) => {
        response.json().then((value) => {
            var data = value.data;
            if (data != null) {
                $('#nik').val(value.data.nama_lengkap);    
            } else {
                toastr.error("Data not");
            }
        }).catch((reason) => {
            console.log(reason);
            alert (reason);
        })
    }).catch((reason) => {
        console.log(reason);
        alert (reason);
    })
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

    // getCurrentLocation(infoWindow, map);
}

function getCurrentLocation() {

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (position) {
            var pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };

            return pos;

        }, function () {
            return null;

        });
    } else {
        return null;
    }
}

function initAutocomplete() {
    var map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: -33.8688, lng: 151.2195},
      zoom: 13,
      mapTypeId: 'roadmap'
    });

    var devLocation = getCurrentLocation(map);
    if (devLocation != null) {
        var marker = new google.maps.Marker({ position: pos, map: map });
        map.setCenter(pos);
        marker.setMap(map);
    }
    // Create the search box and link it to the UI element.
    var input = document.getElementById('pac-input');
    var searchBox = new google.maps.places.SearchBox(input);
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

    // Bias the SearchBox results towards current map's viewport.
    map.addListener('bounds_changed', function() {
      searchBox.setBounds(map.getBounds());
    });

    var markers = [];
    // Listen for the event fired when the user selects a prediction and retrieve
    // more details for that place.
    searchBox.addListener('places_changed', function() {
      var places = searchBox.getPlaces();

      if (places.length == 0) {
        return;
      }

      // Clear out the old markers.
      markers.forEach(function(marker) {
        marker.setMap(null);
      });
      markers = [];

      // For each place, get the icon, name and location.
      var bounds = new google.maps.LatLngBounds();
      places.forEach(function(place) {
        if (!place.geometry) {
          console.log("Returned place contains no geometry");
          return;
        }
        var icon = {
          url: place.icon,
          size: new google.maps.Size(71, 71),
          origin: new google.maps.Point(0, 0),
          anchor: new google.maps.Point(17, 34),
          scaledSize: new google.maps.Size(25, 25)
        };

        // Create a marker for each place.
        markers.push(new google.maps.Marker({
          map: map,
          icon: icon,
          title: place.name,
          position: place.geometry.location
        }));

        if (place.geometry.viewport) {
          // Only geocodes have viewport.
          bounds.union(place.geometry.viewport);
        } else {
          bounds.extend(place.geometry.location);
        }
      });
      map.fitBounds(bounds);
    });
  }

