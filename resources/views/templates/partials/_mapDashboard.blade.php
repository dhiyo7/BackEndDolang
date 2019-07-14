<script>

	var mymap = L.map('map').setView([-6.894006,109.377652], 10);
	

	L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
		maxZoom: 18,
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox.streets'
	}).addTo(mymap);
  var tour = L.layerGroup();
  @foreach($tours as $tour)
	L.marker([{{$tour->latitude}},{{$tour->longitude}}]).addTo(mymap)
		.bindPopup("<b>{{$tour->title}}</b><br />{{$tour->category}}.").addTo(tour);
  @endforeach



	mymap.on('click', onMapClick);

</script>
