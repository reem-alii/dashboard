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
				            <div class="panel panel-flat" style="background-color:beige;">
								<div class="panel-heading" style="background-color:beige;">
									<h6 class="panel-title"> <i class="fa-solid fa-user-plus"></i> Create Admin </h6>
									<div class="heading-elements">
										<ul class="icons-list">
					                		<li><a data-action="collapse"></a></li>
					                		<li><a data-action="reload"></a></li>
					                		<li><a data-action="close"></a></li>
					                	</ul>
				                	</div>
								</div>

				                <div class="panel-body">
				                	<form action="{{ route('store.admin') }}" method="POST">
                                        @csrf
										<div class="row">
											<div class="col-md-10">
												<div class="form-group">
                                                    <label>First Name</label>
					                                <input type="text" name="first_name" class="form-control" value="{{ old('first_name') }}" placeholder="First Name">
				                                </div>
											</div>

											
										</div>

										<div class="row">
											<div class="col-md-10">
												<div class="form-group">
                                                    <label>Last Name</label>
					                                <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" placeholder="Last Name">
				                                </div>
											</div>

											
										</div>
                                        <div class="row">
											<div class="col-md-10">
												<div class="form-group">
                                                    <label>Phone Number</label>
					                                <input type="text" class="form-control" name="phone" value="{{ old('phone') }}" placeholder="Phone Number">
				                                </div>
											</div>				
										</div>

										<div class="row">
											<div class="col-md-10">
												<div class="form-group">
                                                   <label>Email</label>
                                                   <input type="text" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
				                                </div>
											</div>

											
										</div>

                                        <div class="row">
											<div class="col-md-10">
												<div class="form-group">
                                                    <label>Password</label>
					                                <input type="password" class="form-control" name="password" placeholder="Password">
				                                </div>
											</div>				
										</div>

				                        <div class="text-right">
				                        	<button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-left13 position-right"></i></button>
				                        </div>
			                        </form>
				                </div>
				            </div>
						</div>
					</div>
					<!-- /default grid -->

@endsection