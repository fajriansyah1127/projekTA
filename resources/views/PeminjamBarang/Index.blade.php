@extends('layout.layout')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Data Peminjam Barang</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active">Data Peminjam Barang</li>
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
                            {{-- <a class="btn btn-sm btn-primary" href="{{ route('peminjam.create') }}">Tambah Data Peminjam</a> --}}
                            <a class="btn btn-sm btn-primary" data-toggle="modal" data-target="#staticBackdroptambah">Tambah
                                Data Peminjam Barang</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive">
                            <table id="exampledokumen1" class="table table-bordered text-nowrap ">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Peminjam</th>
                                        <th>Nama Barang</th>
                                        <th>Keperluan</th>
                                        <th>Tanggal Pinjam</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach ($peminjambarang as $data) 
                                            <td>{{$loop->iteration }}</td>
                                            <td>{{$data->nama_peminjam }}</td>
                                            <td>{{$data->stok->nama_barang}}</td>
                                            <td>{{$data->keperluan }}</td>
                                            <td>{{$data->tanggal_pinjam }}</td>
                                            <td>
                                                <button type="button" id="id" class="btn btn-sm btn-warning"
                                                    data-toggle="modal"
                                                    data-target="#staticBackdropedit{{$data->id}}">
                                                    Edit
                                                </button>
                                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                                    data-target="#staticBackdropdelete{{$data->id}}">
                                                    Delete
                                                </button>
                                                
                                            </td>
                                            <div class="modal fade" id="staticBackdropdelete{{$data->id}}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content bg-default">
                                                        <div class="modal-body">
                                                            Apakah anda yakin menghapus {{$data->nama_peminjam }} ?
                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn  btn-sm btn-primary"
                                                                data-dismiss="modal">Close</button>
                                                            <form action="{{ route('peminjambarang.destroy', $data->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="btn btn-sm btn-danger">Delete</button>
                                                            </form>
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
            </div>
            
        @foreach ($peminjambarang as $data) 
        <div class="modal fade" id="staticBackdropedit{{$data->id}}" data-backdrop="static">
            <div class="modal-dialog">
                <div class="modal-content bg-default">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Peminjam</h4>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('peminjambarang.update', $data->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @method('PUT')
                            {{ csrf_field() }}
                            <label for="Judul">Nama Peminjam </label>
                            <input type="text" name="nama_peminjam" class="form-control" value="{{ $data->nama_peminjam }}"
                                placeholder="Masukkan Nama "required>

                                <label>Nama Barang </label>
                             <select id="disabledSelect" name="stok_id"
                                class="form-control select2"
                                style="width: 100%;" value="{{ $data->stok_id }}" required>
                                <option value="" selected disabled> Pilih Barang
                                </option>
                                @foreach ($stok as $datas)
                                @if ($data->stok_id == $datas->id)
                                  <option value="{{ $datas->id }}" selected>{{ $datas->nama_barang }} </option>
                                    @else
                                        <option value="{{ $datas->id }}">{{ $datas->nama_barang}} 
                                        </option>
                                    @endif
                                @endforeach 
                            </select>

                            <label>Keperluan </label>
                            <input type="text"  name="keperluan" class="form-control" value="{{ $data->keperluan }}"
                                required>

                            <label>Tanggal Pinjam</label>
                            <input type="date" id="date" name="tanggal_pinjam" class="form-control" value="{{ $data->tanggal_pinjam }}"
                                required>

                            <div class="modal-footer justify-content-between">

                                <button type="button" class="btn btn-sm btn-danger"
                                    data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
        @endforeach

            <div class="modal fade" id="staticBackdroptambah" data-backdrop="static">
                <div class="modal-dialog">
                    <div class="modal-content bg-default">
                        <div class="modal-header">
                            <h4 class="modal-title">Tambah Peminjam Barang</h4>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('peminjambarang.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <label for="Judul">Nama Peminjam </label>
                                <input type="text" name="Nama_peminjam" class="form-control"
                                    placeholder="Masukkan Nama "required>
                                    
                                <label for="disabledSelect">Nama Barang </label>
                                <select id="disabledSelect" name="Nama_barang"
                                    class="form-control select2"
                                    style="width: 100%; required >
                              <option value="1"
                                    selected="">Pilih Barang</option>
                                    <option value="" selected="">Pilih Barang</option>
                                    @foreach ($stok as $data)
                                        <option value="{{ $data->id }}">{{ $data->nama_barang }}</option>
                                    @endforeach
                                </select>
                                <label>Keperluan </label>
                                <input type="text"  name="Keperluan_pinjam" class="form-control"
                                    required>
                                <label>Tanggal Pinjam</label>
                                <input type="date" id="date" name="Tanggal_pinjam" class="form-control"
                                    required>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-sm btn-danger"
                                        data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> 
            </div> 

        </section>
    </div>
   
           


             

        
    @endsection
