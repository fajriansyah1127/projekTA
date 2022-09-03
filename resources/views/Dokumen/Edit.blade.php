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
                                    <h4 style="text-align:center"><b>UPDATE DOKUMEN </b></h4>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('dokumen.update', $dokuman->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @method('PUT')
                                        {{ csrf_field() }}
                                        <div class="form-group row">
                                            <label for="Judul" class="col-sm-2 col-form-label">Nama </label>
                                            <div class="col-sm-10">
                                                <input type="text" id="nama" name="nama" class="form-control"
                                                    placeholder="Masukkan Nama "required value="{{ $dokuman->nama }}">
                                                <div class="text-danger">
                                                    @error('nama')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="Judul" class="col-sm-2 col-form-label">Nomor Akad </label>
                                            <div class="col-sm-10">
                                                <input type="text" id="nomor" name="nomor_akad" class="form-control"
                                                    placeholder="Masukkan Nomor" required
                                                    value="{{ $dokuman->nomor_akad }}">
                                                <div class="text-danger">
                                                    @error('nomor_akad')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="disabledSelect" class="col-sm-2 col-form-label">Outlet</label>
                                            <div class="col-sm-10">
                                                <select id="disabledSelect" name="outlet_id"
                                                    class="form-control select2 @error('outlet_id') is-invalid @enderror"
                                                    style="width: 100%;" value="{{ $dokuman->outlet }}" required>
                                                    @foreach ($outlet as $data)
                                                        <option value="{{ $data->id }}"
                                                            {{ $dokuman->outlet_id == $data->id ? 'selected' : '' }}>
                                                            {{ $data->nama }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="text-danger">
                                                    @error('outlet_id')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="Kontak" class="col-sm-2 col-form-label">Tanggal</label>
                                            <div class="col-sm-10">
                                                <input type="date" id="tanggal" name="tanggal_klaim"
                                                    class="form-control" required value="{{ $dokuman->tanggal_klaim }}">
                                                <div class="text-danger">
                                                    @error('tanggal_klaim')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="disabledSelect" class="col-sm-2 col-form-label">Produk</label>
                                            <div class="col-sm-10">
                                                <select id="disabledSelect" name="produk_id"
                                                    class="form-control select2 @error('produk_id') is-invalid @enderror"
                                                    value="{{ $dokuman->produk_id }}">
                                                    <option value="" selected="">Pilih Produk dan Asuransi</option>
                                                    @foreach ($dokumen as $data)
                                                        <option value="{{ $data->id }}"
                                                            {{ $dokuman->produk_id == $data->id ? 'selected' : '' }}>
                                                            {{ $data->nama }} || {{ $data->asuransi->nama }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <span class="small text-danger">*Jika tidak ada perubahan pada isi dokumen, harap
                                            dikosongkan</span>
                                        <div class="card-footer text-muted">

                                            <div class="form-group">
                                                <label for="exampleInputFile">File input</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="form-control" id="exampleInputFile"
                                                            name="file">
                                                        <label class="custom-file-label" for="exampleInputFile">Choose
                                                            file</label>
                                                        <div class="text-danger">
                                                            @error('file')
                                                                {{ $message }}
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="{{ asset('filearsip/') }}/{{ $dokuman->file }}" target="_blank">
                                                    Lihat File</a>
                                            </div>
                                        </div>


                                        {{-- <!-- bagian tanggal -->    src="{{asset('filearsip/Fajriansyah_ABCD12345010822.pdf')}}" --}}
                                        {{-- <embed type="application/pdf" src="{{asset('filearsip/Fajriansyah_ABCD12345010822.pdf')}}" width="30px" height="20px"></embed> --}}


                                        <div class="card-footer">

                                            <!-- bagian submit -->

                                            <button type="submit" class="btn btn-success float-right">Submit</button>

                                        </div>

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
