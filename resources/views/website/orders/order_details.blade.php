@extends('website.layouts.master')
@section('page_header')

@endsection

@section('content')
      <!-- Bordered striped table -->
	    @if(!$order)
				<div class="alert alert-success text-center"> Your Have No Orders !</div>
	    @else

					<div class="panel panel-flat" style="background-color: #b2bec3;">
						<div class="panel-heading" style="background-color: #dfe6e9;">
							<h5 class="panel-title"><strong>Order {{ $order->order_number }}</strong></h5>
							<div class="heading-elements">
								<ul class="icons-list">
                                <span class="label" style="background-color:beige; color:black;">{{ $order->phone }}</span><br><br>
                                <span class="label" style="background-color:beige; color:black;">{{ $order->address }}</span>
			                	</ul>
		                	</div>
						</div>

						<div class="panel-body">

						</div>

						<div class="table-responsive" >
							<table class="table table-bordered table-striped" >
								<thead>
									<tr>
										<th>#</th>
										<th>product</th>
										<th>price</th>
										<th>quantity</th>
										<th>total</th>
									</tr>
								</thead>
								<tbody>
									@foreach($order->order_items as $item)
									<tr>
										<td>#</td>
										<td>{{ $item->product->name }}</td>
										<td>{{ $item->product->price }}</td>
										<td>{{ $item->quantity }}</td>                    
										<td>{{ $item->product->price * $item->quantity }}</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
					
					<form method="POST" action="{{ route('user.delete.order', $order->id) }}">
                      @csrf
                      @method('DELETE')
					  <button type="submit" class="btn bg-pink-400 btn-raised active legitRipple" style="margin-right: 1011px;">
						Cancel Order
                        </button>
                    </form>

					<!-- /bordered striped table -->
		@endif			 
@endsection