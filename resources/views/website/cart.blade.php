@extends('website.layouts.master')
@section('page_header')

@endsection

@section('content')
<!-- Collapsible lists -->
          <div class="row">
						<div class="col-md-12">

							<!-- Collapsible list -->
							<div class="panel panel-flat" style="background-color:beige;">
								<div class="panel-heading" style="background-color:beige; padding: 1px 500px;">
									<h3 class="panel text-center" style="background-color:white;padding:5px 5px; margin-top: 20px;"><i class="fa-solid fa-cart-shopping"></i>  @lang('routes.index.cart') </h3>
									<div class="heading-elements">
										
				                	</div>
								</div>
							@if($cart_items->isEmpty())
								 <div class="alert alert-success text-center"> @lang('routes.products.your_cart_is_empty') !</div>
							@else
								<ul style="list-style:none; padding-bottom: 30px;">
								 @foreach($cart_items as $item)
									<li class="media">
										<div class="media-link cursor-pointer">
											<div class="media-left"><img src="{{ $item->product->image ? asset('storage/' . $item->product->image) : asset('assets/images/placeholder.jpg') }}" class="img-circle" alt=""></div>
											<div class="media-body" style="cursor:default;">
												<div class="media-heading text-semibold">{{ $item->product->name}}</div>
												<span>@lang('routes.products.total') :{{ $item->total_price }}$</span>
											</div>
										</div>
										<form method="POST" action="{{ route('remove.from.cart', $item->id) }}">
                                                 @csrf
                                                 @method('DELETE')
												 <button type="submit" style=" text-decoration: none; cursor: pointer; padding:4px 8px; margin-right: 160px;margin-top: -40px;"
												  class="btn btn-danger btn-sm btn-float"> <i class="fa-solid fa-trash" style="font-size:12px;"></i>
                                                 </button>
                                        </form>

										<div>
											<div class="contact-details" style="padding-right: 10px; margin-left: 50px; margin-right: 50px;">
												<ul class="list-extended list-unstyled list-icons">
													<li><i class="fa-solid fa-tags position-left" ></i><span style="display: inline-block; width: 100px;">@lang('routes.products.price_for_each')</span>: {{ $item->price }}$</li>
													<li><i class="fa-solid fa-tags position-left"></i><span style="display: inline-block; width: 100px;">@lang('routes.products.size')</span>: {{ $item->product->size }}</li>
													<li><i class="fa-solid fa-tags position-left"></i><span style="display: inline-block; width: 100px;">@lang('routes.products.quantity')</span>: {{ $item->product_quantity }}</li>
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

					@if(!$cart_items->isEmpty())
					 <ul class="icons-list text-center">
						<li><a href="{{ route('create.order') }}" class="btn btn-lg btn-primary" style="background-color:aqua;"> @lang('routes.products.confirm_order')</a></li>
			         </ul>
					@endif

@endsection   