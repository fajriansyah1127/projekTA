<!DOCTYPE html>
<html>
<!-- head.php -->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Doc - M</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset('dokm')}}/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('dokm')}}/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('dokm')}}/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dokm')}}/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{asset('dokm')}}/dist/css/skins/skin-blue-light.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{asset('dokm')}}/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{asset('dokm')}}/bower_components/select2/dist/css/select2.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  
  <!--icon title-->
  <link rel="icon" href="{{asset('dokm')}}/image/icon.ico">
  
  <!-- Google Font -->
  <!-- Font tentative -->
  <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> -->
</head>
<body class="hold-transition skin-blue-light sidebar-mini">
  <div class="wrapper">

    <!-- header1.php -->
<header class="main-header">
  <!-- Logo -->
  <a href="index.php" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>D</b>M</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>Doc - </b>M</span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- Notifications: style can be found in dropdown.less -->
        <li class="dropdown notifications-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-bell-o"></i>
            <span class="label label-warning">1</span>
          </a>
          <ul class="dropdown-menu">
            <li class="header">1 user(s) online</li>
            <li>
              <!-- inner menu: contains the actual data -->
              <ul class="menu">
                                <li>
                  <a href="#">
                    <i class="fa fa-user text-green"></i> Admin is Online<br>
                  </a>
                </li>
                                              <li>
                  <a href="#">
                    <i class="fa fa-users text-aqua"></i> Penawaran 2018 File added
                  </a>
                </li>
                              <li>
                  <a href="#">
                    <i class="fa fa-users text-aqua"></i> Event 2018 File added
                  </a>
                </li>
                              <li>
                  <a href="#">
                    <i class="fa fa-users text-aqua"></i> Penawaran 2018 File added
                  </a>
                </li>
                              <li>
                  <a href="#">
                    <i class="fa fa-users text-aqua"></i> Rapat Pemasaran File added
                  </a>
                </li>
                            </ul>
            </li>
          </ul>
        </li>
        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="image/uploads/Admin.jpg" class="user-image" alt="User Image">
            <span class="hidden-xs">Admin</span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <img src="image/uploads/Admin.jpg" class="img-circle" alt="User Image">

              <p>
                Admin - Admin                <small>Member since 2018-06-20</small>
              </p>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                <a href="index.php?page=profile" class="btn btn-default btn-flat">Profile</a>
              </div>
              <div class="pull-right">
                <a href="pages/login_logout/logout.php" class="btn btn-default btn-flat">Sign out</a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>
    <!-- Left side column. contains the logo and sidebar -->
    <!-- aside1.php -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="image/uploads/Admin.jpg" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>Admin</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
          <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
          </button>
        </span>
      </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">

            <li class="">
        <a href="index.php"><i class="fa fa-dashboard"></i> <span>Home</span></a>
      </li>
      <li class="active">
        <a href="index.php?page=docs"><i class="fa fa-files-o"></i> <span>Document</span></a>
      </li>
      <li class="">
        <a href="index.php?page=div"><i class="fa fa-users"></i> <span>Division</span></a>
      </li>
      <li class="">
        <a href="index.php?page=user"><i class="fa fa-user"></i> <span>User</span></a>
      </li>
      
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <!-- breadcrumb.php -->
<h1>
	Document	<small></small>
</h1>      </section>

      <!-- Main content -->
      <section class="content">

        <div class="row">
  <div class="col-md-3">
    <div class="box box-solid box-primary">
      <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-book"></i> Division Category</h3>
        <div class="box-tools">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="box-body no-padding">
        <ul class="nav nav-pills nav-stacked">
          <li><a href="index.php?page=docs"><i class="fa fa-folder-o text-primary"></i> All Category</a></li>
                    <li><a href="index.php?page=docs&kat_id=2"><i class="fa fa-folder-o text-primary"></i> Pemasaran</a></li>
                    <li><a href="index.php?page=docs&kat_id=4"><i class="fa fa-folder-o text-primary"></i> Penawaran</a></li>
                    <li><a href="index.php?page=docs&kat_id=6"><i class="fa fa-folder-o text-primary"></i> Event</a></li>
                    <li><a href="index.php?page=docs&kat_id=7"><i class="fa fa-folder-o text-primary"></i> Askrindo</a></li>
                    <li><a href="index.php?page=kat"><i class="fa fa-plus text-success"></i> <strong>Manage Category</strong></a></li>
        </ul>
      </div>
      <!-- /.box-body -->
    </div>

    <div class="box box-solid box-info">
      <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-book"></i> Private Category</h3>
        <div class="box-tools">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="box-body no-padding">
        <ul class="nav nav-pills nav-stacked">
          <li><a href="index.php?page=docs&user_id=1"><i class="fa fa-folder-o text-primary"></i> All Category</a></li>
                    <li><a href="index.php?page=docs&kat_id=1&user_id=1"><i class="fa fa-folder-o text-primary"></i> Pemasaran</a></li>
                    <li><a href="index.php?page=docs&kat_id=3&user_id=1"><i class="fa fa-folder-o text-primary"></i> Penawaran</a></li>
                    <li><a href="index.php?page=docs&kat_id=5&user_id=1"><i class="fa fa-folder-o text-primary"></i> Keuangan</a></li>
                    <li><a href="index.php?page=kat"><i class="fa fa-plus text-success"></i> <strong>Manage Category</strong></a></li>
        </ul>
      </div>
      <!-- /.box-body -->
    </div>

  </div>
<div class="col-md-9">
  <div class="box box-primary">
    <div class="box-header">
      <a class="btn btn-primary" href="index.php?in=add&page=add_docs">Create Document</a>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="example2" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>No. </th>
            <th>Title</th>
            <th>File</th>
            <th>Description</th>
            <th>Date</th>
            <th>Category</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
                      <tr>
              <td>1</td>
              <td>Penawaran 2018</td>
              <td><a href="file_docs/Penawaran 2018.rtf"><i class="fa fa-file-o" style="font-size:36px; color: black;"></i></a></td>
              <td>Penawaran Produk<br>Stellar 2018</td>
              <td>2018-06-22</td>
              <td>Penawaran</td>
              <td>
                <a class="btn btn-warning" href="index.php?in=edit&page=edit_docs&id=1&p=1"><i class="fa fa-edit"></i> Update</a>
                <a class="btn btn-danger" href="pages/process/process_del_docs.php?id=1"><i class="fa fa-trash"></i> Delete</a>
              </td>
            </tr>
                        <tr>
              <td>2</td>
              <td>Event 2018</td>
              <td><a href="file_docs/Event 2018.txt"><i class="fa fa-file-o" style="font-size:36px; color: black;"></i></a></td>
              <td>Event untuk<br>pemasaran produk<br>Stellar 2018</td>
              <td>2018-06-22</td>
              <td>Event</td>
              <td>
                <a class="btn btn-warning" href="index.php?in=edit&page=edit_docs&id=3&p=1"><i class="fa fa-edit"></i> Update</a>
                <a class="btn btn-danger" href="pages/process/process_del_docs.php?id=3"><i class="fa fa-trash"></i> Delete</a>
              </td>
            </tr>
                        <tr>
              <td>3</td>
              <td>Penawaran 2018</td>
              <td><a href="file_docs/Penawaran 2018.rtf"><i class="fa fa-file-o" style="font-size:36px; color: black;"></i></a></td>
              <td>Penawaran Produk<br>Stellar 2018</td>
              <td>2018-06-23</td>
              <td>Penawaran</td>
              <td>
                <a class="btn btn-warning" href="index.php?in=edit&page=edit_docs&id=4&p=1"><i class="fa fa-edit"></i> Update</a>
                <a class="btn btn-danger" href="pages/process/process_del_docs.php?id=4"><i class="fa fa-trash"></i> Delete</a>
              </td>
            </tr>
                        <tr>
              <td>4</td>
              <td>Rapat Pemasaran</td>
              <td><a href="file_docs/Rapat Pemasaran.docx"><i class="fa fa-file-o" style="font-size:36px; color: black;"></i></a></td>
              <td>Rapat untuk membuat<br>strategi pemasaran<br>produk Stellar 2018</td>
              <td>2018-06-22</td>
              <td>Pemasaran</td>
              <td>
                <a class="btn btn-warning" href="index.php?in=edit&page=edit_docs&id=5&p=1"><i class="fa fa-edit"></i> Update</a>
                <a class="btn btn-danger" href="pages/process/process_del_docs.php?id=5"><i class="fa fa-trash"></i> Delete</a>
              </td>
            </tr>
                      </tbody>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
  <!-- /.box -->
</div>
<!-- /.col -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
	<div class="pull-right hidden-xs">
		<b>Version</b> 2.4.0
	</div>
	<strong>Copyright &copy; 2017-2018 <a href="#">Doc - M</a>.</strong> All rights
	reserved.
</footer>
  </div>
  <!-- ./wrapper -->

  <!-- script.php -->
<!-- jQuery 3 -->
<script src="{{asset('dokm')}}/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('dokm')}}/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
	$.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('dokm')}}/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Slimscroll -->
<script src="{{asset('dokm')}}/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="{{asset('dokm')}}/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('dokm')}}/dist/js/adminlte.min.js"></script>
</body>
</html>