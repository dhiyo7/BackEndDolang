@extends('templates.default')

@section('content')
<div class="card">
  <div class="card-body">
    <h4>Pengguna</h4>
    <div class="text-right" style="margin-button:10px">
      <!-- <a href="{{ route('tour.create') }}" class="btn btn-primary">Tambah</a> -->
    </div>
  </div>
</div>
<br>
<div class="row">
             <div class="col-12">
               <div class="card">
                 <div class="card-header">
                   <h4>Basic DataTables</h4>
                 </div>
                 <div class="card-body">
                   <div class="table-responsive">
                     <table class="table table-striped" id="table-1">
                       <thead>
                         <tr>
                           <th class="text-center">
                             #
                           </th>
                           <th>Task Name</th>
                           <th>Progress</th>
                           <th>Members</th>
                           <th>Due Date</th>
                           <th>Status</th>
                           <th>Action</th>
                         </tr>
                       </thead>
                       <tbody>
                         <tr>
                           <td>
                             1
                           </td>
                           <td>Create a mobile app</td>
                           <td class="align-middle">
                             <div class="progress" data-height="4" data-toggle="tooltip" title="100%">
                               <div class="progress-bar bg-success" data-width="100%"></div>
                             </div>
                           </td>
                           <td>
                             <img alt="image" src="../dist/img/avatar/avatar-5.png" class="rounded-circle" width="35" data-toggle="tooltip" title="Wildan Ahdian">
                           </td>
                           <td>2018-01-20</td>
                           <td><div class="badge badge-success">Completed</div></td>
                           <td><a href="#" class="btn btn-secondary">Detail</a></td>
                         </tr>
                       </tbody>
                     </table>
                   </div>
                 </div>
               </div>
             </div>
           </div>


@endsection
