<!-- plugins:js -->
<script src="{{ asset('asset/vendors/js/vendor.bundle.base.js')}}"></script>
<script src="{{ asset('asset/vendors/js/vendor.bundle.addons.js')}}"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="{{ asset('asset/js/off-canvas.js')}}"></script>
<script src="{{ asset('asset/js/hoverable-collapse.js')}}"></script>
<script src="{{ asset('asset/js/template.js')}}"></script>
<script src="{{ asset('asset/js/settings.js')}}"></script>
<script src="{{ asset('asset/js/todolist.js')}}"></script>
<script src="{{ asset('asset/vendors/tinymce/tinymce.min.js')}}"></script>
  <script src="{{ asset('asset/vendors/tinymce/themes/modern/theme.js')}}"></script>
  <script src="{{ asset('asset/vendors/summernote/dist/summernote-bs4.min.js')}}"></script>
    <script src="{{ asset('asset/js/editorDemo.js')}}"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="{{asset('asset/js/data-table.js')}}"></script>
<script src="{{ asset('asset/js/file-upload.js')}}"></script>
<script src="{{ asset('asset/js/owl-carousel.js')}}"></script>
<script>
window.setTimeout(function() {
  $(".alert").fadeTo(500, 0).slideUp(500, function(){
  $(this).remove();
});
}, 5000);
</script>
<script>
var tanpa_rupiah = document.getElementById('price');
tanpa_rupiah.addEventListener('keyup', function(e)
{
tanpa_rupiah.value = formatRupiah(this.value);
});


/* Fungsi */
function formatRupiah(angka, prefix)
{
var number_string = angka.replace(/[^,\d]/g, '').toString(),
split    = number_string.split(','),
sisa     = split[0].length % 3,
rupiah     = split[0].substr(0, sisa),
ribuan     = split[0].substr(sisa).match(/\d{3}/gi);

if (ribuan) {
separator = sisa ? '.' : '';
rupiah += separator + ribuan.join('.');
}

rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
}
</script>
<script src='https://unpkg.com/es6-promise@4.2.4/dist/es6-promise.auto.min.js'></script>
<script src="https://unpkg.com/@mapbox/mapbox-sdk/umd/mapbox-sdk.min.js"></script>
<script>
mapboxgl.accessToken = 'pk.eyJ1Ijoicm95aGFuMzEiLCJhIjoiY2p2czh2ZW5rMng3NTN5cGJyZHVpMzBjbiJ9.YCydz7uTwLHtDvO7S7Dx_w';
// eslint-disable-next-line no-undef
var mapboxClient = mapboxSdk({ accessToken: mapboxgl.accessToken });
mapboxClient.geocoding.forwardGeocode({
query: 'Pemalang',
autocomplete: false,
limit: 1
})
.send()
.then(function (response) {
if (response && response.body && response.body.features && response.body.features.length) {
var feature = response.body.features[0];

var map = new mapboxgl.Map({
container: 'map',
style: 'mapbox://styles/mapbox/streets-v11',
center: [109.425911,-7.059942],
zoom: 9
});
// new mapboxgl.Marker()
// .setLngLat([108.902679,-6.959179])
// .addTo(map);
}
});

</script>
