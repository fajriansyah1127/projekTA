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
        <!-- Small boxes (Stat box) -->
        <div class="card">
        <div class="card-body table-responsive">
        <div class="row">
          @foreach($kontak as $data)
          <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
            <div class="card bg-light d-flex flex-fill">
              <div class="card-header text-muted border-bottom-0">
                  {{ $data->role }}
              </div>
              <div class="card-body pt-0">
                <div class="row">
                  <div class="col-7">
                    <h2 class="lead"><b>{{ $data->nama }}</b></h2>
                    <p class="text-muted text-sm"><b>Jabatan: </b> {{ $data->jabatan }} </p>
                    <ul class="ml-4 mb-0 fa-ul text-muted">
                      <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: {{ $data->alamat }}</li>
                      <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone : {{ $data->kontak }}</li>
                    </ul>
                  </div>
                  <div class="col-5 text-center">
                    <img style = "border-radius: 50%;" src="{{asset('foto/')}}/{{ $data->foto }}" alt="user-avatar" class="img-circle img-fluid">
                  </div>
                </div>
              </div>
            </div>
          </div> 
         
       
          
          
          @endforeach

          
        </div>
      </div>
      </div>
      </div>

     
      
      </div>

      

    </section>


@endsection
