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
                                      <input type="text" id="Kontak" name="Kontak" class="form-control " placeholder="Masukkan Nomor telephone" required value="{{old('Kontak')}}">  
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
                            <label for="disabledSelect" class="col-sm-2 col-form-label">Role</label>
                            <div class="col-sm-10"> 
                           <select id="disabledSelect" name="Role" class="form-control  @error('Role') is-invalid @enderror" style="width: 100%; required>
                            <option value="" selected>Pilih Produk dan Asuransi</option> 
                            <option value="" selected>Pilih Role</option> 
                            <option value="Admin">Admin</option> 
                            <option value="Magang">Magang</option> 
                            <option value="Pegawai">Pegawai</option> 
                            <option value="Satpam">Satpam</option> 
                           </select>
                           <div class ="text-danger">
                            @error('Role')
                            {{ $message }}
                            @enderror
                          </div>
                            </div>
                            
                          </div>
              
                         
              
                            <div class="card-footer text-muted">
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Masukkan Foto</label>
                                    <input type="file" name="Foto" class="form-control" accept="image/png, image/gif, image/jpeg"  value="{{old('Foto')}}" required>
                                    <div class ="text-danger">
                                      @error('Foto')
                                      {{ $message }}
                                      @enderror
                                    </div>
                                </div>
                            </div>             
                
                           
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