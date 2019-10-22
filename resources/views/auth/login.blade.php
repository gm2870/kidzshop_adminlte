@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center pt-5">
		<div class="col-md-5">
			<div class="login-logo">
				<a href="#">پنل <strong>مدیریت</strong></a>
			</div>
    <!-- /.login-logo -->
		<div class="card">
			<div class="card-body login-card-body">
				<p class="login-box-msg">وارد حساب کاربری خود شوید</p>
		
				<form action="{{route('login')}}" method="post">
					@csrf
				<div class="form-group has-feedback">
						<label for="email" class="w-100 col-form-label text-md-right">
							<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="ایمیل">
						</label>

					@error('email')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
					<i class="fas fa-envelope form-control-feedback"></i>
				</div>
				<div class="form-group has-feedback">
					<label for="password" class="w-100 col-form-label text-md-right">
						<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="رمز عبور">
					</label>

					@error('password')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
					<i class="fas fa-lock form-control-feedback"></i>
				</div>
				<div class="row" style="direction:ltr">
					{{-- <div class="col-8">
						<div class="checkbox icheck">
							<label>
							<div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false" style="">
								<input type="checkbox">
								<span>مرا به خاطر بسپار</span>
							</div>
							</label>
						</div>
					</div> --}}
					<!-- /.col -->
					<div class="col-4">
					<button type="submit" class="btn btn-primary btn-small btn-flat pt-1">ورود</button>
					</div>
					<!-- /.col -->
				</div>
				</form>
	{{-- 	
				<div class="social-auth-links text-center mb-3">
				<p>- OR -</p>
				<a href="#" class="btn btn-block btn-primary">
					<i class="fa fa-facebook mr-2"></i> Sign in using Facebook
				</a>
				<a href="#" class="btn btn-block btn-danger">
					<i class="fa fa-google-plus mr-2"></i> Sign in using Google+
				</a>
				</div>
				<!-- /.social-auth-links --> --}}
		
				<p class="mb-1 text-right">
				<a href="#">رمز عبور خود را فراموش کردم</a>
				</p>
				<p class="mb-0 text-right">
				<a href="{{route('register')}}" class="text-center">ثبت نام</a>
				</p>
			</div>
			<!-- /.login-card-body -->
		</div>
  	</div>
</div>
@endsection
