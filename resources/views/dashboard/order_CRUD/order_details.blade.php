@extends('dashboard.layouts.master')
@push('other-scripts')
<script>
	var row = 0;
	$(document).on('click', '.qty', function(e) {
        e.preventDefault();
		//console.log('inside function');

        var quantity = $(this).val(); 
		var id = $(this).attr("data-id");
		var url = "{{ route('update.quantity', ':id') }}";
        url = url.replace(':id', id);
		//console.log(url);
 
        $.ajax({
            url: url,		 
            method: "POST",
            dataType: "json",
            data: {
                _token: "{{ csrf_token() }}",

                quantity: quantity,
                id: id,
            },
			success: function(data) {

			}
		});
	});
	function getrow(x){
	  row = x.rowIndex;
	  console.log(row);
	}
	function plus(count){
		//console.log(row);
	  var valuee = document.getElementById('count').value ;
	  valuee++ ;
	  document.getElementById('count').value = valuee ;
	  var quantity = document.getElementById('count').value; 
	  var id = $('#count').attr("data-id");
	  console.log(id);
	  var url = "{{ route('update.quantity', ':id') }}";
      url = url.replace(':id', id);

	  $.ajax({
            url: url,		 
            method: "POST",
            dataType: "json",
            data: {
                _token: "{{ csrf_token() }}",

                quantity: quantity,
                id: id,
            },
			success: function(data) {

			}
		});
		
	  //var inputs = $('input'); // get all input elements on the page
      //inputs.index( $('#save-pinned-sites-btn') ); // find the index of spesific one
	  //var elem = document.querySelector('[data-id="something"]');
    }
	function minus(count){
	  var valuee = document.getElementById('count').value ;
	  if(valuee > 1 ){
	  valuee-- ;
	  }
	  document.getElementById('count').value = valuee ;
	  var quantity = document.getElementById('count').value; 
	  var id = $('#count').attr("data-id");
	  console.log(id);
	  var url = "{{ route('update.quantity', ':id') }}";
      url = url.replace(':id', id);

	  $.ajax({
            url: url,		 
            method: "POST",
            dataType: "json",
            data: {
                _token: "{{ csrf_token() }}",

                quantity: quantity,
                id: id,
            },
			success: function(data) {

			}
		});
    }
    
</script>
@endpush
@section('content')
	<!-- Default grid -->
     <div class="row">
        <div class="col-md-1">
        </div>
        <div class="col-md-9 text-center">
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
               <div class="col-md-1">
                  </div>
						<div class="col-md-9">
				            <div class="panel panel-flat" style="background-color:ivory;">
								<div class="panel-heading" style="background-color:ivory;">
									<h3 class="panel-title"> <i class="fa fa-wpforms"></i> Order Details </h3>
									<div class="heading-elements">
										<ul class="icons-list">
					                		<li><a data-action="collapse"></a></li>
					                		<li><a data-action="reload"></a></li>
					                		<li><a data-action="close"></a></li>
					                	</ul>
				                	</div>
								</div>

				                <div class="panel-body">
				                	<form action="{{ route('edit.order', $order->id) }}" method="POST">
                                        @csrf
										@method('PUT')
										<div class="row">
											<div class="col-md-10">
												<div class="form-group" style="margin-bottom: 10px;">
                                                    <label><strong>Order Number</strong></label>
                                                    <input style="background-color:#ffcccc;" type="text" value="{{ $order->order_number }}" readonly>
				                                </div>
											</div>

											
										</div>

										<div class="row">
											<div class="col-md-10">
												<div class="form-group">
                                                    <label><strong>Full Name</strong></label>
					                                <input type="text" class="form-control" name="full_name" value="{{ $order->full_name }}">
				                                </div>
											</div>

											
										</div>
                                        <div class="row">
											<div class="col-md-10">
												<div class="form-group">
                                                    <label><strong>Email</strong></label>
					                                <input type="text" class="form-control" name="email" value="{{ $order->email }}">
				                                </div>
											</div>				
										</div>
                                        <div class="row">
											<div class="col-md-10">
												<div class="form-group">
                                                    <label><strong>Address</strong></label>
					                                <input type="text" class="form-control" name="address" value="{{ $order->address }}">
				                                </div>
											</div>				
										</div>
                                        <div class="row">
											<div class="col-md-10">
												<div class="form-group">
                                                    <label><strong>Phone number</strong></label>
					                                <input type="text" class="form-control" name="phone" value="{{ $order->phone }}">
				                                </div>
											</div>				
										</div>


										<div class="row">
											<div class="col-md-10">
												<div class="form-group">
                                                   <label><strong>Total Cost</strong></label>
                                                   <input type="text" class="form-control" name="total_cost" value="{{ $order->total_cost }}">
				                                </div>
											</div>

											
										</div>
                                        <div class="row">
											<div class="col-md-10">
												<div class="form-group">
                                                    <label><strong>Payment</strong></label><br>
		                    	                         <div class="btn-group form-group" data-toggle="buttons">
									                         <label class="btn btn-warning" style="margin-left: 4px;">
										                         <input type="radio" name="payment_status" id="option1" value="pending"> Pending
									                         </label>

									                         <label class="btn btn-success">
										                         <input type="radio" name="payment_status" id="option2" value="paid"> Paid
									                         </label>
								                         </div>
				                                </div>
											</div>				
										</div>
                                        <div class="row">
											<div class="col-md-10">
												<div class="form-group">
                                                    <label><strong>Status</strong></label><br>
		                    	                         <div class="btn-group form-group" data-toggle="buttons">
									                         <label class="btn btn-warning" style="margin-left: 4px;">
										                         <input type="radio" name="status" id="option1" value="pending"> Pending
									                         </label>

									                         <label class="btn btn-info" style="margin-left: 4px;">
										                         <input type="radio" name="status" id="option2" value="shipped"> Shipped
									                         </label>

                                                             <label class="btn btn-success" style="margin-left: 4px;">
										                         <input type="radio" name="status" id="option3" value="delivered"> Delivered
									                         </label>

									                         <label class="btn btn-danger">
										                         <input type="radio" name="status" id="option4" value="canceled"> Canceled
									                         </label>
								                         </div>
				                                </div>
											</div>				
										</div>
                                        
                                        <div class="row">
											<div class="col-md-10">
												<div class="form-group">
                                                    <label><strong>Notes</strong></label>
					                                <textarea class="form-control" name="notes" style="background-color:beige;">{{ $order->notes }}</textarea>
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

                     <!-- Bordered panel body table -->
					<div class="panel panel-flat">
						<div class="panel-body">
							<div class="table-responsive">
								<table class="table table-bordered table-framed">
									<thead>
										<tr>
											<th>#</th>
											<th>Product</th>
											<th>Quantity</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
                                        @foreach($order_items as $item)
										<input type="hidden" name="item_id" class="id" value="{{ $item->id }}">
										<tr onclick="getrow(this)">
											<td>#</td>
											<td>{{ $item->product->name }}</td>
                                            <td class="item-quantity" data-title="Quantity">
                                               <div class="quantity">
												   <input type="button" class="plus" value="+" id="plus" onclick="plus(parseInt(document.getElementById('count').value))">
                                                   <input 
												   data-id="{{ $item->id }}" 
												      id="count" 
													  type="number" 
													  class=" qty text input-quantity"
                                                      step="1" min="0" name="quantity[]"
                                                      value="{{ $item->quantity }}" title="Qty" size="4">
													<input type="button" class="minus" value="-" id="minus" onclick="minus(parseInt(document.getElementById('count').value))">
                                               </div>
                                            </td>
											<td>
                                                <a href="#" class="btn btn-default" style="border:solid 1px; border-color:blue; color:blue;">Edit</a>
                                                <a href="{{ route('remove.item', $item->id) }}" class="btn btn-default" style="border:solid 1px; border-color:red; color:red;">Delete</a>
                                            </td>
										</tr>
                                        @endforeach
										
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<!-- /bordered panel body table -->

@endsection