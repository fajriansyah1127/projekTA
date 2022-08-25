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
                          <h4 style="text-align:center"><b>TAMBAH OUTLET </b></h4>
                        </div>
                        <div class="card-body">
              
                <!-- membuat formnya -->
                <!-- bagian judul -->
              
                <form  action="{{ route('outlet.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                      <div class="form-group row">
                          <label for="Judul" class="col-sm-2 col-form-label">Nama Outlet </label>
                          <div class="col-sm-10">
                               <input type="text" name="nama_outlet" class="form-control" placeholder="Masukkan Nama "required>
                               <div class ="text-danger">
                                @error('nama_outlet')
                                {{ $message }}
                                @enderror
                              </div>
                          </div>
                      </div>                        
                            <!-- bagian submit -->
                            <button type="submit" class="btn btn-success float-right">Submit</button>
                        
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
 @endsection
