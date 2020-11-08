@extends('layouts.app')

@section('content')
<style>
    body {
  background: rgb(255, 255, 255);
}

h3 {
  margin: 4px 0;
  padding: 5px 0;
  font-family: arial, sans-serif;
  width: 100%;
  color: #fff;
}

a {
  font-family: arial, sans-serif;
  color: #00B2EE;
  text-decoration: none;
}
a:hover {
  color: #55d4ff;
}

#map-canvas {
  width: auto;
  height: 500px;
}

#info {
  color: #222;
}

.lngLat {
  color: #fff;
  margin-bottom: 5px;
}
.lngLat .one {
  padding-left: 250px;
}
.lngLat .two {
  padding-left: 34px;
}

#clipboard-btn {
  float: left;
  margin-right: 10px;
  padding: 6px 8px;
  -moz-border-radius: 3px;
  -webkit-border-radius: 3px;
  border-radius: 3px;
}

#info {
  height: 140px;
  float: left;
  margin-bottom: 30px;
  border: solid 2px #eee;
  -moz-border-radius: 3px;
  -webkit-border-radius: 3px;
  border-radius: 3px;
  -moz-box-shadow: inset 0 2px 5px #444;
  -webkit-box-shadow: inset 0 2px 5px #444;
  box-shadow: inset 0 2px 5px #444;
}

#info, .lngLat {
  font-family: arial, sans-serif;
  font-size: 12px;
  padding-top: 10px;
  width: 300px;
}

</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="container">
                    <body onload="initialize()">
                        <div id="map-canvas"></div>
                        <div class="lngLat"><span class="one">Lat</span><span class="two">,Lng</span></div>
                      </body>
                      <button id="clipboard-btn" onclick="copyToClipboard(document.getElementById('info').innerHTML)">Copy to Clipboard</button>
                      <textarea id="info"></textarea>
                      <textarea id="info2"></textarea>

                </div>
            </div>
        </div>
    </div>
</div>
<script>
//var myPolygon;
function initialize() {
  // Map Center
  var myLatLng = new google.maps.LatLng(18.608891,-90.743915);
  // General Options
  var mapOptions = {
    zoom: 18,
    center: myLatLng,
    mapTypeControl: false,
    streetViewControl: false,
    fullscreenControl: false,
//    mapTypeId: google.maps.MapTypeId.RoadMap
    mapTypeId: "terrain",
  };


  var map = new google.maps.Map(document.getElementById('map-canvas'),mapOptions);
  // Polygon Coordinates
  var triangleCoords = [
    new google.maps.LatLng(18.60906,-90.74363),
    new google.maps.LatLng(18.60869,-90.7431),
    new google.maps.LatLng(18.60794,-90.74403),
    new google.maps.LatLng(18.60864,-90.74471),
    new google.maps.LatLng(18.60937,-90.74535),
    new google.maps.LatLng(18.61001,-90.74457),
  ];
  var secondCoords = [
      new google.maps.LatLng(18.609982, -90.744398),
      new google.maps.LatLng(18.610500, -90.743786),
      new google.maps.LatLng(18.609382, -90.742424),
      new google.maps.LatLng(18.608746, -90.743037),
      new google.maps.LatLng(18.609115, -90.743569),
      ];
  // Styling & Controls
  myPolygon = new google.maps.Polygon({
    paths: [triangleCoords, secondCoords],
  draggable: true, // turn off if it gets annoying
editable: true,
    strokeColor: '#FF0000',
    strokeOpacity: 0.8,
    strokeWeight: 2,
    fillColor: '#FF0000',
    fillOpacity: 0.35
  });
  myPolygon.setMap(map);
  //google.maps.event.addListener(myPolygon, "dragend", getPolygonCoords);
  google.maps.event.addListener(myPolygon.getPath(), "insert_at", getPolygonCoords);
  //google.maps.event.addListener(myPolygon.getPath(), "remove_at", getPolygonCoords);
  google.maps.event.addListener(myPolygon.getPath(), "set_at", getPolygonCoords);
}

//Display Coordinates below map
function getPolygonCoords() {
  var len = myPolygon.getPath().getLength();
  var htmlStr = "";
  for (var i = 0; i < len; i++) {
    htmlStr += "new google.maps.LatLng(" + myPolygon.getPath().getAt(i).toUrlValue(3) + "), ";
    //Use this one instead if you want to get rid of the wrap > new google.maps.LatLng(),
    //htmlStr += "" + myPolygon.getPath().getAt(i).toUrlValue(5);
  }
  document.getElementById('info').innerHTML = htmlStr;
  document.getElementById('info2').innerHTML = htmlStr;
}
function copyToClipboard(text) {
  window.prompt("Copy to clipboard: Ctrl+C, Enter", text);
}
</script>
<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDZRx-Ffzuh8MbI52n29iC7A0h9ZwIo-Ps&libraries=places&callback=initMap">
</script>
@endsection
