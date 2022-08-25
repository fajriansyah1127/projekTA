@extends('layout.layout')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Outlet</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Data Outlet</li>
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
                                Outlet</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body ">
                            <table id="exampledokumen1"class="table table-bordered table-hover ">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Outlet</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach ($outlet as $data)
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $data->nama }}</td>
                                            <td>
                                                <button type="button" id="id" class="btn btn-sm btn-warning"
                                                    data-toggle="modal"
                                                    data-target="#staticBackdropedit{{ $data->id }}">
                                                    Edit
                                                </button>
                                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                                    data-target="#staticBackdropdelete{{ $data->id }}">
                                                    Delete
                                                </button>
                                                <div class="modal fade" id="staticBackdropdelete{{ $data->id }}"
                                                    data-backdrop="static" tabindex="-1" role="dialog"
                                                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content bg-default">
                                                            <div class="modal-body">
                                                                Apaknah anda yakin menghapus {{ $data->nama }} ?
                                                            </div>
                                                            <div class="modal-footer justify-content-between">
                                                                <button type="button" class="btn  btn-sm btn-primary"
                                                                    data-dismiss="modal">Close</button>
                                                                <form action="{{ route('outlet.destroy', $data->id) }}"
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
                        @foreach ($outlet as $data)
                            <div class="modal fade" id="staticBackdropedit{{ $data->id }}" data-backdrop="static">
                                <div class="modal-dialog">
                                    <div class="modal-content bg-default">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Edit Outlet</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('outlet.update', $data->id) }}" method="POST"
                                                enctype="multipart/form-data">
                                                @method('PUT')
                                                {{ csrf_field() }}
                                                <label>Nama Outlet </label>
                                                <input type="text" name="nama" class="form-control"
                                                    placeholder="Masukkan Nama Outlet" value="{{ $data->nama }}"
                                                    required>
                                                {{-- <div class="text-danger mt-2">
                                                    @error('nama')
                                                        {{ $message }}
                                                    @enderror
                                                </div> --}}
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
                        @endforeach
                        <!-- /.card-body -->

                        <div class="modal fade" id="staticBackdroptambah" data-backdrop="static">
                            <div class="modal-dialog">
                                <div class="modal-content bg-default">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Tambah Outlet</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('outlet.store') }}" method="POST">
                                            {{ csrf_field() }}
                                            <label>Nama Outlet </label>
                                            <input type="text" id="nama" name="nama_outlet" class="form-control"
                                                placeholder="Masukkan Nama Outlet" required>
                                            <div class="text-danger mt-2">
                                                {{-- @error('nama_outlet')
                                                    {{ $message }}
                                                @enderror --}}
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
                        <!-- /.content -->
        </section>
    </div>
@endsection
