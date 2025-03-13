
			<!-- Main sidebar -->
			<div class="sidebar sidebar-main sidebar-default" style="color: #fff;">
				<div class="sidebar-content" style="color: #fff;">

					<!-- User menu -->
					<div class="sidebar" >
						<div class="category-content">
							<div class="sidebar-user-material-content">
							   <div class="thumb thumb-rounded thumb-slide">
									<img src="{{ auth('admin')->user()->image ? asset('storage/' . auth('admin')->user()->image) : asset('assets/images/placeholder.jpg') }}" alt="">
									<div class="caption">
										<span>
										<form  method="POST "action="{{ route('upload.photo') }}" enctype="multipart/form-data" style="display:inline;">
                                            @csrf
											<input type="file" id="imageUpload" name="image" style="display: none;">
											<label for="imageUpload" class="btn bg-success-400 btn-icon btn-xs" style="background: none; border: none; color: inherit; text-decoration: none; cursor: pointer; padding:2px 2px;">
											  <i class="icon-camera" style="margin:0 6px"></i>
										    </label>
											<button type="submit" style="display: none;"></button>
                                        </form>       
										</span>
									</div>
							   </div>
								<h6>{{ auth('admin')->user()->first_name }} {{ auth('admin')->user()->last_name }}</h6>
								<span class="text-size-small">{{ auth('admin')->user()->email }}</span>
							</div>
														
							<div class="sidebar-user-material-menu">
								<a href="#user-nav" data-toggle="collapse"><span>My account</span> <i class="caret"></i></a>
							</div>
						</div>
						
						<div class="navigation-wrapper collapse" id="user-nav">
							<ul class="navigation" style="color: #fff;">
								<li><a href="{{ route('admin.profile') }}"><i class="icon-user-plus"></i> <span>My profile</span></a></li>
								<li class="divider"></li>
								<li><a href="#"><i class="icon-cog5"></i> <span>Account settings</span></a></li>
								<li><a href="{{ route('admin.logout') }}"><i class="icon-switch2"></i> <span>Logout</span></a></li>
							</ul>
						</div>
					</div>
					<!-- /user menu -->


					<!-- Main navigation -->
					<div class="sidebar-category sidebar-category-visible">
						<div class="category-content no-padding">
							<ul class="navigation navigation-main navigation-accordion">

								<!-- Main -->
								<li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
								<li class="active"><a href="{{ route('admin.dashboard') }}"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
								<li>
									<a href="#"><i class="icon-stack2"></i> <span>Options</span></a>
									<ul>
										<li><a href="{{ route('admins.table') }}">Admins Table</a></li>
										<li><a href="{{ route('users.table') }}">Users Table</a></li>
										<li class="navigation-divider"></li>
										<li><a href="{{ route('products.table') }}">Products Table</a></li>
										<li><a href="{{ route('categories.table') }}">Categories Table</a></li>
										<li><a href="{{ route('comments.table') }}">Comments Table</a></li>
										<li class="navigation-divider"></li>
										<li><a href="{{ route('orders.table') }}">Orders Table</a></li>
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