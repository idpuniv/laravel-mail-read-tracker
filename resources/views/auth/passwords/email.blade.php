<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{__('Login')}}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}" rel="stylesheet"> 

  <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">
  <link href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('dist/css/adminlte.min.css') }}" rel="stylesheet">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <style>
      .btn_login{
          height:40px;
          width:auto;
          padding: 10px;
      }
  </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="{{url('/')}}">Simplestmailer</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">{{__('You forgot your password? Here you can easily retrieve a new password.')}}</p>

      <form action="recover-password.html" method="post">
        @csrf
        <div class="input-group mb-3">
          <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" required autocomplete="email" autofocus="">
          @error('email')
          <span class="invalid-feedback" role="alert">
              <strong>{{$message}}</strong>
          </span>
          @enderror
          
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">{{__('Request new password')}}</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mt-3 mb-1">
        <a href="{{route('login')}}">{{__('Login')}}</a>
      </p>
      <p class="mb-0">
        <a href="{{route('register')}}" class="text-center">{{__('Register')}}</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>

<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>

</body>
</html>
