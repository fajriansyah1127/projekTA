@extends('layout.layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-md-12 p-5 pt-2">

                        <!-- membuat form -->
                        <div class="container">
                            <div class="card mt-2">
                                <div class="card-header">
                                    <h4 style="text-align:center"><b>Tambah Barang Masuk </b></h4>
                                </div>
                                <div class="card-body">

                                    <!-- membuat formnya -->
                                    <!-- bagian judul -->

                                    <form action="{{ route('barangmasuk.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Nama </label>
                                            <div class="col-sm-10">
                                                <input type="text"  name="nama_barangmasuk"
                                                    class="form-control" placeholder="Masukkan Nama "required>
                                                <div class="text-danger">
                                                    @error('nama_barangmasuk')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Jenis </label>
                                            <div class="col-sm-10">
                                                <input type="text" name="jenis_barangmasuk" class="form-control"
                                                placeholder="Masukkan Jenis" required>
                                                <div class="text-danger">
                                                    @error('jenis_barangmasuk')
                                                    {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Jumlah</label>
                                            <div class="col-sm-10">
                                                <input type="number" name="jumlah_barangmasuk" class="form-control @error('jumlah_barangmasuk') is-invalid @enderror">
                                                <div class="text-danger">
                                                    @error('jumlah_barangmasuk')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Satuan </label>
                                            <div class="col-sm-10">
                                                <input type="text" name="satuan_barangmasuk" class="form-control"
                                                placeholder="Masukkan Jenis" required>
                                                <div class="text-danger">
                                                    @error('jenis_barangmasuk')
                                                    {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Satuan</label>
                                            <div class="col-sm-10">
                                                <select id="disabledSelect" name="satuan_barangmasuk"
                                                    class="form-control select2"required>
                                                    <option value="" selected disabled>Satuan</option>
                                                    @foreach ($satuan as $data)
                                                        <option value="{{ $data->id }}">{{ $data->nama }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <div class="text-danger">
                                                    @error('satuan_barangmasuk')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <!-- bagian unit -->

                                        <div class="form-group row">
                                            <label for="Kontak" class="col-sm-2 col-form-label">Tanggal</label>
                                            <div class="col-sm-10">
                                                <input type="date" id="tanggal" name="tanggal_barangmasuk"
                                                    class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Produk</label>
                                            <div class="col-sm-10">
                                                <select id="disabledSelect" name="produk_dokumen"
                                                    class="form-control select2 "
                                                    style="width: 100%; required>
                                                    <option value=""
                                                    selected="">Pilih Produk dan Asuransi</option>
                                                    <option value="" selected disabled>Pilih Produk dan Asuransi</option>
                                                    {{-- @foreach ($satuan as $data)
                                                        <option value="{{ $data->id }}">{{ $data->nama }} ||
                                                            {{ $data->asuransi->nama }} </option>
                                                    @endforeach --}}
                                                </select>
                                                <div class="text-danger">
                                                    @error('produk_dokumen')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

<br>
                                    <div class="card-footer text-muted">
                                        <div class="form-group">
                                            <label for="exampleInputFile">Foto input</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="form-control" id="exampleInputFile"
                                                        name="file_dokumen">
                                                    <label class="custom-file-label" for="exampleInputFile">Choose
                                                        Foto</label>
                                                    <div class="text-danger">
                                                        @error('file_dokumen')
                                                            {{ $message }}
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                        <div class="card-footer">

                                            <!-- bagian submit -->

                                            <button type="submit" class="btn btn-success float-right">Submit</button>

                                        </div>

                                        <!-- bagian tanggal -->
                                    </form>

                                    <!-- ./col -->

                                    <!-- /.row -->
                                    <!-- Main row -->

                                    <!-- /.row (main row) -->
                                </div><!-- /.container-fluid -->

        </section>

        <!-- /.content -->
    </div>
@endsection
