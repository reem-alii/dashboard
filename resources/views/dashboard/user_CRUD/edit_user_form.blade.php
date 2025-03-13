@extends('dashboard.layouts.master')
@section('content')
	<!-- Default grid -->
     <div class="row">
        <div class="col-lg-3">
        </div>
        <div class="col-lg-6 text-center">
             @if(session('success'))
               <div class="alert alert-success">{{ session('success') }}</div>
             @endif
             @if($errors->any())
                @foreach($errors->all() as $error)
                <div class="alert alert-danger" style="padding:10px ; margin-bottom: 10px;">{{ $error }}</div>
                @endforeach
            @endif
            </div>
     </div>
             <div class="row">
               <div class="col-lg-3">
                  </div>
						<div class="col-lg-6">
				            <div class="panel panel-flat" style="background-color:ivory;">
								<div class="panel-heading" style="background-color:ivory;">
									<h3 class="panel-title"> <i class="fa-solid fa-user-pen"></i> Edit User </h3>
									<div class="heading-elements">
										<ul class="icons-list">
					                		<li><a data-action="collapse"></a></li>
					                		<li><a data-action="reload"></a></li>
					                		<li><a data-action="close"></a></li>
					                	</ul>
				                	</div>
								</div>

				                <div class="panel-body">
				                	<form action="{{ route('update.user', $user->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
										@method('PUT')
										<div class="row">
											<div class="col-md-10">
												<div class="form-group">
                                                    <label><strong>First Name</strong></label>
					                                <input type="text" name="first_name" class="form-control" value="{{ $user->first_name }}">
				                                </div>
											</div>

											
										</div>

										<div class="row">
											<div class="col-md-10">
												<div class="form-group">
                                                    <label><strong>Last Name</strong></label>
					                                <input type="text" class="form-control" name="last_name" value="{{ $user->last_name }}">
				                                </div>
											</div>

											
										</div>
                                        <div class="row">
											<div class="col-md-10">
												<div class="form-group">
                                                    <label>Age</label>
					                                <input type="text" class="form-control" name="age" value="{{ $user->age }}">
				                                </div>
											</div>				
										</div>
                                        <div class="row">
											<div class="col-md-10">
												<div class="form-group">
                                                    <label>Address</label>
					                                <input type="text" class="form-control" name="address" value="{{ $user->address }}">
				                                </div>
											</div>				
										</div>
                                        <div class="row">
											<div class="col-md-10">
												<div class="form-group">
                                                    <label>National ID</label>
					                                <input type="text" class="form-control" name="national_id" value="{{ $user->national_id }}">
				                                </div>
											</div>				
										</div>


										<div class="row">
											<div class="col-md-10">
												<div class="form-group">
                                                   <label><strong>Email</strong></label>
                                                   <input type="text" class="form-control" name="email" value="{{ $user->email }}">
				                                </div>
											</div>

											
										</div>
                                        <div class="row">
											<div class="col-md-10">
												<div class="form-group">
                                                    <label><strong>Upload profile picture</strong></label>
                                                    <span class="help-block">optional</span>
					                                <input type="file" name="image" class="file-styled">
				                                </div>
											</div>				
										</div>
                                        <div class="row">
											<div class="col-md-10">
												<div class="form-group">
                                                    <label><strong>New Password</strong></label>
					                                <input type="password" class="form-control" name="new_password" placeholder="Leave it empty if you don't want to change password">
				                                </div>
											</div>				
										</div>

				                        <div class="text-right">
				                        	<button type="submit" class="btn btn-primary">Save <i class="icon-arrow-left13 position-right"></i></button>
				                        </div>
			                        </form>
				                </div>
				            </div>
						</div>
					</div>
					<!-- /default grid -->

@endsection