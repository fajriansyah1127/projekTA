@extends('layout.layout')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Produk</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Data Produk</li>
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
          <div class="card">
            <div class="card-header">
              <a class="btn btn-sm btn-primary" href="{{ route('produk.create') }}">Tambah Produk</a>
              </div>
            <!-- /.card-header -->
            <div class="card-body ">
              <table id="example2" class="table table-bordered table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Unit Asuransi</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>@foreach($produk as $data)
                    <td>{{ $loop->iteration}}</td>
                    <td>{{ $data->nama }}</td>
                    <td>{{ $data->asuransi->nama }}</td>
                    <td>
                      {{-- <a href="{{ route('produk.edit', $data->id) }}"class="btn btn-sm btn-warning">Edit</a> --}}
                      <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#staticBackdrop1{{ $data->id }}">
                        Edit
                      </button>
                      <div class="modal fade" id="staticBackdrop1{{ $data->id }}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content bg-default">
                            {{-- <div class="modal-header">
                            </div> --}}
                            <div class="modal-body">
                              <form action="{{route('produk.update',$data->id)}}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                {{ csrf_field() }}
                                  <label for="Judul" >Nama Produk </label>
                                       <input type="text" id="nama" name="Nama" class="form-control" placeholder="Masukkan Nama " required value="{{ $data->nama }}">
                                       <div class ="text-danger mt-2">
                                        @error('nama')
                                        {{ $message }}
                                        @enderror
                                      </div>

                               <label for="disabledSelect">Unit Asuransi</label>
                               <select id="disabledSelect" name="Asuransi" class="form-control @error('asuransi') is-invalid @enderror" >
                               @foreach($produk as $data)
                               <option value="{{ $data->id }}">{{ $data->asuransi->nama }}</option>
                               @endforeach
                               </select>
                              
                            </div>
                                <div class="modal-footer justify-content-between">
                                    <!-- bagian submit -->
                                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      

                      <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#staticBackdrop{{ $data->id }}">
                        Delete
                      </button>
                     <div class="modal fade" id="staticBackdrop{{ $data->id }}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content bg-default">
                          <div class="modal-body">
                            Apakah anda yakin menghapus {{ $data->nama }} ?
                          </div>
                          <div class="modal-footer justify-content-between">
                            <button type="button" class="btn  btn-sm btn-danger" data-dismiss="modal">Close</button>
                            <form action="{{route('produk.destroy',$data->id)}}" method="POST">
                            @csrf
                          @method('DELETE')
                        <button type ="submit" class="btn btn-sm btn-primary">Delete</button></form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </td>
                  </tr> @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
  <!-- /.content -->
</section>
</div>
@endsection