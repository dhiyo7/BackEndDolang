@extends('templates.default')

@section('content')
@if ($errors->all())
<div class="alert alert-fill-danger" role="alert">
  <i class="mdi mdi-alert-circle"></i>
  Wisata Gagal Disimpan
</div>
@endif
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Form tambah wisata</h4>
                <form action="{{route('tour.store')}}" method="post" enctype="multipart/form-data">
                  @csrf
                    <div class="form-group">
                        <label for="title">Nama Pariwisata</label>
                        <input type="text" class="form-control @if($errors->has('name') || Session::has('errorName')) is-invalid  @endif" name="name" value="{{ old('name') }}" placeholder="Masukan Judul" required autofocus>
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
                        <textarea name="address" rows="8" cols="80" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" placeholder="Masukan Alamat" required>{{old('address')}}</textarea>
                        @if ($errors->has('address'))
                            <span class="invalid-feedback" role="alert">
                                <strong>Alamat terlalu pendek</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                      <label for="category">Kecamatan</label>
                      <input type="text" name="region" value="{{old('region')}}" list="region" class="form-control{{ $errors->has('region') ? ' is-invalid' : '' }}" placeholder="Masukan Kecamatan" />
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
                        <input type="text" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" value="{{old('price')}}" name="price" id="price" placeholder="Masukan Biaya" required>
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
                          <option value="Bukit" {{old('category') == 'Bukit' ? 'selected' : ''}}>Bukit</option>
                          <option value="Curug" {{old('category') == 'Curug' ? 'selected' : ''}}>Curug</option>
                          <option value="Kolam Renang" {{old('category') == 'Kolam Renang' ? 'selected' : ''}}>Kolam Renang</option>
                          <option value="Pantai" {{old('category') == 'Pantai' ? 'selected' : ''}}>Pantai</option>
                          <option value="Taman" {{old('category') == 'Taman' ? 'selected' : ''}}>Taman</option>
                        </select>
                    </div>

                    <div class="row">
                      <div class="form-group col-12">
                        <label for="">Jam Operasional</label>
                      </div>
                      <div class="form-group col-2">
                        <div class="input-group date" id="timepicker-example" data-target-input="nearest">
                          <div class="input-group" data-target="#timepicker-example" data-toggle="datetimepicker">
                            <input type="text" name="open" class="form-control datetimepicker-input" value="{{old('open')}}" data-target="#timepicker-example" required/>
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
                            <input type="text" name="closed" class="form-control datetimepicker-input" value="{{old('closed')}}" data-target="#timepicker-example2" required/>
                            <div class="input-group-addon input-group-append"><i class="mdi mdi-clock input-group-text"></i></div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group col-1 mt-3 mr-0">
                        <label for="">WIB</label>
                      </div>
                    </div>


                    <div class="form-group">
                        <label for="description">Deskripsi</label>
                        <textarea class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }} summernote-simple" name="description" rows="8" placeholder="Masukan Deskripsi" required>{{old('description')}}</textarea>
                        @if ($errors->has('description'))
                            <span class="invalid-feedback" role="alert">
                                <strong>Deskripsi terlalu pendek</strong>
                            </span>
                        @endif
                    </div>
                    <div class="row">
                    <div class="form-group col-6">
                      <label>Gambar</label>
                      <input type="file" name="image" class="file-upload-default" accept="image/*">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info @error('image') is-invalid @enderror" disabled placeholder="Pilih Gambar">
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
                  </div>
                    <div class="row">
                      <div class="form-group col-6">
                        <label>Panorama</label>
                        <input type="file" name="panorama[]" class="file-upload-default" accept="image/*" multiple="multiple" >
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info @error('panorama') is-invalid @enderror" disabled placeholder="Pilih Panorama">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                          </span>
                          @error('panorama')
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
                        <input type="text" id="long" name="longitude" class="form-control" value="{{ old('longitude') }}" placeholder="Longitude" required>
                    </div>
                    <div class="form-group col-6">
                        <label for="title">Latitude</label>
                        <input type="text" id="lat" name="latitude" class="form-control" value="{{ old('latitude') }}" placeholder="Latitude" required>
                    </div>
                    </div>
                      <div class="mb-4">
                        <div id="map2" class="vector-map demo-vector-map"></div>
                      </div>
                    <a style="text-decoration:none" href="{{route('tour')}}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
