@extends('layout.layout')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data Unit Asuransi</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a class="btn btn-sm btn-primary" href="{{ route('asuransi.create') }}">Tambah Unit Asuransi</a></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">

    <div class="row">
      <div class="col-12">
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
              <thead>
                <tr> 
                    <th scope="col">id</th>
                    <th scope="col">nama</th>
                    <th scope="col">alamat</th>
                    <th scope="col">Status</th>
                    <th colspan="col">Action</th>
                  </tr>
              </thead>
              <tbody>
                <tr>@foreach ($asuransi as $data)
                  <td>{{ $data->id }}</td>
                  <td>{{ $data->nama }}</td>
                  <td>{{ $data->alamat }}</td>
                  <td>{{ $data->status }}</td>
                  <td>
                      <a href="{{ route('asuransi.show',$data->id) }}"class="btn btn-sm btn-success">Detail</a>
                      <a href="{{ route('asuransi.edit',$data->id) }}"class="btn btn-sm btn-warning">Edit</a>
                      <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#staticBackdrop{{ $data->id }}">
                        Delete
                      </button>
                    <div class="modal fade" id="staticBackdrop{{ $data->id }}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content bg-danger">
                          <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">{{ $data->nama }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            Ingin menghapus {{ $data->nama }}?
                          </div>
                          <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                            <form action="{{route('asuransi.destroy',$data->id)}}" method="POST">
                            @csrf
                          @method('DELETE')
                        <button type ="submit" class="btn btn-outline-light">Delete</button></form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </td>
                </tr> 
                {{-- <tr>
                  <td>219</td>
                  <td>Alexander Pierce</td>
                  <td>11-7-2014</td>
                  <td><span class="tag tag-warning">Pending</span></td>
                  <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                </tr>
                <tr>
                  <td>657</td>
                  <td>Bob Doe</td>
                  <td>11-7-2014</td>
                  <td><span class="tag tag-primary">Approved</span></td>
                  <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                </tr>
                <tr>
                  <td>175</td>
                  <td>Mike Doe</td>
                  <td>11-7-2014</td>
                  <td><span class="tag tag-danger">Denied</span></td>
                  <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                </tr> --}}
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
   

  </section>

  <!-- /.content -->
</div>
@endsection