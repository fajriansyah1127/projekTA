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
                          <h4 style="text-align:center"><b>TAMBAH DATA PEMINJAM </b></h4>
                        </div>
                        <div class="card-body">
              
                <!-- membuat formnya -->
                <!-- bagian judul -->
              
                <form action="{{ route('peminjam.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                      <div class="form-group row">
                          <label for="Judul" class="col-sm-2 col-form-label">Nama Peminjam </label>
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
                        <label for="disabledSelect" class="col-sm-2 col-form-label">Nomor Akad </label>
                        <div class="col-sm-10"> 
                       <select id="disabledSelect" name="Nomor_akad" class="form-control select2  @error('Nomor_akad') is-invalid @enderror" style="width: 100%; required >
                        <option value="1" selected="">Pilih Nomor Akad dan Nama Nasabah</option> 
                        <option value="" selected="">Pilih Nomor Akad dan Nama Nasabah</option>
                        @foreach($dokumen as $data)
                       <option value="{{ $data->id }}">{{ $data->nomor_akad }}  ||  {{ $data->nama }}</option>
                       @endforeach
                       </select>
                       <div class ="text-danger mt-2">
                        @error('Nomor_akad')
                        {{ $message }}
                        @enderror
                      </div>
                        </div>
                      </div>
                       
                      <div class="form-group row">        
                        <label for="Kontak" class="col-sm-2 col-form-label">Tanggal Pinjam</label>       
                        <div class="col-sm-10">       
                          <input type="date" id="date" name="Tanggal_pinjam" class="form-control"  required >    
                          <div class ="text-danger">                
                            @error('Tanggal_pinjam')                
                            {{ $message }}               
                            @enderror
                          </div>   
                        </div>        
                      </div>
                        
    
                    
                      <!-- bagian submit -->
                      <button type="submit" class="btn btn-success float-right">Submit</button>
                 
                    </form>
                      
                </div>
              
              
                </div>
              </div>
              
          <!-- ./col -->
        </div>
    </div>
        <!-- /.row -->
        <!-- Main row -->
       
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->

    </section>

    <!-- /.content -->
  </div>
 @endsection