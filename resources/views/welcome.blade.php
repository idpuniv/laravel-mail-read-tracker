@extends('layouts.default')
@section('style')
<style type="text/css">
    body{
        background-image: url("img/bg.jpg");
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover; 

    }
    html, body{
        color: white;
    }
    img{

        opacity: 0.2;
    }
</style>
@endsection
@section('content')
    @if (Route::has('login'))
                    <div class="top-right links">
                        @auth
                            <a href="{{ route('home') }}">{{__('Home')}}</a>
                        @else
                            <a href="{{ route('login') }}">{{__('Login')}}</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}">{{__('Register')}}</a>
                            @endif
                        @endauth
                    </div>
                @endif

                <div class="content">
                    <div class="title m-b-md">
                        <?php //if(Auth::user()->verified == false){Auth::logout();}?>
                        SimplestMailer
                    </div>

                    <!-- <div class="links">
                        <a href="https://laravel.com/docs">Docs</a>
                        <a href="https://laracasts.com">Laracasts</a>
                        <a href="https://laravel-news.com">News</a>
                        <a href="https://blog.laravel.com">Blog</a>
                        <a href="https://nova.laravel.com">Nova</a>
                        <a href="https://forge.laravel.com">Forge</a>
                        <a href="https://vapor.laravel.com">Vapor</a>
                        <a href="https://github.com/laravel/laravel">GitHub</a>
                    </div> -->
                </div>
@endsection