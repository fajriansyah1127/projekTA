@extends('layout.layout')

@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12 p-5 pt-2">

                <!-- membuat form -->
                <div class="container">
                            <div class="card mt-2">
                        <div class="card-header">
                          <h4 style="text-align:center"><b>Edit Data Produk </b></h4>
                        </div>
                        <div class="card-body">
              
                <!-- membuat formnya -->
                <!-- bagian judul -->
              
                        <form action="{{route('produk.update',$produk->id)}}" method="POST" enctype="multipart/form-data">
                          @method('PUT')
                          {{ csrf_field() }}
                          <div class="form-group row">
                            <label for="Judul" class="col-sm-2 col-form-label">Nama Produk </label>
                            <div class="col-sm-10">
                                 <input type="text" id="nama" name="Nama" class="form-control" placeholder="Masukkan Nama " required value="{{ $produk->nama }}">
                                 <div class ="text-danger">
                                  @error('nama')
                                  {{ $message }}
                                  @enderror
                                </div>
                            </div>
                        </div>
                          
                        <div class="form-group row">
                          <label for="disabledSelect" class="col-sm-2 col-form-label">Unit Asuransi</label>
                          <div class="col-sm-10"> 
                         <select id="disabledSelect" name="Asuransi" class="form-control @error('asuransi') is-invalid @enderror" >
                         @foreach($asuransi as $data)
                         <option value="{{ $data->id }}">{{ $data->nama }}</option>
                         @endforeach
                         </select>
                          </div>
                        </div>
          
                  
          
          <!-- bagian tanggal -->
                      <br>
                       
                                          
          
                          <div class="card-footer text-muted">
                              <!-- bagian submit -->
                              <button type="submit" class="btn btn-danger mb-3">Submit</button>
                          </div>
                      </form>
                      
                </div>
              
              
                </div>
              </div>
              
          <!-- ./col -->
        </div>
    </div>
        <!-- /.row -->
        <!-- Main row -->
       
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->

    </section>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection