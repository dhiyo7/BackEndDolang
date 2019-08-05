@extends('templates.default')
@section('content')
<div class="card">
  <div class="card-body">
    <h4>Pariwisata</h4>
    <div class="text-right" style="margin-button:10px">
      <a href="{{ route('tour.create') }}" class="btn btn-primary">Tambah</a>
    </div>
  </div>
</div>
<br>
@if(session()->has('success'))
<div class="alert alert-fill-success" role="alert">
  <i class="mdi mdi-alert-circle"></i>
  {{ session()->get('success') }}
</div>
@endif
<br>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        @if($tours->isEmpty())
        <div class="text-center">
          <h2>Tidak ada wisata</h2>
        </div>
        @else
        <div class="row">
          <div class="col-12">
            <div class="row portfolio-grid">
              @foreach($tours as $tour)
              <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12 mb-5">
                <figure class="effect-text-in">
                  <img src="{{asset('images/'.$tour->image)}}" alt="image" height="150rem"/>
                  <figcaption>
                    <h4>{{$tour->title}}</h4>
                    <p>{{$tour->category}}</p>
                  </figcaption>
                </figure>
                  <div class="text-center">
                <a href="{{route('tour.detail',$tour)}}" class="btn btn-success btn-sm text-white">Detail</a>
                <a href="{{route('tour.edit',$tour)}}" class="btn btn-info btn-sm">Edit</a>
                <button class="btn btn-danger btn-sm" data-target="#hapus{{$tour->id}}" data-toggle="modal">Hapus</button>
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
              @endforeach
            </div>
          </div>
        </div>
        <div>
          <ul class="pagination justify-content-center">
            {{$tours->links()}}
          </ul>
        </div>
        @endif
      </div>
    </div>
  </div>
</div>
@endsection
