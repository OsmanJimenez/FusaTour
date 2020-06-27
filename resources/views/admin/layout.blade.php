<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>FusaTour | Administrador</title>

  <!-- Theme style -->
  <link rel="stylesheet" href="../../adminlts/css/adminlte.css">
  <!-- Tupicons -->
  <link rel='stylesheet' href='../../adminlts/css/typicons/typicons.min.css' />
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../../adminlts/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="../../adminlts/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../adminlts/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../adminlts/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="../../adminlts/plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../../adminlts/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../../adminlts/plugins/fontawesome-free/css/all.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../../adminlts/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../../adminlts/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../../adminlts/plugins/summernote/summernote-bs4.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="../../adminlts/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../../adminlts/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="../../adminlts/plugins/toastr/toastr.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Dropzone -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.0.1/dropzone.css">
  <!-- Style Help -->
  <link rel="stylesheet" href="../../adminlts/css/style.css">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- SEARCH FORM -->
      <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
          <input class="form-control form-control-navbar" type="search" placeholder="Buscar" aria-label="Buscar">
          <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">

        <!-- Close Session Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fas fa-sliders-h"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-header">Configuración</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-user mr-2"></i> Perfil
            </a>
            <div class="dropdown-divider"></div>
            <a href="{{url('logout')}}" class="dropdown-item">
              <i class="fas fa-window-close mr-2"></i> Cerrar Sesión
            </a>
          </div>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-light-primary elevation-4">
      <!-- Brand Logo -->
      <a href="/admin" class="brand-link">
        <img src="../../images/icons/icon-512x512.png" alt="FusaTour Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">FusaTour</span>
      </a>
      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="/images/{{ auth()->user()->avatar }}" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">{{ auth()->user()->name }}</a>
          </div>
        </div>
        <!-- Sidebar Menu -->

        @include('admin.partials.nav')

        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">

          @yield('header')

        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->

      @yield('content')

      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-light">
      <!-- Control sidebar content goes here -->
      <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
      </div>
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- To the right -->
      <div class="float-right d-none d-sm-inline">
        :)
      </div>
      <!-- Default to the left -->
      <strong>Copyright &copy; 2020 <a href="https://fusatour.site">FusaTour</a>.</strong> Todos los derechos Reservados.
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="../../adminlts/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../../adminlts/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../adminlts/js/adminlte.min.js"></script>
  <!-- Select2 -->
  <script src="../../adminlts/plugins/select2/js/select2.full.min.js"></script>
  <!-- Bootstrap4 Duallistbox -->
  <script src="../../adminlts/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
  <!-- InputMask -->
  <script src="../../adminlts/plugins/moment/moment.min.js"></script>
  <script src="../../adminlts/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
  <!-- date-range-picker -->
  <script src="../../adminlts/plugins/daterangepicker/daterangepicker.js"></script>
  <!-- bootstrap color picker -->
  <script src="../../adminlts/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="../../adminlts/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Bootstrap Switch -->
  <script src="../../adminlts/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
  <!-- DataTables -->
  <script src="../../adminlts/plugins/datatables/jquery.dataTables.js"></script>
  <script src="../../adminlts/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
  <script src="../../adminlts/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="../../adminlts/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../../adminlts/js/demo.js"></script>
  <!-- Summernote -->
  <script src="../../adminlts/plugins/summernote/summernote-bs4.min.js"></script>
  <!-- DropZone -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.0.1/min/dropzone.min.js"></script>
  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <!-- Scripts -->
  <script src="../../adminlts/js/script.js"></script>
  <!-- QR Code Scripts -->
  <script src="../../adminlts/js/qrcode.js"></script>
  <script src="https://cdn.bootcss.com/dom-to-image/2.6.0/dom-to-image.min.js"></script>
  <script src="https://cdn.bootcss.com/FileSaver.js/2014-11-29/FileSaver.min.js"></script>

  @if (session()->has('flash'))
  <script>
    Swal.fire({
      icon: 'success',
      title: 'Oops...',
      text: '{{ session('
      flash ') }}'
    })
  </script>
  @endif

  @include('admin.posts.create')

</body>

</html>