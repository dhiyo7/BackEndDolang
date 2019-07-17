<script>
var mymap = L.map('map').setView([-6.894006,109.377652], 10);
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  maxZoom: 18,
  id: 'mapbox.streets'
}).addTo(mymap);

var tour = L.layerGroup();
@if(!$tours->isEmpty())
@foreach($tours as $tour)
L.marker([{{$tour->latitude}},{{$tour->longitude}}]).addTo(mymap)
  .bindPopup("<b>{{$tour->title}}</b><br />{{$tour->category}}.").addTo(tour);
@endforeach
mymap.on('click', onMapClick);
@endif

</script>
