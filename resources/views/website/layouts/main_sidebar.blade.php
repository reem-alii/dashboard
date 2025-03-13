@auth

			<!-- Main sidebar -->
			<div class="sidebar sidebar-main sidebar-default">
				<div class="sidebar-content">
					<!-- User menu -->
					<div class="sidebar" style="background-color:#8e44ad; background-image: url('https://cdn.pixabay.com/photo/2021/10/30/12/41/mountains-6754215_1280.jpg'); background-size: cover; background-position: center;">
						<div class="category-content">
							<div class="sidebar-user-material-content">
							   <div class="thumb thumb-rounded thumb-slide">
									<img src="{{ auth()->user()->image ? asset('storage/' . auth()->user()->image) : asset('assets/images/placeholder.jpg') }}" alt="">
									<div class="caption">
										<span>
											<a href="#" class="btn bg-success-400 btn-icon btn-xs" data-popup="lightbox"><i class="icon-camera"></i></a>
										</span>
									</div>
							     </div>
								<h6>{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</h6>
								<span class="text-size-small">{{ auth()->user()->email }}</span>
							</div>
														
							<div class="sidebar-user-material-menu">
								<a href="#user-nav" data-toggle="collapse"><span>@lang('routes.index.my_account')</span> <i class="caret"></i></a>
							</div>
						</div>
						
						<div class="navigation-wrapper collapse" id="user-nav">
							<ul class="navigation">
								<li><a href="{{ route('user.profile') }}"><i class="icon-user-plus"></i> <span>@lang('routes.index.my_profile')</span></a></li>
								<li class="divider"></li>
								<li><a href="#"><i class="icon-cog5"></i> <span>@lang('routes.index.account_settings')</span></a></li>
								<li><a href="{{ route('user.logout') }}"><i class="icon-switch2"></i> <span>@lang('routes.index.logout')</span></a></li>
							</ul>
						</div>
					</div>
					<!-- /user menu -->


					<!-- Main navigation -->
					<div class="sidebar-category sidebar-category-visible">
						<div class="category-content no-padding">
							<ul class="navigation navigation-main navigation-accordion">

								<!-- Main -->
								<li class="navigation-header"><span>@lang('routes.index.main')</span> <i class="icon-menu" title="Main pages"></i></li>
								<li class="active"><a href="{{ route('user.Index') }}"><i class="icon-home4"></i> <span>@lang('routes.index.home_page')</span></a></li>
								<li>
									<a href="#"><i class="icon-stack2"></i> <span>@lang('routes.index.options')</span></a>
									<ul>
									    <li><a href="{{ route('products.index') }}">@lang('routes.index.products')</a></li>
										<li><a href="{{ route('show.user.cart') }}">@lang('routes.index.cart')</a></li>
										<li class="navigation-divider"></li>
										<li><a href="{{ route('user.orders') }}">@lang('routes.index.orders')</a></li>
										<li><a href="boxed_mini.html">....</a></li>
									</ul>
								</li>
								<!-- /main -->
							</ul>
						</div>
					</div>
					<!-- /main navigation -->
				</div>
			</div>
			<!-- /main sidebar -->
@endauth
