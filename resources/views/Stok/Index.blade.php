@extends('layout.layout')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Stok</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Stok</li>
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
              {{-- <a class="btn btn-sm btn-primary" href="{{ route('stok.create') }}">Tambah stok</a> --}}
              <a class="btn btn-sm btn-primary" data-toggle="modal" data-target="#staticBackdroptambah">Tambah
                Stok</a>
              </div>
            <!-- /.card-header -->
            <div class="card-body ">
              <table id="exampledokumen1" class="table table-bordered table-hover ">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Jenis Barang</th>
                    <th>Jumlah</th>
                    <th>Satuan</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>@foreach($stok as $data)
                    <td>{{ $loop->iteration}}</td>
                    <td>{{ $data->id}}</td>
                    <td>{{ $data->nama_barang}}</td> 
                    <td>{{ $data->jenis_barang}}</td> 
                    <td>{{ $data->jumlah}}</td> 
                    <td>{{ $data->satuan->nama}}</td>  
                    <td>
                      <button type="button" id="id" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#staticBackdropedit{{$data->id}}">
                        Edit
                      </button>
                      <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#staticBackdropdelete{{$data->id}}">
                        Delete
                      </button>
                        <div class="modal fade" id="staticBackdropdelete{{$data->id}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content bg-default">
                              <div class="modal-body">
                                Apakah anda yakin menghapus {{$data->nama_barang}} ?
                              </div>
                              <div class="modal-footer justify-content-between">
                                <button type="button" class="btn  btn-sm btn-primary" data-dismiss="modal">Close</button>
                                <form action="{{route('stok.destroy',$data->id)}}" method="POST"> 
                                  @csrf
                                  @method('DELETE')
                                  <button type ="submit" class="btn btn-sm btn-danger">Delete</button></form>
                                </div>
                              </div>
                            </div>
                          </div>
                    </td> 
                  </tr> @endforeach   
                </tbody>
              </table>
            </div>
            
            @foreach($stok as $data)
            <div class="modal fade" id="staticBackdropedit{{$data->id}}" >
              <div class="modal-dialog">
                <div class="modal-content bg-default">
                  <div class="modal-header">
                    <h4 class="modal-title">Edit Stok</h4>
                  </div>
                  <div class="modal-body">
                    <form action="{{route('stok.update',$data->id)}}" method="POST" enctype="multipart/form-data">
                      @method('PUT')
                      {{ csrf_field() }}
                        
                        <label>Nama stok </label> 
                        <input type="text" id="nama" name="nama_barang" class="form-control" placeholder="Masukkan Nama" required value="{{ $data->nama_barang }}">
                        
                        <label>Jenis</label>
                        <input type="text"  name="jenis_barang" class="form-control"
                        placeholder="Masukkan Jenis"required value="{{ $data->jenis_barang }}"> 
                      
                        <label>Satuan</label>
                        <select id="disabledSelect" name="satuan_id"
                            class="form-control  "
                            style="width: 100%;" value="{{ $data->satuan->id }}" required>
                            <option value="" selected disabled> Pilih Satuan
                            </option>
                            @foreach ($satuan as $datas)
                                @if ($data->satuan->id == $datas->id)
                                    <option value="{{ $datas->id }}" selected>
                                        {{ $datas->nama }} </option>
                                @else
                                    <option value="{{ $datas->id }}">{{ $datas->nama }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                  </div>
                      <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                      </div>
                    </form>
                  </div>
                </div>                         
              </div>
              @endforeach
            <!-- /.card-body -->
  <!-- /.content -->
  <div class="modal fade" id="staticBackdroptambah" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Stok</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('stok.store') }}" method="POST">
                    {{ csrf_field() }}

                    <label>Nama stok </label>
                    <input type="text" name="nama_barang" class="form-control"
                        placeholder="Masukkan Nama stok "required>

                    <label>Jenis</label>
                    <input type="text"name="jenis_barang" class="form-control"
                    placeholder="Masukkan Jenis  "required>

                    <label>Jumlah</label>
                    <input type="number" name="jumlah" class="form-control"
                    placeholder="0" value="0" readonly>

                    <label>Satuan</label>
                    <select id="disabledSelect" name="satuan" class="form-control " style="width: 100%;" required>
                    <option value="" selected disabled> Pilih Satuan</option>
                    @foreach ($satuan as $data)
                    <option value="{{ $data->id }}">{{ $data->nama }}</option>
                    @endforeach
                    </select>

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-sm btn-danger"
                            data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                    </div>
            </div>

            </form>
        </div>
    </div>
</div>
</section>
</div>
@endsection