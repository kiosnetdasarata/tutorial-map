<html>
  <head>
    <title>Simple Map</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

    <link rel="stylesheet" type="text/css" href="/css/style.css" />
    {{-- <script type="module" src="/js/index.js"></script> --}}
  </head>
  <body>
    <div id="map"></div>

    {{-- <div><button class="custom-map-control-button" style="position: absolute; top: 0px; left: 51px;">Pan to Current Location</button></div> --}}

        <script
        src="https://maps.googleapis.com/maps/api/js?key={{ config('app.gmap_key') }}&libraries=geometry&callback=initMap"
        async defer></script>

        <script>
            let map, infoWindow;

function initMap() {
  map = new google.maps.Map(document.getElementById("map"), {
    center: { lat: -34.397, lng: 150.644 },
    zoom: 20,
  });

    infoWindow = new google.maps.InfoWindow();

  const locationButton = document.createElement("button");

  locationButton.textContent = "Pan to Current Location";
  locationButton.classList.add("custom-map-control-button");
  map.controls[google.maps.ControlPosition.TOP_CENTER].push(locationButton);
  locationButton.addEventListener("click", () => {
    // Try HTML5 geolocation.
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(
        (position) => {
          const pos = {
            lat: position.coords.latitude,
            lng: position.coords.longitude,
          };

          var new_lat = position.coords.latitude.toString();
          var new_lng = position.coords.longitude.toString();

          infoWindow.setPosition(pos);
          infoWindow.setContent("Lat :" + new_lat +", " + "Lng :" + new_lng);
          infoWindow.open(map);
          map.setCenter(pos);
        },
        () => {
          handleLocationError(true, infoWindow, map.getCenter());
        }
      );
    } else {
      // Browser doesn't support Geolocation
      handleLocationError(false, infoWindow, map.getCenter());
    }
  });
}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
  infoWindow.setPosition(pos);
  infoWindow.setContent(
    browserHasGeolocation
      ? "Error: The Geolocation service failed."
      : "Error: Your browser doesn't support geolocation."
  );
  infoWindow.open(map);
}

window.initMap = initMap();

        </script>
  </body>
</html>
