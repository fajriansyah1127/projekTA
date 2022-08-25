@extends('layout.layout')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dokumen</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <a class="btn btn-sm btn-primary" href="{{ route('dokumen.create') }}">Upload Dokumen</a>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- /.card -->
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th scope="col">id</th>
                      <th scope="col">nama</th>
                      <th scope="col">nomor surat</th>
                      <th scope="col">tanggal surat</th>
                      <th scope="col">produk</th>
                      <th scope="col">asuransi</th>
                      <th scope="col">nama Pengupload</th>
                      <th colspan="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>@foreach($dokumen as $data)
                      <td>{{ $data->id }}</td>
                      <td>{{ $data->nama }}</td>
                      <td>{{ $data->nomor_surat }}</td>
                      <td>{{ $data->tanggal_surat }}</td>
                      <td>{{ $data->produk->nama }}</td>
                      <td>{{ $data->produk->asuransi->nama }}</td>
                      <td>{{ $data->user->nama }}</td>
                      <td>
                          <a href="{{ route('dokumen.show',2) }}"class="btn btn-sm btn-primary">Download</a>
                          <a href="{{ route('dokumen.edit',$data->id) }}"class="btn btn-sm btn-warning">Edit</a>
                          <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#staticBackdrop">
                            Delete
                          </button>
                        </td>
                        <div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content bg-danger">
                              <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel"></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                Ingin menghapus ?
                              </div>
                              <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                                <form action="{{route('dokumen.destroy',$data->id)}}" method="POST">
                                @csrf
                              @method('DELETE')
                            <button type ="submit" class="btn btn-outline-light">Delete</button></form>
                              </div>
                            </div>
                          </div>
                        </div>
                    </tr> 
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
