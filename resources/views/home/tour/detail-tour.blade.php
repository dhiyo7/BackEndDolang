@extends('templates.default')

@section('content')
    <div class="card">
        <img class="card-img-top" src="{{ asset('images/'.$tour->image) }}" height="700rem" alt="Card image cap">
        </div>
        <div class="card-body">
          <div class="mb-3 mr-2">
            <div class="row">
              <div class="col-4 form-group">
                  <img src="{{ asset('images/'.$tour->panorama1) }}" width="500px" height="200px" alt="sample" class="rounded mw-100"/>
                  <p class="text-info mt-3">Panorama 1</p>
              </div>
              <div class="col-4 form-group">
                  <img src="{{ asset('images/'.$tour->panorama2) }}" width="500px" height="200px" alt="sample" class="rounded mw-100"/>
                  <p class="text-info mt-3">Panorama 2</p>
              </div>
              <div class="col-4 form-group">
                  <img src="{{ asset('images/'.$tour->panorama3) }}" width="500px" height="200px" alt="sample" class="rounded mw-100"/>
                  <p class="text-info mt-3">Panorama 3</p>
              </div>
            </div>
            <h4 class="card-title">{{$tour->title}}</h4>
            <h6 class="card-text">{{$tour->category}}</h6>
            <h6 class="card-text">{{$tour->region}}, {{$tour->address}}</h6>
            <h6 class="card-text">{{$tour->price}}</h6>
            <p class="card-description">{!!$tour->description!!}</p>
            <p class="card-description">{{$tour->created_at->diffForHumans()}}</p>
            <div class="mt-4">
              <div id="map-holder">
                <div class="container fill">
                  <div id="map4"></div>
                </div>
              </div>
            </div>
            <a style="text-decoration:none" href="{{route('tour.edit',$tour)}}" class="btn btn-info mt-5">Edit</a>
            <button class="btn btn-danger mt-5" data-target="#hapus{{$tour->id}}" data-toggle="modal">Hapus</button>
            <a style="text-decoration:none" href="{{route('tour')}}" class="btn btn-secondary mt-5">Kembali</a>
        </div>
    </div>
    <!-- modal hapus -->
    <div class="modal fade" id="hapus{{$tour->id}}" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Hapus Wisata</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="{{route('tour.destroy',$tour)}}" method="post">
            @csrf
          <div class="modal-body">
            <div class="form-group">
              <label for="cname">Apakah anda yakin akan menghapus wisata <b>{{$tour->title}}</b> ?</label>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <input type="submit" value="hapus" class="btn btn-danger">
          </div>
          </form>
        </div>
      </div>
    </div>
    <!-- akhir modal hapus -->
@endsection
