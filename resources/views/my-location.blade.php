<html>
  <head>
    <title>Simple Map</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

    <link rel="stylesheet" type="text/css" href="/css/style.css" />
    <script type="module" src="/js/index.js"></script>
  </head>
  <body>
    <div id="map"></div>

    {{-- <div><button class="custom-map-control-button" style="position: absolute; top: 0px; left: 51px;">Pan to Current Location</button></div> --}}

    <script async
    src="https://maps.googleapis.com/maps/api/js?key={{ config('app.gmap_key') }}&callback=initMap">
</script>
        {{-- <script
        src="https://maps.googleapis.com/maps/api/js?key={{ config('app.gmap_key') }}&libraries=geometry&callback=initMap"
        async defer></script> --}}
  </body>
</html>
