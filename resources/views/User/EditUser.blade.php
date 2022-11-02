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
                                    <h4 style="text-align:center"><b>Edit Data User </b></h4>
                                </div>
                                <div class="card-body">

                                    <!-- membuat formnya -->
                                    <!-- bagian judul -->

                                    <form action="{{ route('user.update', $user->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @method('PUT')
                                        {{ csrf_field() }}

                                        <div class="form-group row">
                                            <label for="Judul" class="col-sm-2 col-form-label">Nama</label>
                                            <div class="col-sm-10">
                                                <input type="text" id="nama" name="nama" class="form-control"
                                                    placeholder="Masukkan Nama " required value="{{ $user->nama }}">
                                                <div class="text-danger">
                                                    @error('nama')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="Judul" class="col-sm-2 col-form-label">Email </label>
                                            <div class="col-sm-10">
                                                <input type="text" id="email" name="email" class="form-control "
                                                    placeholder="{{ $user->email }}" disabled value="">
                                                <div class="text-danger">
                                                    @error('email')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="Judul" class="col-sm-2 col-form-label">Jabatan </label>
                                            <div class="col-sm-10">
                                                <input type="text" id="jabatan" name="jabatan" class="form-control"
                                                    placeholder="Masukkan Jabatan ex Magang, Kadep Gadai" required
                                                    value="{{ $user->jabatan }}">
                                                <div class="text-danger">
                                                    @error('jabatan')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="Judul" class="col-sm-2 col-form-label"> Kontak </label>
                                            <div class="col-sm-10">
                                                <input type="text" id="kontak" name="kontak" class="form-control "
                                                    placeholder="Masukkan Nomor telephone" required
                                                    value="{{ $user->kontak }}">
                                                <div class="text-danger">
                                                    @error('kontak')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="Judul" class="col-sm-2 col-form-label"> Alamat </label>
                                            <div class="col-sm-10">
                                                <input type="text" id="alamat" name="alamat" class="form-control "
                                                    placeholder="Masukkan Alamat" required value="{{ $user->alamat }}">
                                                <div class="text-danger">
                                                    @error('alamat')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        {{-- <div class="form-group row">
                              <label for="Judul" class="col-sm-2 col-form-label"> Password </label>
                              <div class="col-sm-10">
                                    <input type="password" id="password" name="password" class="form-control " placeholder="Masukkan Password" required >  
                                    <div class ="text-danger">
                                      @error('password')
                                      {{ $message }}
                                      @enderror
                                    </div>
                                  </div>
                          </div> --}}
                                        <div class="form-group row">
                                            <label for="disabledSelect" class="col-sm-2 col-form-label">Role</label>
                                            <div class="col-sm-10">
                                                <select id="disabledSelect" name="role"
                                                    class="form-control  @error('role') is-invalid @enderror"
                                                    style="width: 100%;" value="{{ $user->role }}" required>

                                                    <option value="" selected disabled>Pilih Role</option>
                                                    @if ($user->role == 'Admin')
                                                        <option value="Admin" selected>Admin</option>
                                                        <option value="Magang">Magang</option>
                                                        <option value="Pegawai">Pegawai</option>
                                                        <option value="Satpam">Satpam</option>
                                                    @elseif ($user->role == 'Magang')
                                                        <option value="Magang" selected>Magang</option>
                                                        <option value="Admin">Admin</option>
                                                        <option value="Pegawai">Pegawai</option>
                                                        <option value="Satpam">Satpam</option>
                                                    @elseif ($user->role == 'Pegawai')
                                                        <option value="Pegawai" selected>Pegawai</option>
                                                        <option value="Admin">Admin</option>
                                                        <option value="Magang">Magang</option>
                                                        <option value="Satpam">Satpam</option>
                                                    @elseif ($user->role == 'Satpam')
                                                        <option value="Satpam" selected>Satpam</option>
                                                        <option value="Admin">Admin</option>
                                                        <option value="Magang">Magang</option>
                                                        <option value="Pegawai">Pegawai</option>
                                                    @endif

                                                </select>
                                                <div class="text-danger">
                                                    @error('role')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>


                                        <div class="card-footer text-muted">
                                            <div class="form-group">
                                                <label for="exampleFormControlFile1">Masukkan Foto</label>
                                                <input type="file" name="foto" class="form-control"
                                                    value="{{ old('foto') }}" accept="image/png, image/gif, image/jpeg">
                                                <div class="text-danger">
                                                    @error('foto')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card-footer">

                                            <!-- bagian submit -->

                                            <button type="submit" class="btn btn-success float-right">Submit</button>

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
