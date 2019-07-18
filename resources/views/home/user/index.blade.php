@extends('templates.default')

@section('content')
<div class="card">
  <div class="card-body">
    <h4>Pengguna</h4>
  </div>
</div>
<br>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Data Pengguna</h4>
        <div class="row grid-margin">
          @if(Session::has('message'))
          <div class="col-4">
            <div class="alert alert-success" role="alert">
                <strong>{{Session::get('message')}}</strong>
            </div>
          </div>
          @endif
        </div>
        <div class="row">
          <div class="col-12">
            <div class="table-responsive">
              <table id="order-listing" class="table">
                <thead>
                  <tr class="bg-primary text-white">
                      <th>No</th>
                      <th>Nama</th>
                      <th>Email</th>
                      <th>Alamat</th>
                      <th>Terdaftar</th>
                      <th>Status</th>
                      <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @php($no = 1)
                  @foreach($users as $user)
                  <tr>
                      <td>{{$no}}</td>
                      <td>{{$user->name}}</td>
                      <td>{{$user->email}}</td>
                      <td>{{$user->address}}</td>
                      <td>{{$user->created_at->diffForHumans()}}</td>
                      <td>
                        @if($user->status)
                        <label class="badge badge-success text-white">Aktif</label>
                        @else
                        <label class="badge badge-danger text-white">Non Aktif</label>
                        @endif
                      </td>
                      <td width="20%" class="text-right">
                        <button class="btn btn-light" data-toggle="modal" data-target="#show{{$user->id}}">
                          <i class="mdi mdi-eye text-primary"></i>
                        </button>
                        <button class="btn btn-light" onclick="window.location='{{route("user.edit", $user)}}'">
                          <i class="mdi mdi-pencil text-warning"></i>
                        </button>
                        @if($user->status)
                        <button class="btn btn-light" data-toggle="modal" data-target="#activation{{$user->id}}">
                          <i class="mdi mdi-power text-danger"></i>
                        </button>
                        @else
                        <button class="btn btn-light" data-toggle="modal" data-target="#activation{{$user->id}}">
                          <i class="mdi mdi-power text-success"></i>
                        </button>
                        @endif
                      </td>
                  </tr>
                  <!--Modal Aktifasi  -->
                  <div class="modal fade" id="activation{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel-2">Aktifasi Pengguna</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <p>@if($user->status) Non Aktifkan @else Aktifkan @endif <b>{{$user->name}} ?</b></p>
                        </div>
                        <div class="modal-footer">
                          <form class="" action="{{route('user.activation', $user)}}" method="post">
                            @csrf
                            @method('PATCH')
                            <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
                            @if($user->status)
                            <button type="submit" class="btn btn-danger">Non Aktifkan</button>
                            @else
                            <button type="submit" class="btn btn-success text-white">Aktifkan</button>
                            @endif
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Modal detail pengguna -->
                  <div class="modal fade" id="show{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
                    <div class="modal-dialog" role="document">
      							<div class="card">
      								<div class="card-body text-center">
      									<div class="mb-4">
      										<img src="{{asset('images/'.$user->avatar)}}" class="img-lg rounded-circle mb-2" alt="avatar"/>
      										<h4>{{$user->name}}</h4>
                          <p>{{$user->email}}</p>
      									</div>
      									<p class="mt-4 card-text">
                          {{$user->address}}
      									</p>
                        @if($user->status)
                        <button class="btn btn-success btn-sm mt-3 mb-4">Aktif</button>
                        @else
      									<button class="btn btn-danger btn-sm mt-3 mb-4">Non Aktif</button>
                        @endif
      									<div class="border-top pt-3">
      										<div class="row">
      											<div class="col-6">
      												<h6>Terdaftar</h6>
      												<p>{{$user->created_at->diffForHumans()}}</p>
      											</div>
      											<div class="col-6">
      												<h6>Jumlah Komentar</h6>
      												<p>{{count($user->comments)}}</p>
      											</div>
      										</div>
      									</div>
      								</div>
                    </div>
                  </div>
                  @php($no++)
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
