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

                        {{-- <!-- membuat form --> @foreach($stok as $barangkeluar) --}}
                        <div class="container">
                            <div class="card mt-2">
                                <div class="card-header">
                                    <h4 style="text-align:center"><b>Edit Data Barang Keluar </b></h4>
                                </div>
                                <div class="card-body">

                                    <!-- membuat formnya -->
                                    <!-- bagian judul -->
                                   
                                    <form action="{{ route('barangkeluar.update',$barangkeluar->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @method('PUT')
                                        {{ csrf_field() }}
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Tanggal Keluar </label>
                                            <div class="col-sm-10">
                                                <input type="date"  name="tanggal_keluar"
                                                    class="form-control" value ="{{$barangkeluar -> tanggal_keluar}}"required>
                                                <div class="text-danger">
                                                    @error('tanggal_keluar')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Kode Barang </label>
                                            <div class="col-sm-10">
                                                <input type="text" name="stok_id" class="form-control"
                                                 value="{{$barangkeluar->stok_id }}" readonly>
                                                <div class="text-danger">
                                                    @error('stok_id')
                                                    {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Barang </label>
                                            <div class="col-sm-10">
                                                <input type="text" name="nama" class="form-control"
                                                 value="{{ $barangkeluar->nama }}" readonly>
                                                <div class="text-danger">
                                                    @error('nama')
                                                    {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Jenis Barang </label>
                                            <div class="col-sm-10">
                                                <input type="text" name="jenis" class="form-control"
                                                 value="{{ $barangkeluar->jenis}}" readonly>
                                                <div class="text-danger">
                                                    @error('jenis')
                                                    {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                        {{-- <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Stok</label>
                                            <div class="col-sm-10">
                                                <input type="number" name="stok_barangkeluar" id="stok" class="form-control"
                                                value="{{ $barangkeluar->jumlah }}" readonly>
                                                 <div class="text-danger">
                                                    @error('jenis_barangkeluar')
                                                    {{ $message }}
                                                    @enderror
                                                </div> 
                                            </div>
                                        </div>  --}}

                                        {{-- <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Jumlah</label>
                                            <div class="col-sm-10">
                                                <input type="number" name="total_barangkeluar" id="jumlah_total" class="form-control @error('jumlah') is-invalid @enderror" value="{{$barangkeluar -> total_barangkeluar}}" onkeyup="sum()">
                                                <div class="text-danger">
                                                    @error('jumlah')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div> --}}

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Jumlah</label>
                                            <div class="col-sm-10">
                                                <input type="number" name="jumlah" value="{{$barangkeluar -> total_barangkeluar}}" id="jumlah"class="form-control" readonly >
                                                <div class="text-danger">
                                                    @error('total_barangkeluar')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Satuan </label>
                                            <div class="col-sm-10">
                                                <input type="text" name="satuan" class="form-control"
                                                placeholder="{{ $barangkeluar->satuan}}" value="{{ $barangkeluar->satuan}}" readonly>
                                                <div class="text-danger">
                                                    @error('jenis_barangkeluar')
                                                    {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <!-- bagian unit -->

                                        <div class="form-group row">
                                            <label  class="col-sm-2 col-form-label">Pengambil</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="pengambil" value="{{$barangkeluar ->pengambil}}"
                                                    class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="card-footer text-muted">
                                            <div class="form-group">
                                                <label for="exampleInputFile">Foto Input</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="form-control" id="exampleInputFile"
                                                            name="foto" accept="image/png, image/gif, image/jpeg"required>
                                                        <label class="custom-file-label" for="exampleInputFile">Choose
                                                            Foto</label>
                                                        </div>
                                                    </div>
                                                    <div class="text-danger">
                                                        @error('foto')
                                                            {{ $message }}
                                                        @enderror
                                                    </div>
                                                    <a href="{{ asset('foto_barangkeluar/') }}/{{ $barangkeluar->foto }}" target="_blank">
                                                        Lihat File</a>
                                            </div>
                                    
                                        

<br>
                                        

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
    <script>
        function sum() {
            var stok = document.getElementById('stok').value;
            var jumlahkeluar = document.getElementById('jumlah_total').value;
            var result = parseInt(stok) + parseInt(jumlahkeluar);
            if (!isNaN(result)) {
                document.getElementById('jumlah').value = result;
            }
        }
        </script>
@endsection
