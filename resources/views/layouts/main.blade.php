<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Simplestmailer</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->
  <link href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}" rel="stylesheet"> 
  <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">
  <link href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}" rel="stylesheet">
  <link href="{{ asset('plugins/toastr/toastr.min.css') }}" rel="stylesheet">
  <link href="{{ asset('dist/css/adminlte.min.css') }}" rel="stylesheet">
  <link href="{{ asset('plugins/summernote/summernote-bs4.css') }}" rel="stylesheet">
  @yield('style_after_adminlte')
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- style after adminlte css will be yield hier -->
  <style>
    .active{
      color:white;
    }
  </style>
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
        <a href="{{route('contact.index')}}" class="nav-link">{{__('Contacts')}}&nbsp;&nbsp;<span class="badge badge-info right"> {{$emailContactCount}}</span></a>
      </li>
    </ul>
    <!-- SEARCH FORM -->
    <form class="form-inline ml-3" method="POST", action="{{route('mail.search')}}" id="form-search">
      @csrf
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" name="search" id="search" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search" id="fa-seach"></i>
          </button>
        </div>
      </div>
      <input type="hidden" value="" name="type" id="input-type">
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">{{Auth::user()->name }}</span><br>
          <span class="dropdown-item dropdown-header"> {{Auth::user()->email}}</span>
         
          <div class="dropdown-divider"></div>
  

          <a class="dropdown-item" href="{{ route('logout') }}"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              <i class="fas fa-sign-out-alt"></i> {{__('Logout')}}
          </a>

            
          <div class="dropdown-divider"></div>
          <a href="{{route('profile')}}" class="dropdown-item">
            <i class="fas fa-user-cog mr-2"></i>{{__('Profile')}}
          </a>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('img/logo.png')}}"  class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">SimplestMailer</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="{{route('mail.create')}}" class="nav-link active">
              <i class="nav-icon fas fa-plus"></i>
              <p>
                   {{__('New Message')}}
              </p>
            </a>
            
          </li>
        
		  
          
          <li class="nav-item {{ currentRoute(route('mail.inbox'))}}">
            <a href="{{route('mail.inbox')}}" class="nav-link">
              <i class="fas fa-inbox mr-2"></i>
              <p>
              {{__('Inbox')}}
                <span class="badge badge-info right">{{$receivedEmailCount}}</span>
              </p>
            </a>
          </li>
          <li class="nav-item {{ currentRoute(route('home')) }}">
            <a href="{{route('home')}}" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
              {{__('Sent')}}
              <span class="badge badge-info right">{{$sentEmailCount}}</span>
              </p>
            </a>
          </li>
          <li class="nav-item {{ currentRoute(route('mail.drafts')) }}">
            <a href="{{route('mail.drafts')}}" class="nav-link">
              <i class="nav-icon far fa-file"></i>
              <p>
              {{__('Drafts')}} 
              <span class="badge badge-info right">{{$draftsEmailCount}}</span>
              </p>
            </a>
          </li>
          <li class="nav-item {{ currentRoute(route('mail.trash')) }}">
            <a href="{{route('mail.trash')}}" class="nav-link">
              <i class="nav-icon far fa-trash-alt"></i>
              <p>
              {{__('Trash')}}
              <span class="badge badge-info right">{{$trashEmailCount}}</span>
              </p>
            </a>
          </li>
		  
         
          <li class="nav-header">{{__('Etiquettes')}}</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p class="text">{{__('Important')}}</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-warning"></i>
              <p>{{__('Promotions')}}</p>
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
         
        @yield('notification')
              
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       
       @yield('content')
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @section('modal')
  <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Suppression</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Voulez-vous vraiment supprimer ce contact ? </p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
              <button type="button" class="btn btn-danger" id="btn-modal-del">Confirmer</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
    <!-- modal section -->

  <footer class="main-footer">
    <strong>{{__('Copyright')}}&copy; 2014-2019 <a href="http://simplestmailer.ido">Simplestmailer</a>.</strong>
    {{__('All rights reserved')}}.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.5
    </div>
  </footer>


  <form id="logout-form" method="POST" action="{{route('logout')}}">
      @csrf
  </form>
    

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('js/typehead-4.0.2.min.js')}}"></script>
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<script src="{{asset('plugins/toastr/toastr.min.js')}}"></script>
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
<script src="{{asset('dist/js/demo.js')}}"></script>
<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>

<script>
    $('#search').keypress(function(event){
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if(keycode == '13'){
            // alert('You pressed a "enter" key in textbox');  
            $('form-search').submit();
        }
    });
</script>
@yield('script')