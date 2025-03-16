<!-- Main navbar -->
<div class="navbar navbar-inverse bg-brown-400">
		<div class="navbar-header">
			<a class="navbar-brand" href="{{ route('user.Index') }}">Shop </a>
			<ul class="nav navbar-nav visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
				<li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav">
				<li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>
			<div class="navbar-right">
				<ul class="nav navbar-nav">
                  @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                <li>
                  <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                {{ $properties['native'] }}
                  </a>
                </li>
                  @endforeach
				  @guest
				  <li><a href="{{ route('user.login.form') }}">@lang('routes.auth.login')/@lang('routes.auth.register')</a></li>
				  @endguest

				</ul>
				@auth
				
				<ul class="nav navbar-nav">				
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-bell2"></i>
							<span class="visible-xs-inline-block position-right">Activity</span>
							<span class="status-mark border-orange-400"></span>
						</a>

						<div class="dropdown-menu dropdown-content">
							<div class="dropdown-content-heading">
								Activity								
							</div>

							<ul class="media-list dropdown-content-body width-350">
								<li class="media">
									<div class="media-left">
										<a href="#" class="btn bg-success-400 btn-rounded btn-icon btn-xs"><i class="icon-mention"></i></a>
									</div>

									<div class="media-body">
										<a href="#">Taylor Swift</a> mentioned you in a post "Angular JS. Tips and tricks"
										<div class="media-annotation">4 minutes ago</div>
									</div>
								</li>
								
							</ul>
						</div>
					</li>				
				</ul>
				@endauth
			</div>
		</div>
	</div>
	<!-- /main navbar -->

	<!-- Second navbar -->
	<div class="navbar navbar-default">
		<div class="navbar-collapse collapse" id="navbar-second">
			<ul class="nav navbar-nav">
			</ul>

			<div class="nav" style="display: flex; justify-content: center; width: 100%;">
			   <a href="{{ route('all.products') }}"><button type="button" class="btn btn-default navbar-btn text-center" style="border:solid 1px;">All</button></a>
				@foreach($categories as $cat)
				<a href="{{ route('user.category', $cat->id) }}"><button type="button" class="btn btn-default navbar-btn text-center" style="border:solid 1px;">{{ $cat->name }}</button></a>
				@endforeach
			</div>
		</div>
	</div>
	<!-- /second navbar -->
