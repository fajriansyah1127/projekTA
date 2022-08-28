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
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active">Data Unit Asuransi</li>
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
                            <a class="btn btn-sm btn-primary" data-toggle="modal" data-target="#staticBackdroptambah">Tambah
                                Unit Asuransi</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive">
                            <table id="exampledokumen1" class="table table-bordered text-nowrap ">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Alamat</th>
                                        <th>kontak</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach ($asuransi as $data)
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $data->nama }}</td>
                                            <td>{{ $data->email }}</td>
                                            <td>{{ $data->alamat }}</td>
                                            <td>{{ $data->kontak }}</td>
                                            <td><span
                                                    class="badge {{ $data->status == 'Tidak Berlaku' ? 'bg-danger' : 'bg-primary' }} col-md">{{ $data->status }}</span>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-warning" data-toggle="modal"
                                                    data-target="#staticBackdrop1{{ $data->id }}">
                                                    Edit
                                                </button>

                                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                                    data-target="#staticBackdropdelete{{ $data->id }}">
                                                    Delete
                                                </button>
                                            </td>
                                    </tr>   @endforeach

                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>

            @foreach ($asuransi as $data)
            <div class="modal fade" id="staticBackdrop1{{ $data->id }}" data-backdrop="static" tabindex="-1"
                role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content bg-default">
                        <div class="modal-header">
                            <h4 class="modal-title" id="staticBackdropLabel">Edit Unit
                                Asuransi</h5>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('asuransi.update', $data->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @method('PUT')
                                {{ csrf_field() }}
                                <label>Nama Asuransi </label>
                                <input type="text" id="nama" name="nama" class="form-control"
                                    placeholder="Masukkan Nama " required value="{{ $data->nama }}">
                                
                                <label>Email Asuransi </label>
                                <input type="email" id="email" name="email" class="form-control"
                                    placeholder="Masukkan Email" required value="{{ $data->email }}">

                                <label>Kontak</label>
                                <input type="tel" id="kontak" name="kontak" class="form-control"
                                    placeholder="Contoh 0542" required value="{{ $data->kontak }}">

                                <label> Alamat </label>
                                <input type="text" id="alamat" name="alamat" class="form-control"
                                    placeholder="Masukkan Alamat"required value="{{ $data->alamat }}">

                                <label> Status </label>
                                <select id="disabledSelect" name="status"
                                    class="form-control "
                                    value="{{ $data->status }}">
                                    <option value="Berlaku" {{ $data->status == 'Berlaku' ? 'selected' : '' }}>
                                        Berlaku </option>
                                    <option value="Tidak Berlaku" {{ $data->status == 'Tidak Berlaku' ? 'selected' : '' }}>
                                        Tidak Berlaku </option>
                                </select>
                        </div>

                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="staticBackdropdelete{{ $data->id }}" data-backdrop="static">
                <div class="modal-dialog">
                    <div class="modal-content bg-default">
                        <div class="modal-body">
                            Apakah anda yakin menghapus {{ $data->nama }} ?
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn  btn-sm btn-primary" data-dismiss="modal">Close</button>
                            <form action="{{ route('asuransi.destroy', $data->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            <div class="modal fade" id="staticBackdroptambah" data-backdrop="static" tabindex="-1" role="dialog"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content bg-default">
                        <div class="modal-header">
                            <h4 class="modal-title">Tambah Unit Asuransi</h4>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('asuransi.store') }}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <label>Nama Asuransi </label>

                                <input type="text" id="nama" name="nama_asuransi" class="form-control"
                                    placeholder="Masukkan Nama "required>
                                <div class="text-danger">
                                    {{-- @error('nama_asuransi')
                                        {{ $message }}
                                    @enderror --}}
                                </div>

                                <label>Email Asuransi </label>
                                <input type="email" name="email_asuransi" class="form-control"
                                    placeholder="Masukkan Email" required>
                                <div class="text-danger">
                                    {{-- @error('email_asuransi')
                                        {{ $message }}
                                    @enderror --}}
                                </div>

                                <label>Kontak</label>
                                <input type="tel" name="kontak_asuransi" class="form-control"
                                    placeholder="Masukkan Kontak" required>
                                <div class="text-danger">
                                    {{-- @error('kontak_asuransi')
                                        {{ $message }}
                                    @enderror --}}
                                </div>

                                <label> Alamat </label>
                                <input type="text" id="alamat" name="alamat_asuransi" class="form-control"
                                    placeholder="Masukkan Alamat"required>
                                <div class="text-danger">
                                    {{-- @error('alamat_asuransi')
                                        {{ $message }}
                                    @enderror --}}
                                </div>

                                <label> Status </label>
                                <select id="disabledSelect" name="status_asuransi"
                                    class="form-control  " value="">
                                    <option value="" selected disabled> Pilih Status </option>
                                    <option value="Berlaku">Berlaku
                                    </option>
                                    <option value="Tidak Berlaku">Tidak Berlaku </option>
                                </select>
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
