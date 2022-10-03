@extends('layout.layout')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data User</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">User</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <!-- /.card -->
        <div class="card">
          <!-- /.card-header -->
          <div class="card-body ">
            <table id="exampledokumen1" class="table table-bordered table-striped">
            {{-- <table class="table  table-hover text-nowrap"> --}}
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Jabatan</th>
                  <th>Role</th>
                  <th> Foto</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <tr>@foreach($user as $data)
                  <td>{{ $loop->iteration}}</td>
                  <td>{{ $data->nama }}</td>
                  <td>{{ $data->jabatan }}</td>
                  <td>{{ $data->role }}</td>
                  <td><img src="{{ url('foto/'.$data->foto) }}" alt="foto" width="100px" ></td>
                  <td>
                      <a href="{{route('user.show',$data->id) }} "class="btn btn-sm btn-success">Detail</a>
                      <a href="{{route('user.edit',$data->id) }}"class="btn btn-sm btn-warning">Edit</a>
                      <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                      data-target="#deleteuser{{$data->id}}">Delete
                      </button>
                    </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.card -->
    </div>
    @foreach($user as $data)
    <div class="modal fade" id="deleteuser{{$data->id}}" data-backdrop="static">
      <div class="modal-dialog">
          <div class="modal-content bg-default">
              <div class="modal-body">
                  Apakah anda yakin menghapus {{ $data->nama }} ?
              </div>
              <div class="modal-footer justify-content-between">
                  <button type="button" class="btn  btn-sm btn-primary" data-dismiss="modal">Close</button>
                  <form action="{{ route('user.destroy', $data->id) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                  </form>
              </div>
          </div>
      </div>
  </div>
  @endforeach
  </div>
</section>

<!-- /.content -->
</div>
@endsection