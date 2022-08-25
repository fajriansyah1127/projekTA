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
              
                <form action="{{ route('dokumen.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                      <div class="form-group row">
                          <label for="Judul" class="col-sm-2 col-form-label">Nama  </label>
                          <div class="col-sm-10">
                               <input type="text" id="nama" name="Nama" class="form-control" placeholder="Masukkan Nama "required>
                               <div class ="text-danger">
                                @error('Nama')
                                {{ $message }}
                                @enderror
                              </div>
                          </div>
                      </div>
                        
                      <div class="form-group row">
                          <label for="Judul" class="col-sm-2 col-form-label">Nomor Surat </label>
                          <div class="col-sm-10">
                               <input type="text" id="nomor" name="Nomor" class="form-control" placeholder="Masukkan Nomor" required>  
                          </div>
                        </div>
                       
                        
        <!-- bagian unit -->
        
        <div class="form-group row">
          <label for="Kontak" class="col-sm-2 col-form-label">Tanggal</label>
          <div class="col-sm-10">
            <input type="date" id="tanggal" name="Tanggal" class="form-control" placeholder="Contoh 0542"  required>
          </div>
        </div>

        <div class="form-group row">
          <label for="disabledSelect" class="col-sm-2 col-form-label">Produk</label>
          <div class="col-sm-10"> 
         <select id="disabledSelect" name="Produk" class="form-control @error('unit') is-invalid @enderror" >
         {{-- @foreach($asuransi as $data)
         <option value="{{ $data->id }}">{{ $data->nama_asuransi }}</option>
         @endforeach --}}@foreach($dokumen as $data)
          <option value="{{ $data->id }}">{{ $data->nama}} || {{ $data->asuransi->nama}} </option>@endforeach 
         </select>
          </div>
        </div>

        <div class="card-footer text-muted">
          <div class="form-group">
              <label for="exampleFormControlFile1">File</label>
              <input type="file" name="File" class="form-control"  value="{{old('File')}}">
              <div class ="text-danger">
                @error('File')
                {{ $message }}
                @enderror
              </div>
          </div>
      </div>     
        <!-- bagian tanggal -->    
        <div class="card-footer">
          <!-- bagian submit -->
          <button type="submit" class="btn btn-danger float-right">Submit</button>
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