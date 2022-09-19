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
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Satuan</li>
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
            </div>
          
            <div class="card-body ">
              <table id="exampledokumen1" class="table table-bordered table-hover ">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jenis</th>
                    <th>Jumlah</th>
                    <th>Satuan</th>
                    <th>Foto</th>
                    <th>Penerima</th>
                    <th>Tanggal Masuk</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                   <tr>@foreach($barangmasuk as $data)
                    <td>{{ $loop->iteration}}</td>
                    <td>{{ $data->nama}}</td> 
                    <td>{{ $data->jenis }}</td> 
                    <td>{{ $data->total_barangmasuk }}</td> 
                    <td>{{ $data->satuan }}</td> 
                    <td><img src="{{ url('foto_barangmasuk/'.$data->foto) }}" alt="foto" width="100px" ></td> 
                    <td>{{ $data->penerima }}</td> 
                    <td>{{ $data->tanggal_masuk }}</td> 
                    <td>
                      <a href="{{ route('barangmasuk.edit',$data->id) }}"class="btn btn-sm btn-warning">Edit</a>
                      <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#staticBackdropdelete{{$data->id}}">
                        Delete
                      </button>
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
           
</section>
</div>
@endsection