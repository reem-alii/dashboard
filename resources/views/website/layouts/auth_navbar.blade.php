<!-- Main navbar -->
<div class="navbar navbar-inverse bg-grey">
		<div class="navbar-header">
			<a class="navbar-brand" href="index.html"></a>

			<ul class="nav navbar-nav pull-right visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav navbar-right">

			    <li onmouseover="this.style.backgroundColor='#b2bec3'" onmouseout="this.style.backgroundColor='inherit'">
					<a href="{{ route('admin.login.form') }}">
						<i class="icon-user-tie"></i> <span class="visible-inline-block position-right"></span>
                    Go To Admin Login</a>
				</li>
				@foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                <li>
                  <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                {{ $properties['native'] }}
                  </a>
                </li>
                  @endforeach
								
			</ul>
		</div>
	</div>
	<!-- /main navbar -->