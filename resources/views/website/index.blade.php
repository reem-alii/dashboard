@extends('website.layouts.master')
@section('page_header')

@endsection

@section('content') 
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

			@if($products)
            <div class="row">
                @foreach($products as $product)
                <div class="col-lg-3 col-md-6">
							<div class="thumbnail">
								<div class="product">
									<a href="{{ route('product.details', $product->id) }}">
										{{--<img src="{{ $product->image ? asset('storage/' . $product->image) : asset('assets/images/placeholder.jpg') }}" style="display: block; margin: 0 auto; padding:10px; width:300px; height:300px; cursor:pointer;" onmouseover="this.style.backgroundColor='black'" onmouseout="this.style.backgroundColor='inherit'"></a>--}}
										<img src="{{ $product->image }}" style="display: block; margin: 0 auto; padding:10px; width:300px; height:300px; cursor:pointer;" onmouseover="this.style.backgroundColor='black'" onmouseout="this.style.backgroundColor='inherit'"></a>
									<div class="caption-overflow">
										<span>
										</span>
									</div>
								</div>
							
						    	<div class="caption text-center">
								<a href="{{ route('product.details', $product->id) }}"><h6 class="text-semibold no-margin" style="font-size: 20px;">{{ $product->name }} <small class="display-block" style="color:#636e72;">{{ $product->description }}</small></h6></a>
					    			
									<ul class="icons-list mt-15">
                                        <li class="text-semibold no-margin" style="font-size: 20px; color:white; font-weight: bold; padding: 10px; background-color:#e74c3c; border-radius: 8px; display: inline-block;">
                                            <strong>${{ $product->price }}.00</strong>
                                        </li>
									</ul>
									<ul class="icons-list mt-15">
										<li>
										<form action="{{ route('add.to.cart',$product->id)}}" method="POST">
											@csrf
											<label for="quantity">@lang('routes.products.select_quantity') :</label>
                                            <select name="quantity" class="text-center" style="padding:2px 4px ;margin-bottom: 8px;">
                                             @for($i=1; $i<= $product->quantity; $i++)
                                                <option class="form-control text-center" value="{{ $i }}" >{{ $i }}</option>
                                             @endfor
                                            </select>
										   <button type="submit" style="border:#636e72; color: inherit; text-decoration: none; cursor: pointer; padding:5px 5px; border-radius:2px;">
										   @lang('routes.products.add_to_cart') <i class="fa-solid fa-cart-shopping" style="margin:0 6px; font-size:15px;"></i>
                                           </button> 
										</form>
										</li>
                                    </ul>
						    	</div>
					    	</div>
						</div>
                        @endforeach
                        </div>   
						{{-- Pagination --}}
                 <div class="d-flex justify-content-center text-center">
					   {{ $products->links('pagination::simple-bootstrap-4') }}
                 </div>       
            @else
                it is empty
            @endif

@endsection                     
