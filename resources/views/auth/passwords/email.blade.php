@extends('layouts.notification')
@section('notification')

  @if(session('status'))
    <div class="alert alert-success alert-dismissible ">
  {{ session('status') }}
  </div>

  @endif
@endsection
@section('content')
<div class="container">     
 <form action="{{route('password.email')}}" method="post">
        @csrf
        <div class="input-group mb-3">
          <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" required autocomplete="email" autofocus="">
          
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          
          @error('email')
          <span class="invalid-feedback" role="alert">
              <strong>{{$message}}</strong>
          </span>
          @enderror

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
@endsection