@extends('layout.layout')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  @if (auth()->user()->role == 'Admin')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dokumen</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
             <li class="breadcrumb-item active">Dokumen</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- /.card -->
            <div class="card">
              <div class="card-header">
                <a class="btn btn-sm btn-primary" href="{{ route('dokumen.create') }}">Tambah Dokumen</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive">
                <table id="exampledokumen1" class="table table-bordered text-nowrap">
                  <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Nama</th>
                      <th scope="col">Nomor Akad</th>
                      <th scope="col">Outlet</th>
                      <th scope="col">Tanggal</th>
                      <th scope="col">Produk</th>
                      <th scope="col">Asuransi</th>
                      <th scope="col">Nama Pengupload</th>
                      <th colspan="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>@foreach($dokumen as $data)
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $data->nama }}</td>
                      <td>{{ $data->nomor_akad }}</td>
                      <td>{{ $data->outlet->nama }}</td>
                      <td>{{ $data->tanggal_klaim }}</td>
                      <td>{{ $data->produk->nama }}</td>
                      <td>{{ $data->produk->asuransi->nama }}</td>
                      <td>{{ $data->nama_pengupload }}</td>
                      <td>
                          <a href="{{ route('dokumen.show',$data->file) }}" target ="_blank"class="btn btn-sm btn-primary">Download</a>
                          <a href="{{ route('dokumen.edit',$data->id) }}"class="btn btn-sm btn-warning">Edit</a>
                          <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#staticBackdropdelete{{$data->id}}">
                            Delete
                          </button>
                        </td>
                    </tr> 
                    @endforeach
                  </tbody>
                </table>
                @foreach($dokumen as $data)
                <div class="modal fade" id="staticBackdropdelete{{$data->id}}">
                  <div class="modal-dialog" >
                    <div class="modal-content bg-default">
                      <div class="modal-body">
                        Apakah anda yakin menghapus {{$data->nama}} ?
                      </div>
                      <div class="modal-footer justify-content-between">
                        <button type="button" class="btn  btn-sm btn-primary" data-dismiss="modal">Close</button>
                        <form action="{{route('dokumen.destroy',$data->id)}}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button type ="submit" class="btn btn-sm btn-danger">Delete</button></form>
                        </div>
                      </div>
                    </div>
                  </div>@endforeach
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @elseif (auth()->user()->role == 'Pegawai')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dokumen</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
             <li class="breadcrumb-item active">Dokumen</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- /.card -->
            <div class="card">
              <div class="card-header">
                <a class="btn btn-sm btn-primary" href="{{ route('dokumen.create') }}">Tambah Dokumen</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive">
                <table id="exampledokumen1" class="table table-bordered text-nowrap">
                  <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Nama</th>
                      <th scope="col">Nomor Akad</th>
                      <th scope="col">Outlet</th>
                      <th scope="col">Tanggal</th>
                      <th scope="col">Produk</th>
                      <th scope="col">Asuransi</th>
                      <th scope="col">Nama Pengupload</th>
                      <th colspan="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>@foreach($dokumen as $data)
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $data->nama }}</td>
                      <td>{{ $data->nomor_akad }}</td>
                      <td>{{ $data->outlet->nama }}</td>
                      <td>{{ $data->tanggal_klaim }}</td>
                      <td>{{ $data->produk->nama }}</td>
                      <td>{{ $data->produk->asuransi->nama }}</td>
                      <td>{{ $data->user->nama }}</td>
                      <td>
                        <a href="{{ route('dokumen.show',$data->file) }}" target ="_blank"class="btn btn-sm btn-primary">Download</a>
                          <a href="{{ route('dokumen.edit',$data->id) }}"class="btn btn-sm btn-warning">Edit</a>
                          <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#staticBackdropdelete{{$data->id}}">
                            Delete
                          </button>
                        </td>
                    </tr> 
                    @endforeach
                  </tbody>
                </table>
                @foreach($dokumen as $data)
                <div class="modal fade" id="staticBackdropdelete{{$data->id}}">
                  <div class="modal-dialog" >
                    <div class="modal-content bg-default">
                      <div class="modal-body">
                        Apakah anda yakin menghapus {{$data->nama}} ?
                      </div>
                      <div class="modal-footer justify-content-between">
                        <button type="button" class="btn  btn-sm btn-primary" data-dismiss="modal">Close</button>
                        <form action="{{route('dokumen.destroy',$data->id)}}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button type ="submit" class="btn btn-sm btn-danger">Delete</button></form>
                        </div>
                      </div>
                    </div>
                  </div>@endforeach
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  @elseif (auth()->user()->role == 'Magang')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dokumen</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
             <li class="breadcrumb-item active">Dokumen</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- /.card -->
            <div class="card">
              <div class="card-header">
                <a class="btn btn-sm btn-primary" href="{{ route('dokumen.create') }}">Tambah Dokumen</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive">
                <table id="exampledokumen1" class="table table-bordered text-nowrap">
                  <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Nama</th>
                      <th scope="col">Nomor Akad</th>
                      <th scope="col">Outlet</th>
                      <th scope="col">Tanggal</th>
                      <th scope="col">Produk</th>
                      <th scope="col">Asuransi</th>
                      
                      <th colspan="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>@foreach($DokumenRole as $data)
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $data->nama }}</td>
                      <td>{{ $data->nomor_akad }}</td>
                      <td>{{ $data->outlet->nama }}</td>
                      <td>{{ $data->tanggal_klaim }}</td>
                      <td>{{ $data->produk->nama }}</td>
                      <td>{{ $data->produk->asuransi->nama }}</td>
                      
                      <td>
                          <a href="{{ route('dokumen.show',$data->file) }}" target ="_blank"class="btn btn-sm btn-primary">Download</a>
                          <a href="{{ route('dokumen.edit',$data->id) }}"class="btn btn-sm btn-warning">Edit</a>
                          {{-- <a href="dokumen/{{$data->id}}/editmagang"class="btn btn-sm btn-warning">Edit</a> --}}
                          <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#staticBackdropdelete{{$data->id}}">
                            Delete
                          </button>
                        </td>
                    </tr> 
                    @endforeach
                  </tbody>
                </table>
                @foreach($dokumen as $data)
                <div class="modal fade" id="staticBackdropdelete{{$data->id}}">
                  <div class="modal-dialog" >
                    <div class="modal-content bg-default">
                      <div class="modal-body">
                        Apakah anda yakin menghapus {{$data->nama}} ?
                      </div>
                      <div class="modal-footer justify-content-between">
                        <button type="button" class="btn  btn-sm btn-primary" data-dismiss="modal">Close</button>
                        <form action="{{route('dokumen.destroy',$data->id)}}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button type ="submit" class="btn btn-sm btn-danger">Delete</button></form>
                        </div>
                      </div>
                    </div>
                  </div>@endforeach
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  @elseif (auth()->user()->role == 'Satpam')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dokumen</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
             <li class="breadcrumb-item active">Dokumen</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- /.card -->
            <div class="card">
              <div class="card-header">
                <a class="btn btn-sm btn-primary" href="{{ route('dokumen.create') }}">Tambah Dokumen</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive">
                <table id="exampledokumen1" class="table table-bordered text-nowrap">
                  <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Nama</th>
                      <th scope="col">Nomor Akad</th>
                      <th scope="col">Outlet</th>
                      <th scope="col">Tanggal</th>
                      <th scope="col">Produk</th>
                      <th scope="col">Asuransi</th>
                      <th scope="col">Nama Pengupload</th>
                      <th colspan="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>@foreach($DokumenRole as $data)
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $data->nama }}</td>
                      <td>{{ $data->nomor_akad }}</td>
                      <td>{{ $data->outlet->nama }}</td>
                      <td>{{ $data->tanggal_klaim }}</td>
                      <td>{{ $data->produk->nama }}</td>
                      <td>{{ $data->produk->asuransi->nama }}</td>
                      <td>{{ $data->user->nama }}</td>
                      <td>
                          <a href="{{asset('filearsip/')}}/{{ $data->file }}" target ="_blank"class="btn btn-sm btn-primary">Download</a>
                          <a href="{{ route('dokumen.edit',$data->id) }}"class="btn btn-sm btn-warning">Edit</a>
                          <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#staticBackdropdelete{{$data->id}}">
                            Delete
                          </button>
                        </td>
                    </tr> 
                    @endforeach
                  </tbody>
                </table>
                @foreach($dokumen as $data)
                <div class="modal fade" id="staticBackdropdelete{{$data->id}}">
                  <div class="modal-dialog" >
                    <div class="modal-content bg-default">
                      <div class="modal-body">
                        Apakah anda yakin menghapus {{$data->nama}} ?
                      </div>
                      <div class="modal-footer justify-content-between">
                        <button type="button" class="btn  btn-sm btn-primary" data-dismiss="modal">Close</button>
                        <form action="{{route('dokumen.destroy',$data->id)}}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button type ="submit" class="btn btn-sm btn-danger">Delete</button></form>
                        </div>
                      </div>
                    </div>
                  </div>@endforeach
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  @endif
@endsection
