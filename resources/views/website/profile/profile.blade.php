@extends('website.layouts.master')
@section('page_header')
				<!-- Page header -->
				<div class="page-header">

					<!-- Header content -->
					<div class="page-header-content">
						<div class="page-title">
							<h4><i class="icon-arrow-right6 position-left"></i> <span class="text-semibold">User Page</span> - Profile</h4>
                             
							<ul class="breadcrumb position-right">
                            
							</ul>
						</div>

						<div class="heading-elements">
							
						</div>
					</div>
					<!-- /header content -->


					<!-- Toolbar -->
					<div class="navbar navbar-default navbar-component navbar-xs">
						<ul class="nav navbar-nav visible-xs-block">
							<li class="full-width text-center"><a data-toggle="collapse" data-target="#navbar-filter"><i class="icon-menu7"></i></a></li>
						</ul>

						<div class="navbar-collapse collapse" id="navbar-filter">
							<ul class="nav navbar-nav">
								<li class="active"><a href="#activity" data-toggle="tab"><i class="icon-menu7 position-left"></i> Activity</a></li>
								<li><a href="#settings" data-toggle="tab"><i class="icon-cog3 position-left"></i> Settings</a></li>
							</ul>

							<div class="navbar-right">
								<ul class="nav navbar-nav">
									<li><a href="#"><i class="icon-images3 position-left"></i> Photos</a></li>
									
								</ul>
							</div>
						</div>
					</div>
					<!-- /toolbar -->

				</div>
				<!-- /page header -->
@endsection
@section('content')


					<!-- User profile -->
					<div class="row">
						<div class="col-lg-12">
							<div class="tabbable">
								<div class="tab-content">
									<div class="tab-pane fade in active" id="activity">

										<!-- Timeline -->
										<div class="timeline timeline-left content-group">
											<div class="timeline-container">

												<!-- Sales stats -->
												<div class="timeline-row">
													<div class="timeline-icon">
														<a href="#"><img src="{{ auth()->user()->image ? asset('storage/' . auth()->user()->image) : asset('assets/images/placeholder.jpg') }}" alt=""></a>
													</div>

													<div class="panel panel-flat timeline-content">
														<div class="panel-heading">
															<h6 class="panel-title">Daily statistics</h6>
                                                             <div class="col-lg-9">
                                                                 @if(session('success'))
                                                                 <div class="alert alert-success">{{ session('success') }}</div>
                                                                 @endif
                                                                 @if($errors->any())
                                                                  @foreach($errors->all() as $error)
                                                                  <div class="alert alert-danger">{{ $error }}</div>
                                                                  @endforeach
                                                                 @endif
                                                             </div>
															<div class="heading-elements">
																<span class="heading-text"><i class="icon-history position-left text-success"></i> Updated 3 hours ago</span>

																<ul class="icons-list">
											                		<li><a data-action="reload"></a></li>
											                	</ul>
										                	</div>
														</div>

														<div class="panel-body">
															<div class="chart-container">
																<div class="chart has-fixed-height" id="sales"></div>
															</div>
														</div>
													</div>
												</div>
												<!-- /sales stats -->
											</div>
									    </div>
									    <!-- /timeline -->

									</div>

									<div class="tab-pane fade" id="settings">

										<!-- Profile info -->
										<div class="panel panel-flat">
											<div class="panel-heading">
												<h6 class="panel-title">Profile Settings</h6>
												<div class="heading-elements">
													<ul class="icons-list">
								                		<li><a data-action="collapse"></a></li>
								                		<li><a data-action="reload"></a></li>
								                		<li><a data-action="close"></a></li>
								                	</ul>
							                	</div>
											</div>

											<div class="panel-body">
												<form action="{{ route('user.update.profile') }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
													@method('PUT')
													<div class="form-group">
														<div class="row">
															<div class="col-md-6">
																<label>First Name</label>
																<input type="text" name="first_name" value="{{ auth()->user()->first_name }}" class="form-control">
															</div>
															<div class="col-md-6">
																<label>Last Name</label>
																<input type="text" name="last_name" value="{{ auth()->user()->last_name }}" class="form-control">
															</div>
														</div>
													</div>

													<div class="form-group">
														<div class="row">
															<div class="col-md-12">
																<label>Email</label>
																<input type="text" name="email" value="{{ auth()->user()->email }}" class="form-control">
															</div>
                                                            
														</div>
													</div>
													<div class="form-group">
														<div class="row">
															<div class="col-md-6">
																<label>Age</label>
																<input type="text" name="age" value="{{ auth()->user()->age }}" class="form-control">
															</div>
															<div class="col-md-6">
																<label>Address</label>
																<input type="text" name="address" value="{{ auth()->user()->address }}" class="form-control">
															</div>
														</div>
													</div>
                                                    <div class="form-group">
														<div class="row">
															<div class="col-md-12">
																<label>Current password</label>
																<input type="password" name="password" placeholder="Enter Your Current Password" class="form-control">
															</div>
														</div>
													</div>
													<div class="form-group">
														<div class="row">
															<div class="col-md-12">
																<label>National ID</label>
																<input type="text" name="national_id" value="{{ auth()->user()->national_id }}" class="form-control">
                                                                <span class="help-block"> Must be 14 numbers</span>
															</div>
														</div>
													</div>

													<div class="form-group">
														<div class="row">
															<div class="col-md-12">
																<label>New password</label>
																<input type="password" name="new_password" class="form-control">
                                                                <span class="help-block">Leave it empty if you don't want to change the password</span>
															</div>
														</div>
													</div>

							                        <div class="form-group">
							                        	<div class="row">
							                        		
															<div class="col-md-6">
																<label class="display-block">Upload profile image</label>
							                                    <input type="file" name="image" class="file-styled">
							                                    <span class="help-block">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
															</div>
							                        	</div>
							                        </div>

							                        <div class="text-right">
							                        	<button type="submit" class="btn btn-primary">Save <i class="icon-arrow-left13 position-right"></i></button>
							                        </div>
												</form>
											</div>
										</div>
										<!-- /profile info -->

									</div>
								</div>
							</div>
						</div>
                     </div>
					<!-- /user profile -->
@endsection