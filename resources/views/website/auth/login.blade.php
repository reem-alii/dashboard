<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
	@include('website.layouts.header_all')
</head>

<body class="login-container">

   @include('website.layouts.auth_navbar')

	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Content area -->
				<div class="content">
					<!-- Simple login form -->
					<form action="{{ route('user.authenticate') }}" method="POST">
                        @csrf
						<div class="panel panel-body login-form">
							<div class="text-center">
								<div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>

								<h5 class="content-group">@lang("routes.auth.login_to_user_account")<small class="display-block">@lang("routes.auth.enter_your_credentials_below")</small></h5>
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<input type="text" name="email" class="form-control" placeholder="@lang('routes.auth.email')" value="{{ old('email') }}">
								<div class="form-control-feedback">
									<i class="icon-user text-muted"></i>
								</div>
								@error('email')
                                    <span class="help-block text-danger"><i class="icon-cancel-circle2 position-left"></i> {{ $message }}</span>
                                @enderror
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<input type="password" name="password" class="form-control" placeholder="@lang('routes.auth.password')">
								<div class="form-control-feedback">
									<i class="icon-lock2 text-muted"></i>
								</div>
								@error('password')
                                    <span class="help-block text-danger"><i class="icon-cancel-circle2 position-left"></i> {{ $message }}</span>
                                @enderror
							</div>

							<div class="form-group">
								<button type="submit" class="btn bg-pink-400 btn-block">@lang('routes.auth.sign_in') <i class="icon-circle-left2 position-right"></i></button>
							</div>

							<a href="{{ route('user.register.form') }}" class="btn bg-blue-400 btn-block">@lang('routes.auth.go_to_register_form')<i class="icon-circle-left2 position-right"></i></a>

						</div>
					</form>
					<!-- /simple login form -->


					<!-- Footer -->
					<div class="footer text-muted text-center">
						&copy; 2015. <a href="#">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a>
					</div>
					<!-- /footer -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->

</body>
</html>