<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="initial-scale=1.0">
  <title>Dolang - @if(Request::is('/')) Login @else Admin @endif</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('asset/vendors/iconfonts/mdi/font/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{ asset('asset/vendors/css/vendor.bundle.base.css')}}">
  <link rel="stylesheet" href="{{ asset('asset/vendors/css/vendor.bundle.addons.css')}}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('asset/vendors/summernote/dist/summernote-bs4.css')}}">
  <link rel="stylesheet" href="{{ asset('asset/css/vertical-layout-light/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('asset/images/bengkulu-mini.png')}}" />
  <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v1.0.0/mapbox-gl.js'></script>
  <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v1.0.0/mapbox-gl.css' rel='stylesheet' />
    <style>
    body { margin:0; padding:0; }
    #map { position:absolute; top:5; bottom:5; width:70%; height:50%}
    </style>
    </head>
