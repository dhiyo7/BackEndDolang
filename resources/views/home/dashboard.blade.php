@extends('templates.default')
@section('content')
<div class="row">
  <div class="col-md-6 col-lg-4 grid-margin stretch-card">
    <div class="card bg-gradient-danger text-white text-center card-shadow-danger">
      <div class="card-body">
        <h6 class="font-weight-normal">Total Pariwisata</h6>
        <h2 class="mb-0">{{count($tours)}}</h2>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-lg-4 grid-margin stretch-card">
    <div class="card bg-gradient-info text-white text-center card-shadow-primary">
      <div class="card-body">
        <h6 class="font-weight-normal">Total Pengguna</h6>
        <h2 class="mb-0">{{count($users)}}</h2>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-lg-4 grid-margin stretch-card">
    <div class="card bg-gradient-warning text-white text-center card-shadow-primary">
      <div class="card-body">
        <h6 class="font-weight-normal">Total Komentar</h6>
        <h2 class="mb-0">{{count($comments)}}</h2>
      </div>
    </div>
  </div>

</div>
<div id="map" class="vector-map demo-vector-map"></div>
@endsection
