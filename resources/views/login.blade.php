<!DOCTYPE html>
<html lang="en">

<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="{{ asset('css/adlogin.css') }}" rel="stylesheet">
	<link href="{{ asset('css/util.css') }}" rel="stylesheet">
</head>

<body>
	<form method="GET" enctype="multipart/form-data">
		@csrf
		<input type="hidden" name="_token" value="{{ csrf_token() }}" />
		<div class="limiter">
			<div class="container-login100">
				<div class="wrap-login100">
					<div class="login100-pic js-tilt" data-tilt>
						<img src="vendor/images/img-01.png" alt="IMG">
					</div>

					<form class="login100-form validate-form">
						<span class="login100-form-title">
							Member Login
						</span>

						<div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
							<input class="input100" type="text" name="email" placeholder="Email">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-envelope" aria-hidden="true"></i>
							</span>
						</div>

						<div class="wrap-input100 validate-input" data-validate="Password is required">
							<input class="input100" type="password" name="password" placeholder="Password">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-lock" aria-hidden="true"></i>
							</span>
						</div>

						<a href="{{route('dashboard')}}" style="text-decoration:none">
							<div class="container-login100-form-btn">
								<button name="submit" type="submit" class="login100-form-btn">
									Login
								</button>
							</div>
						</a>

						<div class="text-center p-t-12">
							<span class="txt1">
								Forgot
							</span>
							<a class="txt2" href="#">
								Username / Password?
							</a>
						</div>

						<div class="text-center p-t-136">
							<a class="txt2" href="#">
								Create your Account
								<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
							</a>
						</div>
					</form>
				</div>
			</div>
		</div>

	</form>

</body>

</html>