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
                            <a class="btn btn-sm btn-primary" data-toggle="modal" data-target="#staticBackdroptambah">Tambah
                                Produk</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body ">
                            <table id="exampledokumen1" class="table table-bordered table-hover ">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Unit Asuransi</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach ($produk as $data)
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $data->nama }}</td>
                                            <td>{{ $data->asuransi->nama }}</td>
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
                                                
                                            </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @foreach ($produk as $data)
                            <div class="modal fade" id="staticBackdropedit{{ $data->id }}" data-backdrop="static" tabindex="-1" role="dialog"
                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content bg-default">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Edit Produk</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('produk.update', $data->id) }}" method="POST">
                                                @method('PUT')
                                                {{ csrf_field() }}

                                                <label>Nama Produk </label>
                                                <input type="text" id="nama" name="Nama" class="form-control"
                                                    placeholder="Masukkan Nama" required value="{{ $data->nama }}">

                                                <label>Unit Asuransi</label>
                                                <select id="disabledSelect" name="Asuransi"
                                                    class="form-control select2 "
                                                    style="width: 100%;" value="{{ $data->asuransi->id }}" required>
                                                    <option value="" selected disabled> Pilih Produk dan Asuransi
                                                    </option>
                                                    @foreach ($asuransi as $datas)
                                                        @if ($data->asuransi->id == $datas->id)
                                                            <option value="{{ $datas->id }}" selected>
                                                                {{ $datas->nama }} </option>
                                                        @else
                                                            <option value="{{ $datas->id }}">{{ $datas->nama }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                                <br />
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-sm btn-danger"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                                                </div>
                                        </div>

                                        <!-- bagian submit -->

                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="staticBackdropdelete{{ $data->id }}"
                                data-backdrop="static" tabindex="-1" role="dialog"
                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content bg-default">
                                        <div class="modal-body">
                                            Apakah anda yakin menghapus {{ $data->nama }} ?
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn  btn-sm btn-primary"
                                                data-dismiss="modal">Close</button>
                                            <form action="{{ route('produk.destroy', $data->id) }}"
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

                        @endforeach
                        <!-- /.card-body -->
                        <!-- /.content -->
                        <div class="modal fade" id="staticBackdroptambah" data-backdrop="static">
                            <div class="modal-dialog">
                                <div class="modal-content bg-default">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Tambah Produk</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('produk.store') }}" method="POST">
                                            {{ csrf_field() }}

                                            <label>Nama Produk </label>
                                            <input type="text" id="nama" name="nama_produk" class="form-control"
                                                placeholder="Masukkan Nama "required>
                                            {{-- <div class="text-danger mt-2">
                                                @error('nama_produk')
                                                    {{ $message }}
                                                @enderror
                                            </div> --}}

                                            <label>Unit Asuransi</label>

                                            <select id="disabledSelect" name="asuransi_produk"
                                                class="form-control select2"
                                                style="width: 100%;">
                                                <option value="" selected disabled> Pilih Asuransi
                                                </option>
                                                @foreach ($asuransi as $data)
                                                    <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                                @endforeach
                                            </select>


                                            <br />
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-sm btn-danger"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                                            </div>
                                    </div>

                                    </form>
                                </div>
                            </div>
                        </div>
        </section>
    </div>
@endsection
