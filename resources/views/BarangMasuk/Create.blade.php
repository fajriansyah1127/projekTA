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

                        {{-- <!-- membuat form --> @foreach($stok as $data) --}}
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
                                            <label class="col-sm-2 col-form-label">Tanggal Masuk </label>
                                            <div class="col-sm-10">
                                                <input type="date"  name="tanggal_barangmasuk"
                                                    class="form-control"required  value="{{old('tanggal_barangmasuk')}}" >
                                                <div class="text-danger">
                                                    @error('tanggal_barangmasuk')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        @foreach($stok as $data)

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Kode Barang </label>
                                            <div class="col-sm-10">
                                                <input type="text" name="kodebarang_barangmasuk" class="form-control"
                                                 value="{{ $data->id }}" readonly>
                                                <div class="text-danger">
                                                    @error('nama_barangmasuk')
                                                    {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Barang </label>
                                            <div class="col-sm-10">
                                                <input type="text" name="nama_barangmasuk" class="form-control"
                                                 value="{{ $data->nama_barang }}" readonly>
                                                <div class="text-danger">
                                                    @error('nama_barangmasuk')
                                                    {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Jenis Barang </label>
                                            <div class="col-sm-10">
                                                <input type="text" name="jenis_barangmasuk" class="form-control"
                                                 value="{{ $data->jenis_barang }}" readonly>
                                                <div class="text-danger">
                                                    @error('jenis_barangmasuk')
                                                    {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Stok</label>
                                            <div class="col-sm-10">
                                                <input type="number" name="stok_barangmasuk" id="stok" class="form-control"
                                                value="{{ $data->jumlah }}" readonly>
                                                {{-- <div class="text-danger">
                                                    @error('jenis_barangmasuk')
                                                    {{ $message }}
                                                    @enderror
                                                </div> --}}
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Jumlah</label>
                                            <div class="col-sm-10">
                                                <input type="number" name="total_barangmasuk" id="jumlah_total" class="form-control @error('jumlah') is-invalid @enderror" value="{{old('jumlah')}}" required min="1" onkeyup="sum()">
                                                <div class="text-danger">
                                                    @error('jumlah')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Total Stok</label>
                                            <div class="col-sm-10">
                                                <input type="number" name="jumlah" id="jumlah"class="form-control" value="{{old('jumlah')}}"  min="0" readonly >
                                                <div class="text-danger">
                                                    @error('total_barangmasuk')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Satuan </label>
                                            <div class="col-sm-10">
                                                <input type="text" name="satuan" class="form-control"
                                                placeholder="{{ $data->satuan->id}}" value="{{ $data->satuan->nama}}" readonly>
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
                                                <input type="text" name="penerima_barangmasuk" 
                                                    class="form-control"  value="{{old('penerima_barangmasuk')}}"required>
                                            </div>
                                        </div>

                                        

<br>
                                    <div class="card-footer text-muted">
                                        <div class="form-group ">
                                            <label for="exampleInputFile">Foto Input</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="form-control" id="exampleInputFile"
                                                        name="foto_barangmasuk" accept="image/png, image/gif, image/jpeg"required>
                                                    <label class="custom-file-label" for="exampleInputFile">Choose
                                                        Foto</label>
                                                    </div>
                                                </div>
                                                <div class="text-danger">
                                                    @error('foto_barangmasuk')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                        </div>
                                    </div> 
                                   

                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-success float-right">Submit</button>
                                        </div>  
                                      

                                        <!-- bagian tanggal -->
                                        
                                    </form>
                                   
                                    <!-- ./col -->

                                    <!-- /.row -->
                                    <!-- Main row -->

                                    <!-- /.row (main row) -->
                                </div><!-- /.container-fluid -->
                                 @endforeach 
        </section>

        <!-- /.content -->
    </div>
    <script>
        function sum() {
            var stok = document.getElementById('stok').value;
            var jumlahmasuk = document.getElementById('jumlah_total').value;
            var result = parseInt(stok) + parseInt(jumlahmasuk);
            // if (!isNaN(result)) {
            //     document.getElementById('jumlah').value = result;
            // }
            if ( result > 0 ) {
                document.getElementById('jumlah').value = result;
            }else {
                document.getElementById('jumlah').value = 0;
            }
        }
        </script>
@endsection
