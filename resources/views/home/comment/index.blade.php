@extends('templates.default')

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Data Komentar</h4>
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
                        <th>Pengguna</th>
                        <th>Komentar</th>
                        <th>Tanggal/Waktu</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php($no = 1)
                    @foreach($comments as $comment)
                    <tr>
                        <td width="1%">{{$no}}</td>
                        <td width="20%">{{$comment->user->name}}</td>
                        <td>{{$comment->message}}</td>
                        <td width="18%">{{$comment->created_at->format('d M Y')}} / {{$comment->created_at->format('H:i')}} WIB</td>

                        <td width="5%" class="text-right">
                          <button class="btn btn-light" data-toggle="modal" data-target="#delete{{$comment->id}}">
                            <i class="mdi mdi-comment-remove-outline text-danger"></i>
                          </button>
                        </td>
                    </tr>
                    <!--Modal Hapus Komentar  -->
                    <div class="modal fade" id="delete{{$comment->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel-2">Hapus Komentar</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <p>Hapus komentar dari pengguna <b>{{$comment->user->name}} ?</b></p>
                          </div>
                          <div class="modal-footer">
                            <form class="" action="{{route('comment.destroy', $comment)}}" method="post">
                              @csrf
                              <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
                              <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
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
