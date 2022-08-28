@extends('layout.layout')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Satuan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Satuan</li>
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
              <a class="btn btn-sm btn-primary" href="{{ route('satuan.create') }}">Tambah Satuan</a>
              </div>
            <!-- /.card-header -->
            <div class="card-body ">
              <table id="" class="table table-bordered table-hover ">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jenis</th>
                    <th>Detail</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>@foreach($satuan as $data)
                    <td>{{ $loop->iteration}}</td>
                    <td>{{ $data->nama }}</td>
                    <td>{{ $data->jenis }}</td> 
                    <td>{{ $data->detail }}</td> 
                    <td>
                      <button type="button" id="id" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#staticBackdropedit{{-- $data->id --}}">
                        Edit
                      </button>
                      <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#staticBackdropdelete{{-- $data->id --}}">
                        Delete
                      </button>
                        <div class="modal fade" id="staticBackdropdelete{{-- $data->id --}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content bg-default">
                              <div class="modal-body">
                                Apaknah anda yakin menghapus {{-- $data->id --}} ?
                              </div>
                              <div class="modal-footer justify-content-between">
                                <button type="button" class="btn  btn-sm btn-primary" data-dismiss="modal">Close</button>
                                <form action="{{route('satuan.destroy',1{{-- $data->id --}})}}" method="POST"> 
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
            {{-- @foreach($produk as $data) --}}
            <div class="modal fade" id="staticBackdropedit{{-- $data->id --}}" >
              <div class="modal-dialog">
                <div class="modal-content bg-default">
                  {{-- <div class="modal-header">
                  </div> --}}
                  <div class="modal-body">
                    <form action="{{route('produk.update',1{{-- $data->id --}})}}" method="POST" enctype="multipart/form-data">
                      @method('PUT')
                      {{ csrf_field() }}
                        <label for="Judul" >Nama Produk </label>
                             <input type="text" id="nama" name="Nama" class="form-control" placeholder="Masukkan Nama" required value="">
                             <div class ="text-danger mt-2">
                              @error('nama')
                              {{ $message }}
                              @enderror
                            </div>

                      <label for="disabledSelect">Unit Asuransi</label>
                      <select id="disabledSelect" name="Asuransi" class="form-control select2 @error('asuransi') is-invalid @enderror" style="width: 100%;" value="" required >
                      <option value="" selected="">Pilih Produk dan Asuransi</option> 
                      {{-- @foreach($asuransi as $datas) <option value="{{ $datas->id }}" {{ $data->asuransi->nama == $datas->id ? 'selected' : '' }}>{{ $datas->nama }}</option> @endforeach --}}
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
              {{-- @endforeach   --}}
            <!-- /.card-body -->
  <!-- /.content -->
  <div class="modal fade" id="staticBackdroptambah" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Satuan</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('satuan.store') }}" method="POST">
                    {{ csrf_field() }}

                    <label>Nama Satuan </label>
                    <input type="text" name="nama_satuan" class="form-control"
                        placeholder="Masukkan Nama Satuan "required>

                        <label>Jenis  </label>
                        <input type="text"  name="jenis_satuan" class="form-control"
                            placeholder="Masukkan Jenis  "required>

                            <label>Detail  </label>
                    <input type="text" name="detail_satuan" class="form-control"
                        placeholder="Masukkan Detail "required>


                    <br/>
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