@extends('templates.default')

@section('content')
<div class="card">
  <div class="card-body">
    <h4>Edit Pengguna</h4>
  </div>
</div>
<br>

<div class="row">
    <div class="col-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Data user {{$user->name}}</h4>
          <form class="forms-sample" method="post" action="{{route('user.update', $user)}}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group">
              <label>Nama</label>
              <input type="text" name="name" value="{{old('name', $user->name)}}" class="form-control  @error('name') is-invalid @enderror" placeholder="Nama">
              @error('name')
                  <span class="invalid-feedback" role="alert">
                      <strong>Nama terlalu pendek</strong>
                  </span>
              @enderror
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email', $user->email)}}" placeholder="Email">
              @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>Email sudah terdaftar</strong>
                  </span>
              @enderror
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
              @error('password')
                  <span class="invalid-feedback" role="alert">
                      <strong>Password minimal 6 karakter</strong>
                  </span>
              @enderror
            </div>
            <div class="form-group">
              <label>Alamat</label>
              <textarea name="address" class="form-control @error('address') is-invalid @enderror" rows="4" placeholder="Alamat">{{old('address', $user->address)}}</textarea>
              @error('address')
                  <span class="invalid-feedback" role="alert">
                      <strong>Alamat terlalu pendek</strong>
                  </span>
              @enderror
            </div>
            <div class="form-group">
              <img src="{{asset('images/'.$user->avatar)}}" class="img-lg rounded-circle mb-2" alt="avatar">
            </div>
            <div class="form-group">
              <label>Avatar</label>
              <input type="file" name="avatar" class="file-upload-default">
              <div class="input-group col-xs-12">
                <input type="text" class="form-control file-upload-info @error('avatar') is-invalid @enderror" disabled placeholder="Upload Image">
                <span class="input-group-append">
                  <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                </span>
                @error('avatar')
                    <span class="invalid-feedback" role="alert">
                        <strong>Avatar harus jpg,jpeg,png max 2MB</strong>
                    </span>
                @enderror
              </div>
            </div>
            <button type="button" onclick="window.location='{{route("user")}}'" class="btn btn-light">Batal</button>
            <button type="submit" class="btn btn-primary mr-2">Simpan</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
