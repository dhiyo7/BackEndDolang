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
<!-- <script src="{{asset('asset/js/maps.js')}}"></script> -->
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
@if(Request::is('beranda'))
  @include('templates.partials._mapDashboard')
@elseif(Request::is('pariwisata/edit/*'))
  @include('templates.partials._mapEdit')
@elseif(Request::is('pariwisata/detail/*'))
    @include('templates.partials._mapShow')
@elseif(Request::is('pariwisata/tambah'))
  @include('templates.partials._mapCreate')
@endif
