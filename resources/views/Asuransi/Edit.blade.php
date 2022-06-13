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
                          <h4 style="text-align:center"><b>Edit Unit Asuransi </b></h4>
                        </div>
                        <div class="card-body">
              
                <!-- membuat formnya -->
                <!-- bagian judul -->
              
                        <form action="{{route('asuransi.update',$asuransi->id)}}" method="POST" enctype="multipart/form-data">
                          @method('PUT')
                          {{ csrf_field() }}
                          <div class="form-group row">
                            <label for="Judul" class="col-sm-2 col-form-label">Nama Asuransi </label>
                            <div class="col-sm-10">
                                 <input type="text" id="nama" name="nama" class="form-control" placeholder="Masukkan Nama " required value="{{ $asuransi->nama }}">
                                 <div class ="text-danger">
                                  @error('nama')
                                  {{ $message }}
                                  @enderror
                                </div>
                            </div>
                        </div>
                          
                        <div class="form-group row">
                            <label for="Judul" class="col-sm-2 col-form-label">Email Asuransi </label>
                            <div class="col-sm-10">
                                 <input type="email" id="email" name="email" class="form-control" placeholder="Masukkan Email" required value="{{ $asuransi->email }}">  
                            </div>
                          </div>
                         
                          
          <!-- bagian unit -->
          
          <div class="form-group row">
            <label for="Kontak" class="col-sm-2 col-form-label">Kontak</label>
            <div class="col-sm-10">
              <input type="tel" id="kontak" name="kontak" class="form-control" placeholder="Contoh 0542"  required value="{{ $asuransi->kontak }}">
            </div>
          </div>
          
          <div class="form-group row">
            <label for="Judul" class="col-sm-2 col-form-label"> Alamat </label>
            <div class="col-sm-10">
                 <input type="text" id="alamat" name="alamat" class="form-control" placeholder="Masukkan Alamat"required value="{{ $asuransi->alamat }}">  
            </div>
          </div>
          
          <div class="form-group row">
            <label for="Judul" class="col-sm-2 col-form-label">Status </label>
            <div class="col-sm-10">  
              <input type="radio" id="html" name="status" value="Berlaku">
              <label for="html" class="col-sm-2 col-form-label">Berlaku</label>
              <input type="radio" id="css" name="status" value="Tidak Berlaku">
              <label for="css">Tidak Berlaku</label><br>
            </div>
          </div>
          
                  
          
          <!-- bagian tanggal -->
                      <br>
                       
                                          
          
                          <div class="card-footer text-muted">
                              <!-- bagian submit -->
                              <button type="submit" class="btn btn-danger mb-3">Submit</button>
                          </div>
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
  <!-- /.content-wrapper -->
@endsection