<!DOCTYPE html>
<html>
<head>
	<title>{{__('Connexion Page')}}</title>
   <!--Made with love by Mutiullah Samim -->
   
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
	<!--Custom styles-->
	<style>
		.login_btn{
			width:auto;
		}
		body{
			background-image: url("{{asset('img/welcome_bak.jpeg')}}");
		}
	</style>
</head>
<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>{{__('Connexion Page')}}</h3>
			</div>
			<div class="card-body">
				<form method="POST" action="{{route('login')}}">
					@csrf
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}" placeholder="Email">
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" placeholder="{{__('Password')}}" name="password">
					</div>
					<div class="row align-items-center remember">
						<input type="checkbox">{{__('Remember Me')}}
					</div>
					<div class="form-group">
						<input type="submit" value="{{__('Login')}}" class="btn float-right login_btn">
					</div>
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					<a href="{{route('register')}}">{{__('Register')}}</a>
				</div>
				<div class="d-flex justify-content-center">
					@if (Route::has('password.request'))
					    <a class="btn btn-link" href="{{ route('password.request') }}">
					        {{ __('Forgot Your Password?') }}
					    </a>
					@endif
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>