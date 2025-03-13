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
					<div class="panel panel-flat" style="background-color: #b2bec3; width:100%;">
						<div class="panel-heading" style="background-color: #dfe6e9; width:100%;">
							<h5 class="panel-title"><strong>products Table</strong></h5>
							<div class="heading-elements">
								<ul class="icons-list">
									<li><a href="{{ route('create.product.form') }}" class="btn btn-primary"> Create Product <i class="fa-solid fa-tag"></i></a></li>
			                	</ul>
		                	</div>
						</div>

						<div class="panel-body">

						</div>

						<div class="table-responsive text-center" style="width:100%; table-layout: fixed; word-wrap: break-word;">
							<table class="table table-bordered table-striped text-center" style="width:100%; table-layout: fixed; word-wrap: break-word;">
								<thead>
									<tr>
										<th>#</th>
										<th>Name</th>
										<th>Description</th>
										<th>Image</th>
										<th>Price</th>
                                        <th>Size</th>
                                        <th>Color</th>
                                        <th>Quantity</th>
                                        <th>Category</th>
                                        <th>Approval</th>
                                        <th>Member</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($products as $product)
									<tr>
										<td>{{ $product->id }}</td>
										<td>{{ $product->name }}</td>
										<td>{{ $product->description }}</td>
										<td>
										<img src="{{ $product->image ? asset('storage/' . $product->image) : asset('assets/images/placeholder.jpg') }}" style="width:70px;" alt="">	
										</td>
										<td>${{ $product->price }}</td>
                                        <td>{{ $product->size }}</td>
                                        <td>{{ $product->color }}</td>
                                        <td>{{ $product->quantity }}</td>
                                        <td>{{ $product->category->name }}</td>
                                        <td>
                                            @if($product->Approve == 1)
											<span class="label label-success">Approved</span>
                                            @else
											  <div class="d-flex justify-content-center">
                                               <a href="{{ route('approve.product',$product->id) }}" class="label label-danger text-center">Not Approved </a>
                                              </div>
											@endif
                                        </td>
                                        <td>{{ $product->admin->first_name }} {{ $product->admin->last_name }}</td>
										<td>
								               <div class="btn-group">
			                    	               <button type="button" class="btn btn-sm dropdown-toggle" data-toggle="dropdown">Manage <span class="caret"></span></button>
			                    	               <ul class="dropdown-menu" style="top:0%; right:80%; padding:0; min-width: 100px; margin:0;">
												       <li><a href="{{ route('show.product',$product->id) }}"><i class="fa-regular fa-eye"></i> Show</a></li>
										               <li><a href="{{ route('edit.product.form',$product->id) }}"><i class="fa-solid fa-user-pen"></i> Edit</a></li>
										               <li style="padding:6px 6px;" onmouseover="this.style.backgroundColor='#f5f6fa'" onmouseout="this.style.backgroundColor='inherit'">
													      <form method="POST" action="{{ route('delete.product',$product->id) }}" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
														    <button type="submit" style="background: none; border: none; color: inherit; text-decoration: none; cursor: pointer; padding:2px 2px;"
															onclick="return confirm('Are you sure you want to delete this user?')">
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