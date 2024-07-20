{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <!-- Ionicons -->

    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"href="{{ url('bootstrap/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ url('bootstrap/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ url('bootstrap/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('bootstrap/dist/css/adminlte.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ url('bootstrap/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ url('bootstrap/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ url('bootstrap/plugins/summernote/summernote-bs4.min.css') }}">

    <link rel="stylesheet" href="{{asset('style.css')}}">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{url('bootstrap/dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60"
                width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="index3.html" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>


                <li class="nav-item">
                    <a class="nav-link"  href="#" role="button">
                       <i class="fa-solid fa-user"></i>
                    </a>
                </li>
                 <li class="nav-item">
                    <a class="nav-link"  href="#" role="button">
                        <i class="fa fa-sign-in"></i>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-light-olive elevation-4">
            <!-- Brand Logo -->
            @include('admin.layouts.menu')
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2024 <a href="https://adminlte.io">Abdel Haris Aragati</a>.</strong>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ url('bootstrap/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ url('bootstrap/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ url('bootstrap/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ url('bootstrap/plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ url('bootstrap/plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ url('bootstrap/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ url('bootstrap/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ url('bootstrap/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ url('bootstrap/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ url('bootstrap/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ url('bootstrap/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ url('bootstrap/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ url('bootstrap/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ url('bootstrap/dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ url('bootstrap/dist/js/demo.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ url('bootstrap/dist/js/pages/dashboard.js') }}"></script>
</body>

</body>

</html> --}}


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('homepage-section/imgs/template/logo-1.png')}}">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{url('admin-page/assets/css/style.css?v=1.0.0')}}" rel="stylesheet">
    <title>delcraft - Admin</title>
  </head>
  <body>
    <div class="screen-overlay"></div>
    @include('admin.layouts.menu')

    <main class="main-wrap">
      <header class="main-header navbar">
        <div class="col-search">
          <form class="searchform">
            <div class="input-group">
      
            </div>
          </form>
        </div>
        <div class="col-nav">
          <button class="btn btn-icon btn-mobile me-auto" data-trigger="#offcanvas_aside"><i class="material-icons md-apps"></i></button>
          <ul class="nav">
            <li class="nav-item"><a class="nav-link btn-icon" href="#"><i class="material-icons md-notifications animation-shake"></i><span class="badge rounded-pill">3</span></a></li>
            <li class="dropdown nav-item"><a class="dropdown-toggle" id="dropdownAccount" data-bs-toggle="dropdown" href="#" aria-expanded="false">{{Auth::user()->name}}</a>
              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownAccount"><a class="dropdown-item" href="#"><i class="material-icons md-perm_identity"></i>Edit Profile</a>
                <a class="dropdown-item" href="#"><i class="material-icons md-settings md-help_outline"></i>Account Settings</a>
                <a class="dropdown-item" href="{{route('home')}}"><i class="material-icons md-settings md-shopping_cart"></i>Go to shopping</a>
                <div class="dropdown-divider"></div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">Sign out</a>
                    </form>
            </li>
          </ul>
        </div>
      </header>

      @yield('content')

      <footer class="main-footer font-xs">
        <div class="row pb-30 pt-15">
          <div class="col-sm-6">
            <script>document.write(new Date().getFullYear())</script> &copy;, delcraft - Furnitures & Craft .
          </div>
          <div class="col-sm-6">
            <div class="text-sm-end">All rights reserved</div>
          </div>
        </div>
      </footer>
    </main>

    @include('sweetalert::alert')
    <script src="{{url('admin-page/assets/js/vendors/jquery-3.6.0.min.js')}}"></script>
    <script src="{{url('admin-page/assets/js/vendors/bootstrap.bundle.min.js')}}"></script>
    <script src="{{url('admin-page/assets/js/vendors/select2.min.js')}}"></script>
    <script src="{{url('admin-page/assets/js/vendors/perfect-scrollbar.js')}}"></script>
    <script src="{{url('admin-page/assets/js/vendors/jquery.fullscreen.min.js')}}"></script>
    <script src="{{url('admin-page/assets/js/vendors/chart.js')}}"></script>
    <script src="{{url('admin-page/assets/js/main.js?v=1.0.0')}}"></script>
    <script src="{{url('admin-page/assets/js/custom-chart.js')}}" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
