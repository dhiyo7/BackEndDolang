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
                        <input type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}" placeholder="Masukan Judul" required>
                        @if ($errors->has('title'))
                            <span class="invalid-feedback" role="alert">
                                <strong>Judul terlalu pendek</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="category">Kategori</label>
                        <select class="form-control" name="category">
                            <option value="Wisata Alam" {{old('category') == 'Wisata Alam' ? 'selected' : ''}}>Wisata Alam</option>
                            <option value="Wisata Buatan" {{old('category') == 'Wisata Buatan' ? 'selected' : ''}}>Wisata Buatan</option>
                        </select>
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
                    <div class="form-group">
                      <label>Gambar</label>
                      <input type="file" name="image" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info{{ $errors->has('image') ? ' is-invalid' : '' }}" disabled placeholder="Pilih Gambar">
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
                    <div class="form-group">
                      <label>Panorama</label>
                      <input type="file" name="panorama" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info{{ $errors->has('panorama') ? ' is-invalid' : '' }}" disabled placeholder="Pilih panorama">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                        @if ($errors->has('panorama'))
                        <span class="invalid-feedback" role="alert">
                            <strong>File panorama harus JPG,PNG,JPEG</strong>
                        </span>
                        @endif
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                    <a style="text-decoration:none" href="{{route('tour')}}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
@endsection
