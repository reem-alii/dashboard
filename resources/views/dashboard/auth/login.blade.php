<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
	@include('dashboard.layouts.header_all')
</head>

<body class="login-container login-cover">

	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">
			


				<!-- Content area -->
				<div class="content pb-20">

					<!-- Tabbed form -->
					<div class="tabbable panel login-form width-400">
						
						<div class="tab-content panel-body">
							<div class="tab-pane fade in active" id="basic-tab1">
								<form action="{{ route('admin.login.submit') }}" method="POST">
                                    @csrf
									<div class="text-center">
										<div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
                                        <h3 class="font-weight-bold"> Welcome Admin </h3>
										<h5 class="content-group">Login to your account <small class="display-block">Your credentials</small></h5>
									</div>

									<div class="form-group has-feedback has-feedback-left">
										<input type="text" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
										<div class="form-control-feedback">
											<i class="icon-user text-muted"></i>
										</div>
										@error('email')
                                          <span class="help-block text-danger"><i class="icon-cancel-circle2 position-left"></i> {{ $message }}</span>
                                        @enderror
									</div>

									<div class="form-group has-feedback has-feedback-left">
										<input type="password" class="form-control" placeholder="Password" name="password">
										<div class="form-control-feedback">
											<i class="icon-lock2 text-muted"></i>
										</div>
										@error('password')
                                            <span class="help-block text-danger"><i class="icon-cancel-circle2 position-left"></i> {{ $message }}</span>
                                        @enderror
									</div>

									<div class="form-group">
										<button type="submit" class="btn bg-pink-400 btn-block">Login <i class="icon-arrow-left13 position-right"></i></button>
									</div>
								</form>

								<span class="help-block text-center no-margin">By continuing, you're confirming that you've read our <a href="#">Terms &amp; Conditions</a> and <a href="#">Cookie Policy</a></span>
							</div>

						</div>
					</div>
					<!-- /tabbed form -->
					 <div class="text-center">
					   <a href="{{ route('user.login.form') }}" class="btn bg-green-400 text-muted">Go To User Login <i class="icon-arrow-left13 position-right"></i></a>
                     </div>

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