<style>
    #map { 
        height: 300px; 
        }
</style>
<div id="map"></div>
<script>
    var lokasi = "{{$presensi->lokasi_in}}";
    var lok = lokasi.split(",");
    var latitude = lok[0];
    var longitude = lok[1];

    var map = L.map('map').setView([latitude,longitude], 13);
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);
var marker = L.marker([latitude,longitude]).addTo(map);
var circle = L.circle([-6.720845469942587, 108.25455646594386], { 
    color: 'red',
    fillColor: '#f03',
    fillOpacity: 0.5,
    radius: 500000
}).addTo(map);
var popup = L.popup()
    .setLatLng([latitude,longitude])
    .setContent("{{$presensi->nama}}")
    .openOn(map);
</script>
