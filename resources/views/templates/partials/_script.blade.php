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
