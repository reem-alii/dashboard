@extends('dashboard.layouts.master')
@section('page_header')

                 <!-- Page header -->
         @include('dashboard.layouts.page_header')	
		         <!-- /page header -->

@endsection
@section('content')
            
					<!-- Dashboard content -->
					<div class="row">
					   <div class="col-lg-2">
						</div>
						<div class="col-lg-8">
		
							<!-- Quick stats boxes -->
							<div class="row">
								<div class="col-lg-4">

									<!-- Members Registered -->
									<div class="panel bg-teal-400">
										<div class="panel-body">
											<h3 class="no-margin text-center">{{ $count_users }}</h3>
											<div class="text-center">Members registered</div>
											<div class="text-muted text-size-small">..</div>
										</div>

										<div class="container-fluid">
											<div class="chart" id="members-online"></div>
										</div>
									</div>
									<!-- /members registered -->

								</div>

								<div class="col-lg-4">

									<!-- Current Products -->
									<div class="panel bg-pink-400">
										<div class="panel-body">

											<h3 class="no-margin text-center">{{ $count_products }}</h3>
											<div class="text-center">Current Products</div>
											<div class="text-muted text-size-small">...</div>
										</div>

										<div class="chart" id="server-load"></div>
									</div>
									<!-- /current products -->

								</div>

								<div class="col-lg-4">

									<!-- Orders taken -->
									<div class="panel bg-blue-400">
										<div class="panel-body">
											<h3 class="no-margin text-center">{{ $count_orders }}</h3>
											<div class="text-center">Orders taken</div>
											<div class="text-muted text-size-small">....</div>
										</div>

										<div class="chart" id="today-revenue"></div>
									</div>
									<!-- /orders taken -->

								</div>
							</div>
							<!-- /quick stats boxes -->

						</div>						
					</div>


					<!-- Latest content -->
				<div class="row">
                  <div class="col-md-6">
					<div class="panel panel-flat">
							<div class="panel-heading" style="background-color:#b2bec3;">
							   <h6 class="panel-title"><i class="fa-solid fa-users"></i> Latest Registered Users</h6>					
							</div>
							<div class="panel-body">
								<div class="row">
										@foreach($latest_users as $user)
										<div class="col-md-12">
													<h6>{{ $user->first_name }}</h6>
													<p>{{ $user->email }}</p>
                                        </div>			
										@endforeach
                                </div> 
							</div>
					  </div>
					</div>
					<div class="col-md-6">
					<div class="panel panel-flat">
							<div class="panel-heading" style="background-color:#b2bec3;">
							   <h6 class="panel-title"><i class="fa-solid fa-tag"></i> Latest products</h6>					
							</div>
							<div class="panel-body">
								<div class="row">
								@foreach($latest_products as $product)
										<div class="col-md-12">
													<h6>{{ $product->name }}</h6>
													<p>{{ $product->price }} $</p>
                                        </div>			
										@endforeach
                                </div> 
							</div>
					  </div>
					</div>
				</div>
				<div class="row">
                  <div class="col-md-6">
					<div class="panel panel-flat">
							<div class="panel-heading" style="background-color:#b2bec3;">
							   <h6 class="panel-title"><i class="icon-bag"></i> Latest Orders</h6>					
							</div>
							<div class="panel-body">
								<div class="row">
								@foreach($latest_orders as $order)
										<div class="col-md-12">
													<h6>{{ $order->order_number }}</h6>
													<p>{{ $order->total_cost }} $</p>
                                        </div>			
										@endforeach
                                </div> 
							</div>
					  </div>
					</div>
				</div>
							
					<!-- /latest content -->
			<!-- /dashboard content -->

@endsection                     
