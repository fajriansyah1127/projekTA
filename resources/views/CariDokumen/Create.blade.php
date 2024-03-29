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
                                    <h4 style="text-align:center"><b>CARI DOKUMEN </b></h4>
                                </div>
                                <div class="card-body">

                                    <!-- membuat formnya -->
                                    <!-- bagian judul -->

                                    <form action="{{ route('caridokumen.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Nama</label>
                                            <div class="col-sm-10">
                                                <input type="text" id="nama" name="nama_dokumen"
                                                    class="form-control" placeholder="Masukkan Nama " value="{{old('nama_dokumen')}}">
                                                <div class="text-danger">
                                                    @error('nama_dokumen')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Nomor Akad </label>
                                            <div class="col-sm-10">
                                                <input type="text" name="nomor_dokumen" class="form-control"
                                                    placeholder="Masukkan Nomor Akad"  value="{{old('nomor_dokumen')}}">
                                                <div class="text-danger">
                                                    @error('nomor_dokumen')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Outlet</label>
                                            <div class="col-sm-10">
                                                <select id="disabledSelect" name="outlet_dokumen"
                                                    class="form-control select2">
                                                    <option value="" selected disabled>Pilih Outlet</option>
                                                    @foreach ($dokumens as $data)
                                                        <option value="{{ $data->id }}">{{ $data->nama }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <div class="text-danger">
                                                    @error('outlet_dokumen')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <!-- bagian unit -->

                                        <div class="form-group row">
                                            <label for="Kontak" class="col-sm-2 col-form-label">Tanggal</label>
                                            <div class="col-sm-10">
                                                <input type="date" id="tanggal" name="tanggal_dokumen"
                                                    class="form-control" >
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Produk</label>
                                            <div class="col-sm-10">
                                                <select id="disabledSelect" name="produk_dokumen"
                                                    class="form-control select2" >
                                                    <option value="" selected disabled>Pilih Produk dan Asuransi</option>
                                                    @foreach ($dokumen as $data)
                                                        <option value="{{ $data->id }}">{{ $data->nama }} ||
                                                            {{ $data->asuransi->nama }} </option>
                                                    @endforeach
                                                </select>
                                                <div class="text-danger">
                                                    @error('produk_dokumen')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

<br>
                                   
                                   
                                        <br>
                                        
                                        
                                            <button type="submit" class="btn btn-success float-right">Submit</button>
                                     

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
