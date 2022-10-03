<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="{{asset('template')}}/plugins/fontawesome-free/css/all.min.css">
      <!-- Ionicons -->
      <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
      <!-- Tempusdominus Bootstrap 4 -->
      <link rel="stylesheet" href="{{asset('template')}}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
      <!-- iCheck -->
      <link rel="stylesheet" href="{{asset('template')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
      <!-- JQVMap -->
      <link rel="stylesheet" href="{{asset('template')}}/plugins/jqvmap/jqvmap.min.css">
      <!-- Theme style -->
      <link rel="stylesheet" href="{{asset('template')}}/dist/css/adminlte.min.css">
      <!-- overlayScrollbars -->
      <link rel="stylesheet" href="{{asset('template')}}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
      <!-- Daterange picker -->
      <link rel="stylesheet" href="{{asset('template')}}/plugins/daterangepicker/daterangepicker.css">
      <!-- summernote -->
      <link rel="stylesheet" href="{{asset('template')}}/plugins/summernote/summernote-bs4.min.css">
    <title>SimDomba</title>
  </head>
  <body style="position: relative; min-height: 100%">
    @include('sweetalert::alert')
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
              <a class="nav-item nav-link active" href="/contactex" style="font-weight: 700; color: #0067B2">Contact <span class="sr-only">(current)</span></a>
              <a class="nav-item nav-link" href="/login">Login</a>
              
          </div>
      </div>
  </nav>
    
      <div class="container-fluid">
      <div class="card mt-2">
      <div class="card-header"  >
        <h4 style="text-align:center"><b>CARI DOKUMEN </b></h4>
      </div>
      <div class="card-body"  >
        <form action="{{ route('store') }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        <div class="form-row">
            <div class="form-group col-sm-4">
                <label for="judul">Nama</label>
                <input  type="text" name="nama" class="form-control"
                    placeholder="Nama ">
            </div>

            <div class="form-group col-sm-4">
              <label for="Status">Produk</label>
              <select class="form-control" id="status" name="produk">
                  <option disabled selected>Pilih Produk</option>
                  @foreach ($dokumenproduk as $data)
                  <option value="{{ $data->id }}">{{ $data->nama }} || {{ $data->asuransi->nama }} </option>
              @endforeach
              </select>
          </div>

            <div class="form-group col-sm-4">
              <label for="Status">Outlet</label>
              <select class="form-control" id="status" name="outlet">
                  <option disabled selected>Pilih Outlet</option>
                  @foreach ($dokumenoutlet as $data)
                  <option value="{{ $data->id }}">{{ $data->nama }} </option>
                  @endforeach
              </select>
          </div>
        </div>

        <div class="form-row">
            <div class="form-group col-sm-4">
                <label for="nomor">Nomor</label>
                <input id="nomor" type="text" class="form-control" name="nomor" placeholder="Nomor">
            </div>

            <div class="form-group col-sm-4">
                <label for="tahun">Tanggal</label>
                <div class="input-group">
                        <input type="date" class="form-control" name="tanggal" placeholder="Pilih tanggal berlaku"/>

                </div>
            </div>
        </div>

        <button class="btn btn-info float-right">Cari Data</button>

    </form>
    
  </div>
</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('template')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="{{asset('template')}}/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="{{asset('template')}}/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="{{asset('template')}}/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="{{asset('template')}}/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('template')}}/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{asset('template')}}/plugins/moment/moment.min.js"></script>
<script src="{{asset('template')}}/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('template')}}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="{{asset('template')}}/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{asset('template')}}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('template')}}/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('template')}}/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('template')}}/dist/js/pages/dashboard.js"></script>
{{-- <script src="https://dokumen-mutu.itk.ac.id/asset/datepicker/datepicker.js"></script> --}}
<script>
    $(document).ready(function(){
      $("#datepicker").datepicker({
         format: "yyyy",
         viewMode: "years", 
         minViewMode: "years",
         autoclose:true
      });   
    })
    
    
    </script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="https://netdna.bootstrapcdn.com/bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>
<!-- Footer -->
<footer class="page-footer font-small blue pt-4">

    <!-- Footer Links -->
    <div class="container-fluid text-center text-md-left">
  
      <!-- Grid row -->
      <div class="row">
  
        <!-- Grid column -->
        <div class="col-md-6 mt-md-0 mt-3">
  
          <!-- Content -->
          <h5 class="text-uppercase">Pegadaian Kantor Area Balikpapan</h5>
          <p>Jln Soekarno Hatta Kilo 4.5 Batu Ampar Balikpapan</p>
          <p>Jam Operasional Kantor Senin - Jumat : 08.00 - 15.00 Sabtu : 08.00 - 12.00</p>
          {{-- <p>Here you can use rows and columns to organize your footer content.</p> --}}
  
        </div>
        <!-- Grid column -->
  
        <hr class="clearfix w-100 d-md-none pb-3">
  
        <!-- Grid column -->
        <div class="col-md-3 mb-md-0 mb-3">
  
          <!-- Links -->
          {{-- <h5 class="text-uppercase">Tentang Pegadaian</h5>
  
          <ul class="list-unstyled">
            <li>
              <a href="https://instagram.com/pegadaian_id?igshid=YmMyMTA2M2Y=">Instagram</a>
            </li>
            <li>
              <a href="#!">Youtube</a>
            </li>
            <li>
              <a href="#!">Facebook</a>
            </li>
            <li>
              <a href="#!">Link 4</a>
            </li>
          </ul> --}}
  
        </div>
        <!-- Grid column -->
  
        <!-- Grid column -->
        <div class="col-md-3 mb-md-0 mb-3">
  
          <!-- Links -->
          <h5 class="text-uppercase">Social Media</h5>
  
          <ul class="list-unstyled">
            <li>
              <a href="https://instagram.com/pegadaian_id?igshid=YmMyMTA2M2Y=">Instagram</a>
            </li>
            <li>
              <a href="https://youtube.com/c/PTPegadaianPersero_official">Youtube</a>
            </li>
            <li>
              <a href="https://www.facebook.com/PegadaianPersero">Facebook</a>
            </li>
            <li>
              <a href="https://twitter.com/Pegadaian">Twiter</a>
            </li>
          </ul>
  
        </div>
        <!-- Grid column -->
  
      </div>
      <!-- Grid row -->
  
    </div>
    <!-- Footer Links -->
  
    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2020 Copyright:
      <a href="https://mdbootstrap.com/"> MDBootstrap.com</a>
    </div>
    <!-- Copyright -->
  
  </footer>
  <!-- Footer -->
  </body>
</html>