<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->@auth
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('foto/')}}/{{auth()->user()->foto}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Nama User</a>
        </div>
      </div>
@endauth
{{-- INI BAGIAN ROLE Admin --}}
@if (auth()->user()->role == 'Admin')
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item ">
               {{-- <li class="nav-item menu-open">  --}}
            <a href="/index" class="nav-link {{Request::is('index')?'active':''}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item ">
               {{-- <li class="nav-item menu-open">  --}}
            <a href="#" class="nav-link {{Request::is('produk/create')?'active':''}} {{Request::is('produk')?'active':''}}{{Request::is('asuransi')?'active':''}} {{Request::is('asuransi/create')?'active':''}}{{Request::is('asuransi.edit')?'active':''}} {{Request::is('outlet')?'active':''}} ">
              <i class="nav-icon fas fa-folder"></i>
              <p>
                Data Master
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('outlet.index') }}" class="nav-link {{Request::is('outlet/create')?'active':''}}  {{Request::is('outlet')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Outlet</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('produk.index') }}" class="nav-link {{Request::is('produk/create')?'active':''}}  {{Request::is('produk')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Produk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('asuransi.index') }}" class="nav-link {{Request::is('asuransi/create')?'active':''}} {{Request::is('asuransi')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Unit Asuransi</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item ">
            <a href="" class="nav-link {{Request::is('dokumen/create')?'active':''}} {{Request::is('peminjam/create')?'active':''}} {{Request::is('dokumen')?'active':''}}">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Dokumen Klaim
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('dokumen.index') }}" class="nav-link {{Request::is('dokumen')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Dokumen</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('peminjam.index') }}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Peminjam</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item">
            <a href="#" class="nav-link nav-link ">
              <i class="nav-icon fas fa-chart-pie "></i>
              <p>
                Barang
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/charts/chartjs.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Barang Masuk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/flot.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Barang Keluar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/inline.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Stok</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('satuan.index') }}" class="nav-link {{Request::is('satuan/create')?'active':''}} {{Request::is('satuan')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Satuan</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link {{Request::is('user')?'active':''}}{{Request::is('user/create')?'active':''}}{{Request::is('user/5/edit')?'active':''}}"   >
              <i class="nav-icon fas fa-user "></i>
              <p>
                Manajemen User
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('user.index') }}" class="nav-link {{Request::is('user')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('user.create') }}" class="nav-link {{Request::is('user/create')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah User</p>
                </a>
              </li>
            </ul>
          </li>
        </nav>
      <!-- /.sidebar-menu -->
   
{{-- INI BAGIAN ROLE Satpam --}}
@elseif (auth()->user()->role=='Satpam')
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item ">
             {{-- <li class="nav-item menu-open">  --}}
          <a href="/index" class="nav-link {{Request::is('index')?'active':''}}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>

        <li class="nav-item ">
          <a href="" class="nav-link {{Request::is('dokumen')?'active':''}}">
            <i class="nav-icon fas fa-file"></i>
            <p>
              Dokumen
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('dokumen.create') }}" class="nav-link {{Request::is('dokumen/create')?'active':''}}">
                <i class="far fa-circle nav-icon"></i>
                <p>Upload Dokumen</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('dokumen.index') }}" class="nav-link {{Request::is('dokumen')?'active':''}}">
                <i class="far fa-circle nav-icon"></i>
                <p>List Dokumen</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="./index3.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Peminjam</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link nav-link ">
            <i class="nav-icon fas fa-chart-pie "></i>
            <p>
              Barang
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="pages/charts/chartjs.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Barang Masuk</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/charts/flot.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Barang Keluar</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/charts/inline.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Stok</p>
              </a>
            </li>
          </ul>
        </li>
      </nav>

{{-- INI BAGIAN ROLE PEGAWAI --}}
@elseif (auth()->user()->role=='Pegawai')
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item ">
             {{-- <li class="nav-item menu-open">  --}}
          <a href="/index" class="nav-link {{Request::is('index')?'active':''}}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>

        <li class="nav-item ">
          <a href="" class="nav-link {{Request::is('dokumen')?'active':''}}">
            <i class="nav-icon fas fa-file"></i>
            <p>
              Dokumen
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('dokumen.create') }}" class="nav-link {{Request::is('dokumen/create')?'active':''}}">
                <i class="far fa-circle nav-icon"></i>
                <p>Upload Dokumen</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('dokumen.index') }}" class="nav-link {{Request::is('dokumen')?'active':''}}">
                <i class="far fa-circle nav-icon"></i>
                <p>List Dokumen</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="./index3.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Peminjam</p>
              </a>
            </li>
          </ul>
        </li>
      </nav>

{{-- INI BAGIAN ROLE Magang --}}
@elseif (auth()->user()->role=='Magang')
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item ">
               {{-- <li class="nav-item menu-open">  --}}
            <a href="/index" class="nav-link {{Request::is('index')?'active':''}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item ">
            <a href="" class="nav-link {{Request::is('dokumen')?'active':''}}">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Dokumen
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('dokumen.create') }}" class="nav-link {{Request::is('dokumen/create')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Upload Dokumen</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('dokumen.index') }}" class="nav-link {{Request::is('dokumen')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Dokumen</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index3.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Peminjam</p>
                </a>
              </li>
            </ul>
          </li>
        </nav>
      @endif

    
    </div>
    <!-- /.sidebar -->
  </aside>