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
                <h4 class="card-title">Form edit wisata</h4>
                <form class="forms-sample" action="{{route('tour.update', $tour)}}" method="post" enctype="multipart/form-data">
                  @csrf
              {{ method_field('PATCH') }}
                    <div class="form-group">
                        <label for="title">Judul</label>
                        <input type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{old('title',$tour->title)}}" placeholder="Masukan Judul">
                        @if ($errors->has('title'))
                            <span class="invalid-feedback" role="alert">
                                <strong>Judul terlalu pendek</strong>
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
                        <input type="text" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" value="{{old('price',substr($tour->price,4))}}" name="price" id="price" placeholder="Masukan Biaya" required>
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
                              >Bukit</option>
                            <option value="Pantai"
                              {{old('category') == 'Pantai' ? 'selected' : ''}}
                              @if($tour->category === 'Pantai') selected @endif
                              >Bukit</option>
                            <option value="Taman"
                              {{old('category') == 'Taman' ? 'selected' : ''}}
                              @if($tour->category === 'Taman') selected @endif
                              >Bukit</option>
                        </select>
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
                    <div class="d-flex justify-content-start align-items-start mb-3">
                        <div class="col-4 form-group">
                            <img src="{{ asset('images/'.$tour->image) }}" alt="sample" class="rounded mw-100"/>
                            <p class="text-info mt-3">Gambar sebelumnya</p>
                        </div>
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
                            <strong>File gambar harus JPG,PNG,JPEG dan harus kurang dari 2MB</strong>
                        </span>
                        @endif
                      </div>
                    </div>
                    <div class="d-flex justify-content-start align-items-start mb-3">
                        <div class="col-4 form-group">
                            <img src="{{ asset('images/'.$tour->panorama) }}" alt="sample" class="rounded mw-100"/>
                            <p class="text-info mt-3">Panorama sebelumnya</p>
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
