@extends('dashboard.layouts.master')
@section('page_header')

                 <!-- Page header -->
         @include('dashboard.layouts.admin_table_header')	
		         <!-- /page header -->

@endsection
@section('content')
      <!-- Bordered striped table -->
	                   @if(session('success'))
                          <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
					<div class="panel panel-flat" style="background-color: #b2bec3;">
						<div class="panel-heading" style="background-color: #dfe6e9;">
							<h5 class="panel-title"><strong>Orders Table</strong></h5>
							<div class="heading-elements">
								<ul class="icons-list">
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
										<th>Date</th>
										<th>Full Name</th>
										<th>Email</th>
										<th>Address</th>
                                        <th>Phone</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
										<th>Status</th>
										<th>Payment Status</th>
										<th>Notes</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($orders as $order)
									<tr>
										<td>{{ $order->order_number }}</td>
										<td>{{ $order->created_at }}</td>
										<td>{{ $order->full_name }}</td>
										<td>{{ $order->email }}</td>
                                        <td>{{ $order->address }}</td>
                                        <td>{{ $order->phone }}</td>
                                        <td>{{ $order->quantity }}</td>
                                        <td>{{ $order->total_cost }} $</td>
										<td>
											@if($order->status == 'pending')
											<span class="label label-warning" style="padding: 5px 8px; border-color: black; font-size: 12px;">Pending</span>
                                            @elseif($order->status == 'shipped')
											<span class="label label-primary" style="padding: 5px 8px; border-color: black; font-size: 12px;">Shipped</span>
											@elseif($order->status == 'delivered')
											<span class="label label-success" style="padding: 5px 8px; border-color: black; font-size: 12px;">Delivered</span>
											elseif($order->status == 'canceled')
											<span class="label label-danger" style="padding: 5px 8px; border-color: black; font-size: 12px;">Canceled</span>
											@endif
										</td>
										<td><span class="label label-info" style="color:black;">{{ $order->payment_status }}</span></td>
										<td>{{ $order->notes ? $order->notes : '____'}}</td>

										<td>
								               <div class="btn-group">
			                    	               <button type="button" class="btn btn-sm dropdown-toggle" data-toggle="dropdown">Manage <span class="caret"></span></button>
			                    	               <ul class="dropdown-menu" style="top:0%; right:80%; padding:0; min-width: 100px; margin:0;">
										               <li><a href="{{ route('show.order', $order->id) }}"><i class="fa-regular fa-eye"></i> View</a></li>
										               <li style="padding:6px 6px;" onmouseover="this.style.backgroundColor='#f5f6fa'" onmouseout="this.style.backgroundColor='inherit'">
													      <form method="POST" action="#" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
														    <button type="submit" style="background: none; border: none; color: inherit; text-decoration: none; cursor: pointer; padding:2px 2px;"
															onclick="return confirm('Are you sure you want to delete this category?')">
                                                               <i class="fa-solid fa-trash" style="margin:0 6px"></i> Delete
                                                            </button>
                                                         </form>
													  </li>
									               </ul>
								               </div>
                                   </td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
					<!-- /bordered striped table -->
@endsection