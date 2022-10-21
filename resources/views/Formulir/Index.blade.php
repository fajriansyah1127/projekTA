@extends('layout.layout')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Formulir</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
             <li class="breadcrumb-item active">Formulir</li>
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
              <div class="card-header">
                {{-- <a class="btn btn-sm btn-primary" data-toggle="modal" data-target="#staticBackdroptambah">Tambah
                  Formulir</a> --}}
                  <a class="btn btn-sm btn-primary" href="{{ route('formulirs.create') }}">Tambah Formulir</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive">
                <table id="exampledokumen1" class="table table-bordered text-nowrap">
                  <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Nama</th>
                      <th colspan="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>@foreach($formulir as $data)
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $data->nama }}</td>
                      <td>
                          <a href="{{ route('formulirs.show',$data->file) }}" target ="_blank"class="btn btn-sm btn-primary">Download</a>
                          <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#staticBackdropdelete{{$data->id}}">
                            Delete
                          </button>
                        </td>
                    </tr> 
                    @endforeach
                  </tbody>
                </table>
                @foreach($formulir as $data)
                <div class="modal fade" id="staticBackdropdelete{{$data->id}}">
                  <div class="modal-dialog" >
                    <div class="modal-content bg-default">
                      <div class="modal-body">
                        Apakah anda yakin menghapus {{$data->nama}} ?
                      </div>
                      <div class="modal-footer justify-content-between">
                        <button type="button" class="btn  btn-sm btn-primary" data-dismiss="modal">Close</button>
                        <form action="{{route('dokumen.destroy',$data->id)}}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button type ="submit" class="btn btn-sm btn-danger">Delete</button></form>
                        </div>
                      </div>
                    </div>
                  </div>@endforeach
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
  <div class="modal fade" id="staticBackdroptambah" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Formulir</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('formulirs.store') }}" method="POST">
                    {{ csrf_field() }}
                    <label>Nama Formulir </label>
                    <input type="text" id="nama" name="nama_formulir" class="form-control"
                        placeholder="Masukkan Nama Formulir" required>
                    <label>Formulir </label> 
                    <label for="exampleInputFile">File input</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="form-control" id="exampleInputFile"
                                                        name="file_dokumen" required>
                                                        <div class="text-danger">
                                                            @error('file_dokumen')
                                                                {{ $message }}
                                                            @enderror
                                                        </div>
                                                    <label class="custom-file-label" for="exampleInputFile">Choose
                                                        file</label>
                                                    </div>
                                            </div>
            </div>
            <div class="modal-footer justify-content-between">

                <button type="button" class="btn btn-sm btn-danger"
                    data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>
  
@endsection
