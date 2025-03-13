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
							<h5 class="panel-title"><strong>Comments Table</strong></h5>
							<div class="heading-elements">
								<ul class="icons-list">
									<li><a href="{{ route('create.category.form') }}" class="btn btn-primary"> Create Category <i class="fa-solid fa-tag"></i></a></li>
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
										<th>Comment</th>
										<th>User</th>
										<th>Product</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($comments as $comment)
									<tr>
										<td>{{ $comment->id }}</td>
										<td>{{ $comment->comment }}</td>
										<td>{{ $comment->user->email }}</td>
										<td>{{ $comment->product->name }}</td>
										<td>
								               <div class="btn-group">
			                    	               <button type="button" class="btn btn-sm dropdown-toggle" data-toggle="dropdown">Manage <span class="caret"></span></button>
			                    	               <ul class="dropdown-menu" style="top:0%; right:80%; padding:0; min-width: 100px; margin:0;">
										               <li style="padding:6px 6px;" onmouseover="this.style.backgroundColor='#f5f6fa'" onmouseout="this.style.backgroundColor='inherit'">
													      <form action="{{ route('delete.comment', $comment->id) }}" method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
														    <button type="submit" style="background: none; border: none; color: inherit; text-decoration: none; cursor: pointer; padding:2px 2px;"
															onclick="return confirm('Are you sure you want to delete this comment?')">
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