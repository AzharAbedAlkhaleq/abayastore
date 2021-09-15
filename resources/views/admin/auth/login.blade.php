<!DOCTYPE html>
<html lang="en">

<head>

	<title>صفحة الدخول</title>
	<!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 11]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="" />
	<meta name="keywords" content="">
	<meta name="author" content="Phoenixcoded" />
	<!-- Favicon icon -->
	<link rel="icon" href="{{ asset('dashboard') }}/assets/images/favicon.ico" type="image/x-icon">

	<!-- vendor css -->
	<link rel="stylesheet" href="{{ asset('dashboard') }}/assets/css/style.css">
	

</head>

<!-- [ auth-signin ] start -->
<div class="auth-wrapper">
	<div class="auth-content">
		<div class="card">
			<div class="row align-items-center text-center">
				<div class="col-md-12">
					<div class="card-body">
						<div>
						<img src="{{ asset('/Ico/The Logo.jpeg') }}" width="200px" height="150px" alt="">
						<hr>
					</div>
						
						<h1 style="color:#000; class="mb- f-w-1000 mb-4">{{ trans('admin.Signin') }}</h1>
						<form action="{{ aurl('login') }}" method="POST">
						@csrf
						<div class="form-group mb-3">
						
							<input  style="font-size: 20px text-align:center" type="text" name="email" class="form-control" id="Email" placeholder={{ trans('admin.Email address') }}>
						</div>
						<div class="form-group mb-4">

							<input type="password" name="password" class="form-control" id="Password" placeholder={{ trans('admin.password') }}>
						</div>
						<div class="custom-control custom-checkbox text-left mb-4 mt-2">
							<input type="checkbox" class="custom-control-input" id="customCheck1">
							<label style="color:#000;font-size:30px" class="custom-control-label" for="customCheck1">{{ trans('admin.Save credentials') }}</label>
						</div>
						<button type="submit" class="btn btn-block btn-primary mb-4">{{ trans('admin.Signin') }}</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- [ auth-signin ] end -->

<!-- Required Js -->
<script src="{{ asset('dashboard') }}/assets/js/vendor-all.min.js"></script>
<script src="{{ asset('dashboard') }}/assets/js/plugins/bootstrap.min.js"></script>
<script src="{{ asset('dashboard') }}/assets/js/ripple.js"></script>
<script src="{{ asset('dashboard') }}/assets/js/pcoded.min.js"></script>



</body>

</html>
