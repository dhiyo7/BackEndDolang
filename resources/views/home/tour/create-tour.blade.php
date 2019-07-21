@extends('templates.default')

@section('content')
@if ($errors->has('title') || $errors->has('description') || $errors->has('image') )
<div class="alert alert-fill-danger" role="alert">
  <i class="mdi mdi-alert-circle"></i>
  Wisata Gagal Disimpan
</div>
@endif
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Form tambah wisata</h4>
                <form class="forms-sample" action="{{route('tour.store')}}" method="post" enctype="multipart/form-data">
                  @csrf
                    <div class="form-group">
                        <label for="title">Judul</label>
                        <input type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}" placeholder="Masukan Judul" required autofocus>
                        @if ($errors->has('title'))
                            <span class="invalid-feedback" role="alert">
                                <strong>Judul terlalu pendek</strong>
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
                        @if ($errors->has('price'))
                            <span class="invalid-feedback" role="alert">
                                <strong>HTM minimal 5000</strong>
                            </span>
                        @endif
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
                    <div class="form-group">
                        <label for="title">Jam Operasional</label>
                        <input type="text" class="form-control{{ $errors->has('operational') ? ' is-invalid' : '' }}" name="operational" value="{{ old('operational') }}" placeholder="Masukan Jam Operasional" required autofocus>
                        @if ($errors->has('operational'))
                            <span class="invalid-feedback" role="alert">
                                <strong>Jam Operasional terlalu pendek</strong>
                            </span>
                        @endif
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
                    <div class="form-group col-6">
                      <label>Gambar</label>
                      <input type="file" name="image" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" value="{{old('image')}}" class="form-control file-upload-info{{ $errors->has('image') ? ' is-invalid' : '' }}" disabled placeholder="Pilih Gambar">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                        @if ($errors->has('image'))
                        <span class="invalid-feedback" role="alert">
                            <strong>File gambar harus JPG,PNG,JPEG</strong>
                        </span>
                        @endif
                      </div>
                    </div>
                    <div class="row">
                    <div class="form-group col-4">
                      <label>Panorama 1</label>
                      <input type="file" name="panorama1" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info{{ $errors->has('panorama1') ? ' is-invalid' : '' }}" disabled placeholder="Pilih panorama">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                        @if ($errors->has('panorama1'))
                        <span class="invalid-feedback" role="alert">
                            <strong>File panorama harus JPG,PNG,JPEG</strong>
                        </span>
                        @endif
                      </div>
                    </div>
                    <div class="form-group col-4">
                      <label>Panorama 2</label>
                      <input type="file" name="panorama2" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info{{ $errors->has('panorama2') ? ' is-invalid' : '' }}" disabled placeholder="Pilih panorama">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                        @if ($errors->has('panorama2'))
                        <span class="invalid-feedback" role="alert">
                            <strong>File panorama harus JPG,PNG,JPEG</strong>
                        </span>
                        @endif
                      </div>
                    </div>
                    <div class="form-group col-4">
                      <label>Panorama 3</label>
                      <input type="file" name="panorama3" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info{{ $errors->has('panorama3') ? ' is-invalid' : '' }}" disabled placeholder="Pilih panorama">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                        @if ($errors->has('panorama3'))
                        <span class="invalid-feedback" role="alert">
                            <strong>File panorama harus JPG,PNG,JPEG</strong>
                        </span>
                        @endif
                      </div>
                    </div>
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
