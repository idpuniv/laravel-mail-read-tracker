<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SimplestMailer</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}" rel="stylesheet"> 

  <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">
  
  <link href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet">
  
  <link href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}" rel="stylesheet">
 

  <link href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}" rel="stylesheet">
 
  <link href="{{ asset('dist/css/adminlte.min.css') }}" rel="stylesheet">
  
  <link href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}" rel="stylesheet">

  <link href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}" rel="stylesheet">
 
  <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.css" rel="stylesheet"> -->
  
  <link href="{{ asset('plugins/summernote/summernote-bs4.css') }}" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  @yield('style')
</head>
    
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('home')}}" class="nav-link">{{__('Home')}}</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">{{__('Contact')}}</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
    
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">{{Auth::user()->name}}</span>
          <div class="dropdown-divider"></div>
  

          <a class="dropdown-item" href="{{ route('logout') }}"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              <i class="fas fa-sign-out-alt"></i> {{__('Logout')}}
          </a>

            
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-user-cog mr-2"></i> Profile
          </a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link " data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4 sidebar-no-collapse">
    <!-- Brand Logo -->
    <a href="{{route('home')}}" class="brand-link">
      <img src=" {{asset('images/slogo.png')}}" alt="SimplestMailer Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Simplestmailer</span>
    </a>

    <style>
      #new-email{
        background-color:#007bff;
        text-align:center;
        padding-right:0px;
        padding-left:10px;
      }
    </style>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex" id="new-email">
        <div class="image d-block">
        </div>
        <div class="info" >
          <a href="{{route('mail.create')}}" class="d-block active">{{__('New Message')}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="fas fa-inbox nav-icon"></i>
                  <p>{{__('Inbox')}}</p>
                </a>
            </li>
            <li class="nav-item">
              <a href="{{route('home')}}" class="nav-link">
                <i class="far fa-envelope nav-icon"></i>
                <p>{{__('Sent')}}</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('mail.drafts')}}" class="nav-link">
                <i class="far fa-file-alt nav-icon"></i>
                <p>{{__('Drafts')}}</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('mail.trash')}}" class="nav-link">
                <i class="fas fa-trash nav-icon"></i>
                <p>{{__('Trash')}}</p>
              </a>
            </li>
      </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
            @yield('notification')
              <!-- <h1 class="m-0 text-dark">{{__('Dashboard Toast')}}</h1> -->
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

          @yield('content')

      <!-- /.content -->

      <!-- /.content -->
    </div>
  </div>
  <!-- /.content-wrapper -->


  <footer class="main-footer">
    <strong>Copyright&copy; 2019-20120 <a href="http://adminlte.io">Simplestmailer.tk</a>.</strong>{{__('All rights reserved')}}
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0
    </div>
  </footer>
  <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>

  <script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
  <script>
      $.widget.bridge('uibutton', $.ui.button)
  </script>

  <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script> 

  <script src="{{asset('plugins/sparklines/sparkline.js')}}"></script>

  <script src="{{asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script>

  <script src="{{asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>

  <script src="{{asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>

  <script src="{{asset('plugins/moment/moment.min.js')}}"></script>

  <script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>

  <script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>

  <script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>

  <script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
 
  <script src="{{asset('dist/js/adminlte.min.js')}}"></script>

  <script src="{{asset('dist/js/pages/dashboard.js')}}"></script>

  <script src="{{asset('dist/js/demo.js')}}"></script>
  @yield('script')

  <script type="text/javascript">
    $('.sidebar-no-collapse').collapse('false');
  </script>
</body>
</html>