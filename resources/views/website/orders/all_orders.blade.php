@extends('website.layouts.master')
@section('page_header')

@endsection

@section('content')
<!-- Collapsible lists -->
          <div class="row">
						<div class="col-md-12">

							<!-- Collapsible list -->
							<div class="panel panel-flat" style="background-color:beige;">
								<div class="panel-heading" style="background-color:beige;">
									<h5 class="panel-title">Your Orders</h5>
									<div class="heading-elements">
										
				                	</div>
								</div>
                            @if($orders->isEmpty())
								 <div class="alert alert-success text-center"> Your Have No Orders !</div>
							@else

								<ul class="media-list media-list-linked">
								@foreach($orders as $order)
									<li class="media">
										<div class="media-link cursor-pointer" data-toggle="collapse" data-target="#{{ $order->id }}">
											<div class="media-left"></div>
											<div class="media-body">
												<div class="media-heading text-semibold">{{ $order->order_number}}</div>
												<span>total cost :{{ $order->total_cost }}$</span>
											</div>
											<div class="media-right media-middle text-nowrap">
												<i class="icon-menu7 display-block"></i>
											</div>
										</div>
										<form method="POST" action="{{ route('user.delete.order', $order->id) }}">
                                          @csrf
                                          @method('DELETE')
										  <button type="submit" style=" text-decoration: none; cursor: pointer; padding:4px 8px; margin-right: 1100px;margin-top: -95px;"
										   class="btn btn-danger btn-sm btn-float"> <i class="fa-solid fa-trash" style="font-size:12px;"></i>
                                          </button>
                                        </form>
                                        <a href="{{ route('user.order.details', $order->id) }}">
                                         <button
                                         class="btn btn-sm btn-raised active legitRipple" style="padding: 3px 10px; margin-right: 970px; margin-top: -135px; background-color:aqua;" type="button">
                                         order details
                                         </button>
                                        </a>

										<div class="collapse" id="{{ $order->id }}">
											<div class="contact-details">
												<ul class="list-extended list-unstyled list-icons">
                                                    <li><i class="icon-bag"></i>{{ $order->quantity }}</li>
													<li><i class="icon-phone"></i>{{ $order->phone }}</li>
													<li><i class="icon-location4"></i>{{ $order->address }}</li>
                                                    <li><i class="icon-mention"></i><a href="#" style="text-decoration:underline;">{{ $order->email }}</a></li>
												</ul>
											</div>
										</div>
									</li>	
								@endforeach
								</ul>
                            @endif
							</div>
							<!-- /collapsible list -->

						</div>

		</div>
					<!-- /collapsible lists -->
                     
					
@endsection   