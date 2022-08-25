@extends('layout.layout')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data Unit Asuransi</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">Unit Asuransi</li>
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
        <div class="card">
        <div class="card-header">
          <a class="btn btn-sm btn-primary" href="{{ route('asuransi.create') }}">Tambah Asuransi</a>
        </div>
          <!-- /.card-header -->
          <div class="card-body ">
            <table id="example2" class="table table-bordered table-hover text-nowrap">
              <thead>
                <tr> 
                    {{-- <th scope="col">Id</th> --}}
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Status</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">kontak</th>
                    <th colspan="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>@foreach ($asuransi as $data)
                  {{-- <td>{{ $data->id }}</td> --}}
                  <td>{{ $data->nama }}</td>
                  <td>{{ $data->email }}</td>
                  <td>{{ $data->status }}</td>
                  <td>{{ $data->alamat }}</td>
                  <td>{{ $data->kontak }}</td>
                  <td>
                    {{-- <a href="{{ route('produk.edit', $data->id) }}"class="btn btn-sm btn-warning">Edit</a> --}}
                    <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#staticBackdrop1{{ $data->id }}">
                      Edit
                    </button>
                    <div class="modal fade" id="staticBackdrop1{{ $data->id }}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content bg-default">
                          <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Ubah Data Unit Asuransi</h5>
                            {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button> --}}
                          </div>
                          <div class="modal-body">
                            <form action="{{route('asuransi.update',$data->id)}}" method="POST" enctype="multipart/form-data">
                              @method('PUT')
                              {{ csrf_field() }}
                              <label for="Judul" class="col-sm-2 col-form-label">Nama Asuransi </label>
                                
                                     <input type="text" id="nama" name="nama" class="form-control" placeholder="Masukkan Nama " required value="{{ $data->nama }}">
                                     <div class ="text-danger">
                                      @error('nama')
                                      {{ $message }}
                                      @enderror
                                    </div>
                          
                                <label for="Judul" class="col-sm-2 col-form-label">Email Asuransi </label>
                            
                                     <input type="email" id="email" name="email" class="form-control" placeholder="Masukkan Email" required value="{{ $data->email }}">  
                    
                <label for="Kontak" class="col-sm-2 col-form-label">Kontak</label>
                <input type="tel" id="kontak" name="kontak" class="form-control" placeholder="Contoh 0542"  required value="{{ $data->kontak }}">
             
                <label for="Judul" class="col-sm-2 col-form-label"> Alamat </label>
                <input type="text" id="alamat" name="alamat" class="form-control" placeholder="Masukkan Alamat"required value="{{ $data->alamat }}">  
              
                <label for="disabledSelect">Status</label>
                <select id="disabledSelect" name="status" class="form-control @error('status') is-invalid @enderror" >
                <option value="Berlaku">Berlaku</option>
                <option value="Tidak Berlaku">Tidak Berlaku</option>
                </select>
                          </div> 
                              <div class="modal-footer justify-content-between">
                                  <!-- bagian submit -->
                                  <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                              </div></form>
                          </div>
                        </div>
                      </div>
                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#staticBackdrop{{ $data->id }}">
                      Delete
                    </button>
                   <div class="modal fade" id="staticBackdrop{{ $data->id }}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content bg-default">
                         {{-- <div class="modal-header">
                         <h5 class="modal-title" id="staticBackdropLabel">{{ $data->nama }} KRAM KATA KATANYA YG DISINI BAGUSNYA APA</h5> 
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>  --}}
                        <div class="modal-body">
                          Apakah anda yakin menghapus {{ $data->nama }} ?
                        </div>
                        <div class="modal-footer justify-content-between">
                          <button type="button" class="btn  btn-sm btn-danger" data-dismiss="modal">Close</button>
                          <form action="{{route('asuransi.destroy',$data->id)}}" method="POST">
                          @csrf
                        @method('DELETE')
                      <button type ="submit" class="btn btn-sm btn-primary">Delete</button></form>
                        </div>
                      </div>
                    </div>
                  </div>
                </td>
                  {{-- <td>
                    <a href="{{ route('asuransi.edit',$data->id) }}"class="btn btn-sm btn-warning">Edit</a>
                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#staticBackdrop{{ $data->id }}">
                      Delete
                    </button>
                    <div class="modal fade" id="staticBackdrop{{ $data->id }}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content bg-danger">
                          <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">{{ $data->nama }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            Ingin menghapus {{ $data->nama }}?
                          </div>
                          <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                            <form action="{{route('asuransi.destroy',$data->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type ="submit" class="btn btn-outline-light">Delete</button></form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </td> --}}
                </tr> @endforeach
              </tbody>
            </table> 
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      </div>
   

  </section>
</div>
@endsection