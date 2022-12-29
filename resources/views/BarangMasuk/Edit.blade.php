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

                        {{-- <!-- membuat form --> @foreach($stok as $barangmasuk) --}}
                        <div class="container">
                            <div class="card mt-2">
                                <div class="card-header">
                                    <h4 style="text-align:center"><b>Edit Data Barang Masuk </b></h4>
                                </div>
                                <div class="card-body">
                                    <!-- membuat formnya -->
                                    <!-- bagian judul -->
                                   
                                    <form action="{{ route('barangmasuk.update',$barangmasuk->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @method('PUT')
                                        {{ csrf_field() }}
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Tanggal Masuk </label>
                                            <div class="col-sm-10">
                                                <input type="date"  name="tanggal_barangmasuk"
                                                    class="form-control" value ="{{$barangmasuk -> tanggal_masuk}}"required>
                                                {{-- <div class="text-danger">
                                                    @error('tanggal_barangmasuk')
                                                        {{ $message }}
                                                    @enderror
                                                </div> --}}
                                            </div>
                                        </div>

                                        

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Kode Barang </label>
                                            <div class="col-sm-10">
                                                <input type="text" name="stok_id" class="form-control"
                                                 value="{{$barangmasuk->stok_id }}" readonly>
                                                {{-- <div class="text-danger">
                                                    @error('nama_barangmasuk')
                                                    {{ $message }}
                                                    @enderror
                                                </div> --}}
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Barang </label>
                                            <div class="col-sm-10">
                                                <input type="text" name="nama" class="form-control"
                                                 value="{{ $barangmasuk->nama }}" readonly>
                                                {{-- <div class="text-danger">
                                                    @error('nama_barangmasuk')
                                                    {{ $message }}
                                                    @enderror
                                                </div> --}}
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Jenis Barang </label>
                                            <div class="col-sm-10">
                                                <input type="text" name="jenis" class="form-control"
                                                 value="{{ $barangmasuk->jenis}}" readonly>
                                                {{-- <div class="text-danger">
                                                    @error('jenis_barangmasuk')
                                                    {{ $message }}
                                                    @enderror
                                                </div> --}}
                                            </div>
                                        </div>
                                        
                                     
                                                <input type="hidden" name="stok_barangmasuk" id="stok" class="form-control"value="{{$barangmasuk->stok->jumlah}}"readonly>
                                               
                                                <input type="hidden" name="jumlah_terlanjurmasuk" value="{{$barangmasuk -> total_barangmasuk}}" id="jumlah_terlanjurmasuk"class="form-control" readonly  >
                                               
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Jumlah</label>
                                            <div class="col-sm-10">
                                                <input type="number" name="total_barangmasuk" value="{{$barangmasuk -> total_barangmasuk}}" id="jumlah_total"class="form-control" min="1" onkeyup="sum()" >
                                                <div class="text-danger">
                                                    @error('total_barangmasuk')
                                                        {{ $message }}
                                                    @enderror
                                                </div> 
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Total Stok</label>
                                            <div class="col-sm-10">
                                                <input type="number" name="jumlah" id="jumlah"class="form-control" value="{{old('jumlah')}}"  min="0" required readonly >
                                                <div class="text-danger">
                                                    @error('jumlah')
                                                        {{ 'Perlu di isi !!' }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Satuan </label>
                                            <div class="col-sm-10">
                                                <input type="text" name="satuan" id="satuan"class="form-control" value="{{$barangmasuk->stok->satuan->nama}}" required readonly >
                                                {{-- <div class="text-danger">
                                                    @error('jenis_barangmasuk')
                                                    {{ $message }}
                                                    @enderror
                                                </div> --}}
                                            </div>
                                        </div>
                                                

                                        <!-- bagian unit -->

                                        <div class="form-group row">
                                            <label  class="col-sm-2 col-form-label">Penerima</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="penerima" value="{{$barangmasuk ->penerima}}"
                                                    class="form-control" required>
                                            </div>
                                        </div>

                                        

<br>
                                    <div class="card-footer text-muted">
                                        <div class="form-group">
                                            <label for="exampleInputFile">Foto input</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="form-control" id="exampleInputFile"
                                                        name="foto" value="{{$barangmasuk ->foto}}" accept="image/png, image/gif, image/jpeg">
                                                    <label class="custom-file-label" for="exampleInputFile">Choose
                                                        Foto</label>
                                                    {{-- <div class="text-danger">
                                                        @error('foto_barangmasuk')
                                                            {{ $message }}
                                                        @enderror
                                                    </div> --}}
                                                </div>
                                            </div>
                                            <a href="{{ asset('foto_barangmasuk/') }}/{{ $barangmasuk->foto }}" target="_blank">
                                                Lihat File</a>
                                        </div>
                                   

                                       

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
            var jumlahterlanjurmasuk = document.getElementById('jumlah_terlanjurmasuk').value;
            var jumlahaslimasuk = document.getElementById('jumlah_total').value;
            var result = parseInt(stok) - parseInt(jumlahterlanjurmasuk) +  parseInt(jumlahaslimasuk);
            if (!isNaN(result)) {
                document.getElementById('jumlah').value = result;
            }
        }
        // function sum() {
        // let stok = document.getElementById('stok').value;
        // let jumlahterlanjurmasuk = document.getElementById('jumlah_terlanjurmasuk').value;
        // let jumlahaslimasuk = document.getElementById('jumlah_total').value;
        // let x = stok - jumlahterlanjurmasuk + jumlahaslimasuk;

        // if (!isNaN(result)) {
        //     document.getElementById("jumlah").value = x
        //     }
        // }
        // function sum() {
        //     var stok = document.getElementById('stok').value;
        //     var jumlahmasuk = document.getElementById('jumlah_total').value;
        //     var result = parseInt(stok) + parseInt(jumlahmasuk);
        //     if (!isNaN(result)) {
        //         document.getElementById('jumlah').value = result;
        //     }
        // }

        </script>
@endsection
