@extends('templates.default')

@section('content')
@if ($errors->has('title') || $errors->has('description') || $errors->has('image') || $errors->has('panorama.*') || session()->has('errorOperational') )
<div class="alert alert-fill-danger" role="alert">
  <i class="mdi mdi-alert-circle"></i>
  Wisata Gagal Disimpan
</div>
@elseif(session()->has('success'))
<div class="alert alert-fill-success" role="alert">
  <i class="mdi mdi-alert-circle"></i>
  {{ session()->get('success') }}
</div>
@endif
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Form edit wisata</h4>
                <form class="forms-sample" action="{{route('tour.update', $tour)}}" method="post" enctype="multipart/form-data">
                  @csrf
                  @method('PATCH')
                    <div class="form-group">
                        <label for="title">Nama Pariwisata</label>
                        <input type="text" class="form-control  @if($errors->has('name') || Session::has('errorName')) is-invalid  @endif" name="name" value="{{old('name',$tour->name)}}" placeholder="Masukan nama pariwisata">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>@if($message == 'validation.regex')
                                  Masukan Judul dengan benar
                                  @else
                                  Judul terlalu pendek
                                  @endif
                                </strong>
                            </span>
                        @enderror
                        @if(Session::has('errorName'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>
                                    {{Session::get('errorName')}}
                                  </strong>
                              </span>
                          @endif
                    </div>
                    <div class="form-group">
                        <label for="title">Alamat</label>
                        <textarea name="address" rows="8" cols="80" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" placeholder="Masukan Alamat" required>{{old('address',$tour->address)}}</textarea>
                        @if ($errors->has('address'))
                            <span class="invalid-feedback" role="alert">
                                <strong>Alamat terlalu pendek</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                      <label for="category">Kecamatan</label>
                      <input type="text" name="region" value="{{old('region',$tour->region)}}" list="region" class="form-control{{ $errors->has('region') ? ' is-invalid' : '' }}" placeholder="Masukan Kecamatan" />
                      <datalist id="region">
                        <option value="Ampelgading">
                        <option value="Bantarbolang">
                        <option value="Belik">
                        <option value="Bodeh">
                        <option value="Comal">
                        <option value="Moga">
                        <option value="Pemalang">
                        <option value="Petarukan">
                        <option value="Pulosari">
                        <option value="Randudongkal">
                        <option value="Taman">
                        <option value="Ulujami">
                        <option value="Warungpring">
                        <option value="Watukumpul">
                      </datalist>
                      @if ($errors->has('region'))
                          <span class="invalid-feedback" role="alert">
                              <strong>Kecamatan yang anda masukan salah</strong>
                          </span>
                      @endif
                    </div>
                    <div class="form-group">
                        <label for="category">HTM</label>
                      <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text text-dark">Rp.</div>
                        </div>
                        <input type="text" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" value="{{old('price',number_format($tour->price,0,',','.'))}}" name="price" id="price" placeholder="Masukan Biaya" required>
                        @error('price')
                            <span class="invalid-feedback" role="alert">
                              <strong>@if($message == 'validation.between.numeric')
                                HTM minimal Rp. 5.000
                                @endif
                              </strong>
                            </span>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group">
                        <label for="category">Kategori</label>
                        <select class="form-control" name="category">
                            <option value="Bukit"
                              {{old('category') == 'Bukit' ? 'selected' : ''}}
                              @if($tour->category === 'Bukit') selected @endif
                              >Bukit</option>
                            <option value="Curug"
                              {{old('category') == 'Curug' ? 'selected' : ''}}
                              @if($tour->category === 'Curug') selected @endif
                              >Curug</option>
                            <option value="Kolam Renang"
                              {{old('category') == 'Kolam Renang' ? 'selected' : ''}}
                              @if($tour->category === 'Kolam Renang') selected @endif
                              >Kolam Renang</option>
                            <option value="Pantai"
                              {{old('category') == 'Pantai' ? 'selected' : ''}}
                              @if($tour->category === 'Pantai') selected @endif
                              >Pantai</option>
                            <option value="Taman"
                              {{old('category') == 'Taman' ? 'selected' : ''}}
                              @if($tour->category === 'Taman') selected @endif
                              >Taman</option>
                        </select>
                    </div>
                    <div class="row">
                      <div class="form-group col-12">
                        <label for="">Jam Operasional</label>
                      </div>
                      <div class="form-group col-2">
                        <div class="input-group date" id="timepicker-example" data-target-input="nearest">
                          <div class="input-group" data-target="#timepicker-example" data-toggle="datetimepicker">
                            <input type="text" name="open" id="opened" class="form-control datetimepicker-input @if(Session::get('errorOperational')) is-invalid @endif" value="{{old('open',substr($tour->operational,0,5))}}" data-target="#timepicker-example" required/>
                            <div class="input-group-addon input-group-append"><i class="mdi mdi-clock input-group-text"></i></div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group col-1 mt-3 mr-0">
                        <label for="">Sampai</label>
                      </div>
                      <div class="form-group col-2 ml-1">
                        <div class="input-group date" id="timepicker-example2" data-target-input="nearest">
                          <div class="input-group" data-target="#timepicker-example2" data-toggle="datetimepicker">
                            <input type="text" name="closed" id="closed" class="form-control datetimepicker-input @if(Session::get('errorOperational')) is-invalid @endif" value="{{old('closed',substr($tour->operational,13,18))}}" data-target="#timepicker-example2" required/>
                            <div class="input-group-addon input-group-append"><i class="mdi mdi-clock input-group-text"></i></div>
                            @if(Session::get('errorOperational'))
                            <span class="invalid-feedback" role="alert">
                                  <strong>{{Session::get('errorOperational')}}
                                  </strong>
                            </span>
                            @endif
                          </div>
                        </div>
                      </div>
                      <div class="form-group col-1 mt-3 mr-0">
                        <label for="">WIB</label>
                      </div>
                    </div>
                    <div class="form-group">
                        <label for="description">Deskripsi</label>
                        <textarea class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }} summernote-simple" name="description" rows="8">{!!old('description',$tour->description)!!}</textarea>
                        @if ($errors->has('description'))
                            <span class="invalid-feedback" role="alert">
                                <strong>Deskripsi terlalu pendek</strong>
                            </span>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <img src="{{ asset('images/'.$tour->image) }}" alt="sample" class="rounded mw-100"/>
                            <p class="text-info mt-5">Gambar sebelumnya</p>
                        </div>
                    <div class="col-6">
                          <div class="owl-carousel owl-theme full-width">
                            @foreach($tour->panoramas as $panorama)
                            <div class="item">
                              <img src="{{asset('images/'.$panorama->path)}}" width="600px" height="495px" alt="image"/>
                              <div class="card-img-overlay d-flex">
                                <div class="mt-auto text-center w-100">
                                <button type="button" class="btn btn-danger btn-sm" data-target="#hapus{{$panorama->id}}" data-toggle="modal">Hapus</button>
                                </div>
                              </div>
                            </div>

                            @endforeach
                          </div>
                            <p class="text-info mt-2 mb-3">Panorama sebelumnya</p>
                        </div>
                  </div>
                    <div class="row">
                    <div class="form-group col-6">
                      <label>Gambar</label>
                      <input type="file" name="image" class="file-upload-default" accept="image/*">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info{{ $errors->has('image') ? ' is-invalid' : '' }}" disabled placeholder="Pilih Gambar">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                        @error('image')
                        <span class="invalid-feedback" role="alert">
                              <strong>@if($message == 'validation.required')
                                Gambar tidak boleh kosong
                                @elseif($message == 'validation.uploaded')
                                Gambar maksimal 2MB
                                @else
                                Gambar harus JPG,JPEG, dan PNG
                                @endif
                              </strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                      <div class="form-group col-6">
                        <label>Panorama</label>
                        <input type="file" name="panorama[]" class="file-upload-default" accept="image/*" multiple="multiple" >
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info @error('panorama.*') is-invalid @enderror" disabled placeholder="Pilih Panorama">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                          </span>
                          @error('panorama.*')
                          <span class="invalid-feedback" role="alert">
                                <strong>@if($message == 'validation.required')
                                  Gambar tidak boleh kosong
                                  @elseif($message == 'validation.uploaded')
                                  Gambar maksimal 2MB
                                  @else
                                  Gambar harus JPG,JPEG, dan PNG
                                  @endif
                                </strong>
                          </span>
                          @enderror
                        </div>
                      </div>
                  </div>
                    <div class="row">
                    <div class="form-group col-6">
                        <label for="title">Longitude</label>
                        <input type="text" id="long" name="longitude" class="form-control" value="{{ old('longitude', $tour->longitude) }}" placeholder="Longitude" required>
                    </div>
                    <div class="form-group col-6">
                        <label for="title">Latitude</label>
                        <input type="text" id="lat" name="latitude" class="form-control" value="{{ old('latitude', $tour->latitude) }}" placeholder="Latitude" required>
                    </div>
                    </div>
                      <div class="mb-4">
                          <div id="map3" class="vector-map demo-vector-map"></div>
                      </div>
                    <a style="text-decoration:none" href="{{route('tour')}}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@foreach($tour->panoramas as $panorama)
    <!-- modal hapus -->
    <div class="modal fade" id="hapus{{$panorama->id}}" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Hapus Panorama</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="{{route('panorama.destroy', $panorama)}}" method="post">
            @csrf
          <div class="modal-body">
            <div class="form-group">
              <label for="cname">Hapus Panorama ini ?</label>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <input type="submit" value="hapus" class="btn btn-danger">
          </div>
          </form>
        </div>
      </div>
    </div>
    <!-- akhir modal hapus -->
    @endforeach
@endsection
