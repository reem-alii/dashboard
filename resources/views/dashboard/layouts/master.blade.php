<!DOCTYPE html>
<html lang="en" dir="rtl">
  <head>
    @include('dashboard.layouts.header_all')
    @stack('other-scripts')
  </head>
  <body>
    <!-- Main navbar -->
	@include('dashboard.layouts.main_navbar')
	<!-- /main navbar -->

    <!-- Page container -->
	<div class="page-container">

      <!-- Page content -->
      <div class="page-content">

		<!-- Main sidebar -->
		@include('dashboard.layouts.main_sidebar')
		<!-- /main sidebar -->

		<!-- Main content -->
		<div class="content-wrapper">
            <!-- Page header -->
            @yield('page_header')
			<!-- /page header -->
            <!-- Content area -->
			<div class="content">
                    @yield('content')
					<!-- Footer -->
					<div class="footer text-muted">
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