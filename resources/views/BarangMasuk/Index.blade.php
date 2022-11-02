@extends('layout.layout')

@section('content')
<div class="content-wrapper">
  <! Content Header (Page header) >
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Barang Masuk</h1>
        </div><! /.col >
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">Barang Masuk</li>
          </ol>
        </div><! /.col >
      </div><! /.row >
    </div><! /.container-fluid >
  </div>
  <! /.content-header >

  <! Main content >
  <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <a class="btn btn-sm btn-primary" data-toggle="modal" data-target="#tambah">Tambah Barang Masuk</a>
              <a class="btn btn-sm btn-success" data-toggle="modal" data-target="#tambahstock">Tambah Stok</a>
            </div>
          
            <div class="card-body table-responsive ">
              <table id="exampledokumen1" class="table table-bordered text-nowrap ">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jenis</th>
                    <th>Jumlah</th>
                    <th>Satuan</th>
                    <th>Penerima</th>
                    <th>Tanggal Masuk</th>
                    <th>Action</th>
                    <th>Foto</th>
                  </tr>
                </thead>
                <tbody>
                   <tr>@foreach($barangmasuk as $data)
                    <td>{{ $loop->iteration}}</td>
                    <td>{{ $data->nama}}</td> 
                    <td>{{ $data->jenis }}</td> 
                    <td>{{ $data->total_barangmasuk }}</td> 
                    <td>{{ $data->satuan}}</td> 
                    <td>{{ $data->penerima }}</td> 
                    <td>{{ $data->tanggal_masuk }}</td> 
                    <td>
                      <a href="{{ route('barangmasuk.edit',$data->id) }}"class="btn btn-sm btn-warning">Edit</a>
                      <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#staticBackdropdelete{{$data->id}}">
                        Delete
                      </button>
                    </td> 
                    <td><a href="{{ url('foto_barangmasuk/'.$data->foto) }} "target="_blank"><img src="{{ url('foto_barangmasuk/'.$data->foto) }}" alt="foto" width="100px" ></a></td> 
                  </tr> @endforeach
                </tbody>
              </table>
            </div>
            
            @foreach($barangmasuk as $data)
            <div class="modal fade" id="staticBackdropdelete{{$data->id}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content bg-default">
                  <div class="modal-body">
                    Apakah anda yakin menghapus {{$data->nama}} ?
                  </div>
                  <div class="modal-footer justify-content-between">
                    <button type="button" class="btn  btn-sm btn-primary" data-dismiss="modal">Close</button>
                    <form action="{{route('barangmasuk.destroy',$data->id)}}" method="POST"> 
                      @csrf
                      @method('DELETE')
                      <button id="Sub" type ="submit" class="btn btn-sm btn-danger">Delete</button></form>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
              @foreach($stok as $data)
            <div class="modal fade" id="tambah" >
              <div class="modal-dialog">
                <div class="modal-content bg-default">
                  <div class="modal-header">
                    <h4 class="modal-title">Tambah Barang Masuk</h4>
                  </div>
                  <div class="modal-body">
                    <form action="{{route('barangmasuk.create' )}}" method="GET" enctype="multipart/form-data">
                  
                       {{ csrf_field() }} 
                        <label>Nama Barang</label>
                        <select  name="id"
                            class="form-control select2  "
                            style="width: 100%;" value="{{ $data->nama_barang }}" required>
                            <option value="" selected disabled> Pilih Barang </option>
                            @foreach($stok as $data)
                            <option value="{{ $data->id }}">{{ $data->nama_barang }} </option>
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

              <div class="modal fade" id="tambahstock" data-backdrop="static">
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