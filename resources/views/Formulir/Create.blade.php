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
                                    <h4 style="text-align:center"><b>TAMBAH FORMULIR </b></h4>
                                </div>
                                <div class="card-body">

                                    <!-- membuat formnya -->
                                    <!-- bagian judul -->

                                    <form action="{{ route('formulirs.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Nama </label>
                                            <div class="col-sm-10">
                                                <input type="text" id="nama" name="nama_formulir"
                                                    class="form-control" placeholder="Masukkan Nama "required value="{{old('nama_formulir')}}">
                                                <div class="text-danger">
                                                    @error('nama_formulir')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                   
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">File input</label>
                                            <div class="col-sm-10">
                                                <input type="file" id="nama" name="file_formulir"
                                                    class="form-control" placeholder="Masukkan Nama " accept="application/pdf" required value="{{old('file_formulir')}}">
                                                <div class="text-danger">
                                                    @error('file_formulir')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                   
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
