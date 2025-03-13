@extends('dashboard.layouts.master')

@section('content')     
               
               <div class="col-lg-3">
               </div>
               
               <div class="col-lg-6">

							<!-- User thumbnail -->
							<div class="thumbnail">
								<div class="thumb">
									<img class="text-center" src="{{ $product->image ? asset('storage/' . $product->image) : asset('assets/images/placeholder.jpg') }}" style="display: block; margin: 0 auto; width: 350px; height: auto;" alt="">	
								</div>
							
						    	<div class="caption text-center">
						    		<h6 class="text-semibold no-margin" style=" font-size: 20px;">{{ $product->name }}<small class="display-block" style="color:#34495e;" >{{ $product->description }}</small></h6>
					    			<ul class="icons-list mt-15">
				                    	<li> <strong>price:</strong> {{ $product->price }}</li>
                                        <li> <strong>size:</strong> {{ $product->size }}</li>
                                        <li> <strong>color:</strong> {{ $product->color }}</li>
                                        <li> <strong>quantity:</strong> {{ $product->quantity }}</li>
                                        <li> <strong>category:</strong> {{ $product->category_id }}</li>
			                    	</ul>
									<ul></ul>
									<ul style="font-size: 16px;" > <strong>created by:</strong> {{ $product->admin->first_name }} {{ $product->admin->last_name }} </ul>
									     <h6 class="no-margin text-semibold"><hr></h6>
								            <p class="text-muted content-group-sm"><hr></p>
		                                    <a href="{{ route('edit.product.form',$product->id) }}"><button type="button" class="btn btn-info btn-float btn-rounded"><i class="fa-solid fa-pen"></i></button></a>
											<form method="POST" action="{{ route('delete.product',$product->id) }}" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
												<button type="submit" style=" text-decoration: none; cursor: pointer;"
												 onclick="return confirm('Are you sure you want to delete this user?')"
												 class="btn btn-danger btn-float btn-float-lg btn-rounded"> <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </form>
		                                    <button type="button" class="btn btn-info btn-float btn-rounded btn-loading" data-loading-text="<i class='icon-spinner4 spinner'></i>"><i class="icon-spinner4"></i></button>  	
						    	</div>
					    	</div>
					    	<!-- /user thumbnail -->
						</div>
@endsection                        