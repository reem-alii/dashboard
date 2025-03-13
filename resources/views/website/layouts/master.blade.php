<!DOCTYPE html>
<html lang="en" dir="rtl">
  <head>
    @include('website.layouts.header_all')
  </head>
  <body>
    <!-- Main navbar -->
	@include('website.layouts.main_navbar')
	<!-- /main navbar -->

    <!-- Page container -->
	<div class="page-container">

      <!-- Page content -->
      <div class="page-content">

		<!-- Main sidebar -->
		@include('website.layouts.main_sidebar')
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