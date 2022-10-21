@extends('layout.layout')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        @if (auth()->user()->role == 'Admin')
        <!-- Small boxes (Stat box) -->
        <div class="card">
        <div class="card-body table-responsive">
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->  
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$DokumenAdmindanPegawai}}</h3>
                <p>Dokumen</p>
              </div>
              <div class="icon">
                <i class="ion ion-document-text"></i>
              </div>
              <a href="/dokumen" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$BanyakPeminjamDokumen}}</h3>
                <p>Peminjam Dokumen</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-users"></i>
              </div>
              <a href="/dokumen" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$BanyakPeminjamBarang}}</h3>
                <p>Peminjam Barang</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-boxes"></i>
              </div>
              <a href="/peminjambarang" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$BanyakBarangMasuk}}</h3>
                <p>Barang Masuk</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-dolly"></i>
              </div>
              <a href="{{ route('barangmasuk.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$BanyakBarangKeluar}}</h3>
                <p>Barang Keluar</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-warehouse"></i>
              </div>
              <a href="{{ route('barangkeluar.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$BanyakUser}}</h3>
                <p>User</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-users"></i>
              </div>
              <a href="{{ route('user.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$BanyakSampah}}</h3>
                <p>Sampah</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-trash"></i>
              </div>
              <a href="{{ route('trash') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          
        </div>
      </div>
      </div>
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header bg-blue">
                <h3 class="card-title ">Riwayat Aktivitas</h3>
              </div>
              <!-- /.card-header -->
              
                {{-- <div class="card-header">
                  <a class="btn btn-sm btn-primary" href="{{ route('dokumen.create') }}">Tambah Dokumen</a>
                </div> --}}
                <!-- /.card-header -->
                <div class="card-body table-responsive">
                  <table id="riwayat" class="table table-bordered text-nowrap">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Aktivitas</th>
                        <th scope="col">Waktu</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>@foreach($riwayatadmin as $data)
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->nama }}</td>
                        <td>{{ $data->aktivitas }}</td>
                        <td>{{ Carbon\Carbon::parse($data->created_at)->translatedFormat('l, d F Y H:i') }}</td>
                      </tr> 
                      @endforeach
                    </tbody>
                  </table>
                </div>
              <!-- /.card-body -->
            
            <!-- /.card -->
          </div>
        </div>
      </div>
        <!-- /.row -->
        <!-- Main row -->
        
        @elseif (auth()->user()->role == 'Satpam')
        <!-- Small boxes (Stat box) -->
        <div class="card">
        <div class="card-body table-responsive">
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$DokumenSatpamdanMagang}}</h3>
                <p>Dokumen</p>
              </div>
              <div class="icon">
                <i class="ion ion-document-text"></i>
              </div>
              <a href="{{ route('dokumen.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$BanyakBarangMasuk}}</h3>
                <p>Barang Masuk</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-dolly"></i>
              </div>
              <a href="{{ route('barangmasuk.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$BanyakBarangKeluar}}</h3>
                <p>Barang Keluar</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-warehouse"></i>
              </div>
              <a href="{{ route('barangkeluar.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          {{-- <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>65</h3>
                <p>Stok Barang</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-box"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div> --}}
        </div>
      </div>
    </div>

        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header bg-blue">
                <h3 class="card-title ">Riwayat Aktivitas</h3>
              </div>
                <div class="card-body table-responsive">
                  <table id="riwayat" class="table table-bordered text-nowrap">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Aktivitas</th>
                        <th scope="col">Waktu</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>@foreach($riwayatadmin as $data)
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->nama }}</td>
                        <td>{{ $data->aktivitas }}</td>
                        <td>{{ Carbon\Carbon::parse($data->created_at)->translatedFormat('l, d F Y H:i') }}</td>
                      </tr> 
                      @endforeach
                    </tbody>
                  </table>
                </div>
              <!-- /.card-body -->
            
            <!-- /.card -->
          </div>
        </div>
      </div>

        @elseif (auth()->user()->role == 'Pegawai')
        <!-- Small boxes (Stat box) -->
        <div class="card">
          <div class="card-body table-responsive">
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$DokumenAdmindanPegawai}}</h3>
                <p>Dokumen</p>
              </div>
              <div class="icon">
                <i class="ion ion-document-text"></i>
              </div>
              <a href="{{ route('dokumen.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <!-- ./col -->
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$BanyakPeminjamDokumen}}</h3>
                <p>Peminjam Dokumen</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-users"></i>
              </div>
              <a href="{{ route('peminjam.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
      </div>
    </div>
        <div class="card">
          <div class="card-header bg-blue">
            <h3 class="card-title ">Riwayat Aktivitas</h3>
          </div>
            <div class="card-body table-responsive">
              <table id="riwayat" class="table table-bordered text-nowrap">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Aktivitas</th>
                    <th scope="col">Waktu</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>@foreach($riwayatadmin as $data)
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->nama }}</td>
                    <td>{{ $data->aktivitas }}</td>
                    <td>{{ Carbon\Carbon::parse($data->created_at)->translatedFormat('l, d F Y H:i') }}</td>
                  </tr> 
                  @endforeach
                </tbody>
              </table>
            </div>
          <!-- /.card-body -->
        
        <!-- /.card -->
      </div>

        @elseif (auth()->user()->role == 'Magang')
        <div class="row">
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                {{-- @foreach ($DokumenMagang as $data) --}}
                <h3>{{ $DokumenSatpamdanMagang }}</h3>
                {{-- @endforeach --}}
                <p>Dokumen</p>
              </div>
              <div class="icon">
                <i class="ion ion-document-text"></i>
              </div>
              <a href="/dokumen" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
        </div>
        <div class="card">
          <div class="card-header bg-blue">
            <h3 class="card-title ">Riwayat Aktivitas</h3>
          </div>
            <div class="card-body table-responsive">
              <table id="riwayat" class="table table-bordered text-nowrap">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Aktivitas</th>
                    <th scope="col">Waktu</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>@foreach($riwayatallrole as $data)
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->nama }}</td>
                    <td>{{ $data->aktivitas }}</td>
                    <td>{{ Carbon\Carbon::parse($data->created_at)->translatedFormat('l, d F Y H:i') }}</td>
                  </tr> 
                  @endforeach
                </tbody>
              </table>
            </div>
          <!-- /.card-body -->
        
        <!-- /.card -->
      </div>
        @endif
      </div>

      

    </section>

    <!-- /.content -->
  </div>


@endsection
