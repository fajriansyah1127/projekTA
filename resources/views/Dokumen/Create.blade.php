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
                                    <h4 style="text-align:center"><b>TAMBAH DOKUMEN </b></h4>
                                </div>
                                <div class="card-body">

                                    <!-- membuat formnya -->
                                    <!-- bagian judul -->

                                    <form action="{{ route('dokumen.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Nama </label>
                                            <div class="col-sm-10">
                                                <input type="text" id="nama" name="nama_dokumen"
                                                    class="form-control" placeholder="Masukkan Nama "required>
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
                                                    placeholder="Masukkan Nomor Akad" required>
                                                <div class="text-danger">
                                                    @error('nomor_dokumen')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="disabledSelect" class="col-sm-2 col-form-label">Outlet</label>
                                            <div class="col-sm-10">
                                                <select id="disabledSelect" name="outlet_dokumen"
                                                    class="form-control select2 @error('outlet_dokumen') is-invalid @enderror"
                                                    style="width: 100%; required>
                                                    <option value=""
                                                    selected="">Pilih Outlet</option>
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
                                                    class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="disabledSelect" class="col-sm-2 col-form-label">Produk</label>
                                            <div class="col-sm-10">
                                                <select id="disabledSelect" name="produk_dokumen"
                                                    class="form-control select2 @error('produk_dokumen') is-invalid @enderror"
                                                    style="width: 100%; required>
                                                    <option value=""
                                                    selected="">Pilih Produk dan Asuransi</option>
                                                    <option value="" selected>Pilih Produk dan Asuransi</option>
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


                                        {{-- <div class="form-group">
              <label for="exampleFormControlFile1">File</label>
              <input type="file" name="File" class="form-control"  value="{{old('File')}}">
              <div class ="text-danger">
                @error('File')
                {{ $message }}
                @enderror
              </div>
          </div> --}}

                                        <div class="form-group">
                                            <label for="exampleInputFile">File input</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="form-control" id="exampleInputFile"
                                                        name="file_dokumen">
                                                    <label class="custom-file-label" for="exampleInputFile">Choose
                                                        file</label>
                                                    <div class="text-danger">
                                                        @error('file_dokumen')
                                                            {{ $message }}
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <button type="submit" class=" btn btn-success float-right">Submit</button>

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
