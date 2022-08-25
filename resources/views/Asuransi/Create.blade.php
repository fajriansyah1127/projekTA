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
                          <h4 style="text-align:center"><b>TAMBAH UNIT ASURANSI </b></h4>
                        </div>
                        <div class="card-body">
              
                <!-- membuat formnya -->
                <!-- bagian judul -->
              
                <form action="{{ route('asuransi.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                      <div class="form-group row">
                          <label for="Judul" class="col-sm-2 col-form-label">Nama Asuransi </label>
                          <div class="col-sm-10">
                               <input type="text" id="nama" name="nama_asuransi" class="form-control" placeholder="Masukkan Nama "required>
                               <div class ="text-danger">
                                @error('Nama')
                                {{ $message }}
                                @enderror
                              </div>
                          </div>
                      </div>
                        
                      <div class="form-group row">
                          <label  class="col-sm-2 col-form-label">Email Asuransi </label>
                          <div class="col-sm-10">
                               <input type="email"  name="email_asuransi" class="form-control" placeholder="Masukkan Email" required>  
                               <div class ="text-danger">
                                @error('email')
                                {{ $message }}
                                @enderror
                              </div>
                              </div>
                        </div>
                       
                        
        <!-- bagian unit -->
        
        <div class="form-group row">
          <label  class="col-sm-2 col-form-label">Kontak</label>
          <div class="col-sm-10">
            <input type="tel"  name="kontak_asuransi" class="form-control" placeholder="Masukkan Kontak"  required>
          </div>
        </div>
        
        <div class="form-group row">
          <label  class="col-sm-2 col-form-label"> Alamat </label>
          <div class="col-sm-10">
               <input type="text" id="alamat" name="alamat_asuransi" class="form-control" placeholder="Masukkan Alamat"required>  
          </div>
        </div>
        
        <div class="form-group row">
          <label for="Judul" class="col-sm-2 col-form-label">Status </label>
          <div class="col-sm-10">  
            <input type="radio" id="html" name="status_asuransi" value="Berlaku">
            <label for="html" class="col-sm-2 col-form-label">Berlaku</label>
            <input type="radio" id="css" name="status_asuransi" value="Tidak Berlaku">
            <label for="css">Tidak Berlaku</label><br>
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
{{-- 
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Forgot Password</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('template')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('template')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('template')}}/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="{{asset('template')}}/index2.html"><b>Admin</b>LTE</a>
  </div> 
  <!-- /.login-logo -->
   <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>

      <form method="POST" class="my-login-validation" novalidate="" action="{{ route('password.email') }}">
        @csrf

        @if (session('status'))
            <div class="alert alert-ssuccess">
                {{ session('status') }}
            </div>
        @endif
        <div class="form-group">
            <label for="email">E-Mail Address</label>
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Enter your email">
            <span class="text-danger">@error('email'){{ $message }} @enderror</span>
        </div>

        <div class="form-group m-0">
            <button type="submit" class="btn btn-primary btn-block">
                Send Password Link
            </button>
        </div>
    </form>

      <p class="mt-3 mb-1">
        <a href="/login">Login</a>
      </p> 
       <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p> 
     </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('template')}}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('template')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('template')}}/dist/js/adminlte.min.js"></script>
</body>
</html>   --}}
