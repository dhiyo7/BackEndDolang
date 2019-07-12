<script>

	var mymap = L.map('map4').setView([{{$tour->latitude}},{{$tour->longitude}}], 13);

	L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
		maxZoom: 18,
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox.streets'
	}).addTo(mymap);
  var tour = L.layerGroup();

	L.marker([{{$tour->latitude}},{{$tour->longitude}}]).addTo(mymap)
		.bindPopup("<b>{{$tour->title}}</b><br />{{$tour->category}}.").addTo(tour);



	mymap.on('click', onMapClick);

</script>
