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

					<!-- Registration form -->
					<form action="{{ route('user.register') }}" method="POST">
                        @csrf
						<div class="row">
							<div class="col-lg-6 col-lg-offset-3">
								<div class="panel registration-form">
									<div class="panel-body">
										<div class="text-center">
											<div class="icon-object border-success text-success"><i class="icon-plus3"></i></div>
											<h5 class="content-group-lg">@lang('routes.auth.create_account') <small class="display-block">@lang('routes.auth.all_fields_are_required')</small></h5>
										</div>

										<div class="row">
											<div class="col-md-6">
												<div class="form-group has-feedback">
													<input type="text" name="first_name" class="form-control" value="{{ old('first_name') }}" placeholder="@lang('routes.auth.first_name')">
													<div class="form-control-feedback">
														<i class="icon-user-check text-muted"></i>
													</div>
													@error('first_name')
                                                     <span class="help-block text-danger"><i class="icon-cancel-circle2 position-left"></i> {{ $message }}</span>
                                                    @enderror
												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group has-feedback">
													<input type="text" name="last_name" class="form-control" value="{{ old('last_name') }}"placeholder="@lang('routes.auth.last_name')">
													<div class="form-control-feedback">
														<i class="icon-user-check text-muted"></i>
													</div>
													@error('last_name')
                                                     <span class="help-block text-danger"><i class="icon-cancel-circle2 position-left"></i> {{ $message }}</span>
                                                    @enderror
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-md-6">
												<div class="form-group has-feedback">
													<input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="@lang('routes.auth.email')">
													<div class="form-control-feedback">
														<i class="icon-mention text-muted"></i>
													</div>
													@error('email')
                                                     <span class="help-block text-danger"><i class="icon-cancel-circle2 position-left"></i> {{ $message }}</span>
                                                    @enderror
												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group has-feedback">
													<input type="email" name="email_confirmation" class="form-control" value="{{ old('email_confirmation') }}" placeholder="@lang('routes.auth.repeat_email')">
													<div class="form-control-feedback">
														<i class="icon-mention text-muted"></i>
													</div>
													@error('email_confirmation')
                                                      <span class="help-block text-danger"><i class="icon-cancel-circle2 position-left"></i> {{ $message }}</span>
                                                    @enderror
												</div>
											</div>
										</div>
                                        <div class="row">
											<div class="col-md-6">
												<div class="form-group has-feedback">
													<input type="password" name="password" class="form-control" placeholder="@lang('routes.auth.create_password')">
													<div class="form-control-feedback">
														<i class="icon-user-lock text-muted"></i>
													</div>
													@error('password')
                                                      <span class="help-block text-danger"><i class="icon-cancel-circle2 position-left"></i> {{ $message }}</span>
                                                    @enderror
												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group has-feedback">
													<input type="password" name="password_confirmation" class="form-control" placeholder="@lang('routes.auth.repeat_password')">
													<div class="form-control-feedback">
														<i class="icon-user-lock text-muted"></i>
													</div>
													@error('password_confirmation')
                                                      <span class="help-block text-danger"><i class="icon-cancel-circle2 position-left"></i> {{ $message }}</span>
                                                    @enderror
											 	</div>
											</div>
										</div>

										<div class="form-group">
											
										</div>

										<div class="text-right">
											<a href="{{ route('user.login.form') }}" class="btn btn-link"><i class="icon-arrow-left13 position-left"></i> @lang('routes.auth.back_to_login_form')</a>
											<button type="submit" class="btn bg-teal-400 btn-labeled btn-labeled-right ml-10"><b><i class="icon-plus3"></i></b> @lang('routes.auth.create_account')</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</form>
					<!-- /registration form -->


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