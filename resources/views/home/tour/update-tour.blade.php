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
                        <label for="category">Kategori</label>
                        <select class="form-control" name="category">
                            @foreach($categories as $category)
                            <option value="{{$category->id}}"
                              {{old('category') == $category->id ? 'selected' : ''}}
                              @if($category->id === $tour->category_id) selected @endif
                              >{{$category->name}}</option>
                            @endforeach
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
                    <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                    <a style="text-decoration:none" href="{{route('tour')}}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
@endsection
