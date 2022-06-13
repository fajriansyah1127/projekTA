@extends('layout.layout')
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Biodata</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-12">
            <!-- /.card-header -->
            <div class=" ">
                <table class="table">
                    <tr>
                      <th width="100px">Nama</th>
                      <th width="30px">:</th>
                      <th>{{ $profile->nama }}</th>
                    </tr>
                    <tr>
                      <th width="100px">Email</th>
                      <th width="30px">:</th>
                      <th>{{ $profile->email }}</th>
                    </tr>
                    <tr>
                      <th width="100px">Jabatan</th>
                      <th width="30px">:</th>
                      <th>{{ $profile->jabatan }}</th>
                    </tr>
                    <tr>
                      <th width="100px">Kontak</th>
                      <th width="30px">:</th>
                      <th>{{ $profile->kontak }}</th>
                    </tr>
                    <tr>
                      <th width="100px">Alamat</th>
                      <th width="30px">:</th>
                      <th>{{ $profile->alamat }}</th>
                    </tr>
                    <tr>
                      <th width="100px">Foto</th>
                      <th width="30px">:</th>
                      <th><img src="{{ url('foto/'.$profile->foto) }}" alt="foto" width="200px" ></th>
                    </tr>
                  </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
     

    </section>

    <!-- /.content -->
  </div>
@endsection