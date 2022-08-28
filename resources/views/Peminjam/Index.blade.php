@extends('layout.layout')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Data Peminjam</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active">Data Peminjam</li>
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
                                Data Peminjam</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive">
                            <table id="exampledatapeminjam" class="table table-bordered text-nowrap ">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Peminjam</th>
                                        <th>Nomor Akad</th>
                                        <th>Nama Nasabah</th>
                                        <th>Tanggal Pinjam</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach ($peminjam as $data)
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $data->nama }}</td>
                                            <td>{{ $data->dokumen->nomor_akad }}</td>
                                            <td>{{ $data->dokumen->nama }}</td>
                                            <td>{{ $data->tanggal }}</td>
                                            <td>
                                                {{-- <a href="{{ route('peminjam.edit', $data->id) }}"class="btn btn-sm btn-warning">Edit</a> --}}
                                                <button type="button" id="id" class="btn btn-sm btn-warning"
                                                    data-toggle="modal"
                                                    data-target="#staticBackdropedit{{ $data->id }}">
                                                    Edit
                                                </button>
                                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                                    data-target="#staticBackdropdelete{{ $data->id }}">
                                                    Delete
                                                </button>
                                                <div class="modal fade" id="staticBackdropdelete{{ $data->id }}">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content bg-default">
                                                            <div class="modal-body">
                                                                Apakah anda yakin menghapus ?
                                                            </div>
                                                            <div class="modal-footer justify-content-between">
                                                                <button type="button" class="btn  btn-sm btn-primary"
                                                                    data-dismiss="modal">Close</button>
                                                                <form action="{{ route('peminjam.destroy', $data->id) }}"
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
            </div>

            @foreach ($peminjam as $data)
                <div class="modal fade" id="staticBackdropedit{{ $data->id }}" data-backdrop="static">
                    <div class="modal-dialog">
                        <div class="modal-content bg-default">
                            <div class="modal-header">
                                <h4 class="modal-title">Edit Peminjam</h4>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('peminjam.edit', $data->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @method('PUT')
                                    {{ csrf_field() }}
                                    <label>Nama Peminjam </label>
                                    <input type="text" name="nama" class="form-control"
                                        placeholder="Masukkan Nama Outlet" value="{{ $data->nama }}"required>

                                    <label>Nomor Akad </label>
                                    <select id="disabledSelect" name="Nomor_akad"
                                    class="form-control select2 "
                                    style="width: 100%;" value="{{ $data->dokumen->id }}" required>
                                    <option value="" selected disabled> Pilih Nomor Akad dan Nama Nasabah
                                    </option>
                                    @foreach ($dokumen as $datas)
                                        @if ($data->dokumen->id == $datas->id)
                                            <option value="{{ $datas->id }}" selected>{{ $datas->nomor_akad }} ||
                                              {{ $datas->nama }} </option>
                                        @else
                                            <option value="{{ $datas->id }}">{{ $data->nomor_akad }} ||
                                              {{ $data->nama }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>

                                    <label>Tanggal Pinjam</label>
                                    <input type="date" id="date" name="Tanggal_pinjam" class="form-control"
                                      value="{{ $data->tanggal }}"  required>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="modal fade" id="staticBackdroptambah" data-backdrop="static">
                <div class="modal-dialog">
                    <div class="modal-content bg-default">
                        <div class="modal-header">
                            <h4 class="modal-title">Tambah Peminjam</h4>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('peminjam.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <label for="Judul">Nama Peminjam </label>
                                <input type="text" name="Nama" class="form-control"
                                    placeholder="Masukkan Nama "required>

                                <label for="disabledSelect">Nomor Akad </label>
                                <select id="disabledSelect" name="Nomor_akad"
                                    class="form-control select2  @error('Nomor_akad') is-invalid @enderror"
                                    style="width: 100%; required >
                              <option value="1"
                                    selected="">Pilih Nomor Akad dan Nama Nasabah</option>
                                    <option value="" selected="">Pilih Nomor Akad dan Nama Nasabah</option>
                                    @foreach ($dokumen as $data)
                                        <option value="{{ $data->id }}">{{ $data->nomor_akad }} ||
                                            {{ $data->nama }}</option>
                                    @endforeach
                                </select>

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
    @endsection
