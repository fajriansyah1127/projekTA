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
                                    <h4 style="text-align:center"><b>UPDATE FORMULIR </b></h4>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('formulirs.update', $formulir->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @method('PUT')
                                        {{ csrf_field() }}
                                        <div class="form-group row">
                                            <label  class="col-sm-2 col-form-label">Nama </label>
                                            <div class="col-sm-10">
                                                <input type="text" id="nama" name="nama" class="form-control"
                                                    placeholder="Masukkan Nama "required value="{{ $formulir->nama }}">
                                                <div class="text-danger">
                                                    @error('nama')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <span class="small text-danger">*Jika tidak ada perubahan pada isi formulir, harap
                                            dikosongkan</span>
                                        

                                            
                                        
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">File input</label>
                                                <div class="col-sm-10">
                                                    <input type="file" id="nama" name="file_formulir"
                                                        class="form-control" placeholder="Masukkan Nama " value="{{old('file_formulir')}}" accept="application/pdf">
                                                    <div class="text-danger">
                                                        @error('file')
                                                            {{ $message }}
                                                        @enderror
                                                    </div>
                                                </div>
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
