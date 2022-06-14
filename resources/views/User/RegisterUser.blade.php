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
                          <h4 style="text-align:center"><b>TAMBAH USER </b></h4>
                        </div>
                        <div class="card-body">
              
                <!-- membuat formnya -->
                <!-- bagian judul -->
              
                        <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                          @csrf
                            <div class="form-group row">
                                <label for="Judul" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                     <input type="text" id="Nama" name="Nama" class="form-control" placeholder="Masukkan Nama " required value="{{old('Nama')}}">
                                     <div class ="text-danger">
                                      @error('Nama')
                                      {{ $message }}
                                      @enderror
                                    </div>
                                </div>
                              </div>
                              
                            <div class="form-group row">
                                <label for="Judul" class="col-sm-2 col-form-label">Email </label>
                                <div class="col-sm-10">
                                     <input type="text" id="Email" name="Email" class="form-control " placeholder="Masukkan Email" required value="{{old('Email')}}">  
                                     <div class ="text-danger">
                                      @error('Email')
                                      {{ $message }}
                                      @enderror
                                    </div>
                                </div>
                            </div>
              
                            <div class="form-group row">
                                <label for="Judul" class="col-sm-2 col-form-label">Jabatan </label>
                                <div class="col-sm-10">
                                     <input type="text" id="Jabatan" name="Jabatan" class="form-control" placeholder="Masukkan Jabatan ex Magang, Kadep Gadai" required value="{{old('Jabatan')}}">  
                                     <div class ="text-danger">
                                      @error('Jabatan')
                                      {{ $message }}
                                      @enderror
                                    </div>
                                </div>
                            </div>
              
                            <div class="form-group row">
                                <label for="Judul" class="col-sm-2 col-form-label"> Kontak </label>
                                <div class="col-sm-10">
                                      <input type="number" id="Kontak" name="Kontak" class="form-control " placeholder="Masukkan Nomor telephone" required value="{{old('Kontak')}}">  
                                      <div class ="text-danger">
                                        @error('Kontak')
                                        {{ $message }}
                                        @enderror
                                      </div>
                                    </div>
                            </div>
              
                            <div class="form-group row">
                                <label for="Judul" class="col-sm-2 col-form-label"> Alamat </label>
                                <div class="col-sm-10">
                                      <input type="text" id="Alamat" name="Alamat" class="form-control " placeholder="Masukkan Alamat" required value="{{old('Alamat')}}">  
                                      <div class ="text-danger">
                                        @error('Alamat')
                                        {{ $message }}
                                        @enderror
                                      </div>
                                    </div>
                            </div>
              
                            <div class="form-group row">
                              <label for="Judul" class="col-sm-2 col-form-label"> Password </label>
                              <div class="col-sm-10">
                                    <input type="password" id="Password" name="Password" class="form-control " placeholder="Masukkan Password" required ">  
                                    <div class ="text-danger">
                                      @error('Password')
                                      {{ $message }}
                                      @enderror
                                    </div>
                                  </div>
                          </div>
              
                            <div class="form-group row">
                                <label for="Judul" class="col-sm-2 col-form-label">Role </label>
                                <div class="col-sm-10">  
                                      <input type="radio" id="Admin" name="Role" value="Admin" required>
                                      <label for="Admin" class="col-sm-2 col-form-label">Admin</label>
                                      <input type="radio" id="Pegawai" name="Role" value="Pegawai" required>
                                      <label for="Pegawai" class="col-sm-2 col-form-label">Pegawai</label>
                                      <input type="radio" id="Magang" name="Role" value="Magang" required>
                                      <label for="Magang" class="col-sm-2 col-form-label">Magang</label>
                                      <input type="radio" id="Satpam" name="Role" value="Satpam" required >
                                      <label for="Satpam">Satpam</label><br>
              
                                </div>
                            </div>
              
                          <br>
              
                            <div class="card-footer text-muted">
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Masukkan Foto</label>
                                    <input type="file" name="Foto" class="form-control"  value="{{old('Foto')}}">
                                    <div class ="text-danger">
                                      @error('Foto')
                                      {{ $message }}
                                      @enderror
                                    </div>
                                </div>
                            </div>             
                
                            <div class="card-footer text-muted">
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
 @endsection