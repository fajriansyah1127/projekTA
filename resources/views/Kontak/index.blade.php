
 <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Contacts</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('template')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('template')}}/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-closed sidebar-collapse">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href=""><img src="{{asset('template')}}/dist/img/MATADOR6.jpg" alt="" width="80px"></a>
    <div class="row">
        <div class="col">
            <div class="row">
                <div class="col"><small>Sistem Informasi</small></div>
            </div>
            <div class="row">
                <div class="col itk-color" style="font-weight: 700">Manajemen Dokumen dan Barang</div>
            </div>
        </div>
    </div>
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto">
            <a class="nav-item nav-link " href="{{ route('kontak') }}" >Contact <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="/login">Login</a>
            
        </div>
    </div>
</nav> 

 
  <div class="content-wrapper"> 

    <!-- Main content -->
   <section class="content">

  
      <div class="card card-solid">
        <div class="card-body pb-0">
          <div class="row">
            @foreach($kontak as $data)
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
              <div class="card bg-light d-flex flex-fill">
                <div class="card-header text-muted border-bottom-0">
                    {{ $data->role }}
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b>{{ $data->nama }}</b></h2>
                      <p class="text-muted text-sm"><b>Jabatan: </b> {{ $data->jabatan }} </p>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: {{ $data->alamat }}</li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone : {{ $data->kontak }}</li>
                      </ul>
                    </div>
                    <div class="col-5 text-center">
                      <img src="{{asset('foto/')}}/{{ $data->foto }}" alt="user-avatar" class="img-circle img-fluid">
                    </div>
                  </div>
                </div>
              </div>
            </div> 
           
         
            
            
            @endforeach
          </div>
        </div>
      
      </div>
      <!-- /.card -->

    </section> 
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.1.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer> 

  <!-- Control Sidebar -->
   <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside> 
  <!-- /.control-sidebar -->
 </div>
<script src="{{asset('template')}}/plugins/jquery/jquery.min.js"></script>
<script src="{{asset('template')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('template')}}/dist/js/adminlte.min.js"></script>
<script src="{{asset('template')}}/dist/js/demo.js"></script>
</body>