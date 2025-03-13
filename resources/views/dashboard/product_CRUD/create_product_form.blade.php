@extends('dashboard.layouts.master')
@section('content')
	<!-- Default grid -->
     <div class="row">
        <div class="col-lg-3">
        </div>
        <div class="col-lg-6 text-center">
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
               <div class="col-lg-3">
                  </div>
						<div class="col-lg-6">
				            <div class="panel panel-flat" style="background-color:beige;">
								<div class="panel-heading" style="background-color:beige;">
									<h6 class="panel-title"> <i class="fa-solid fa-tag"></i> Create Product </h6>
									<div class="heading-elements">
										<ul class="icons-list">
					                		<li><a data-action="collapse"></a></li>
					                		<li><a data-action="reload"></a></li>
					                		<li><a data-action="close"></a></li>
					                	</ul>
				                	</div>
								</div>

				                <div class="panel-body">
				                	<form action="{{ route('store.product') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
										<div class="row">
											<div class="col-md-10">
												<div class="form-group">
                                                    <label>Name</label>
					                                <input type="text" name="name[ar]" class="form-control" value="{{ old('name[ar]') }}" placeholder="Name in Arabic">
                                                    <input type="text" name="name[en]" class="form-control" value="{{ old('name[en]') }}" placeholder="Name in English">
				                                </div>
											</div>

											
										</div>

										<div class="row">
											<div class="col-md-10">
												<div class="form-group">
                                                    <label>Description</label>
					                                <textarea class="form-control" style="background-color: #3d239924;" name="description[ar]" >{{ old('description[ar]') }}arabic</textarea>
													<textarea class="form-control" style="background-color: #3d239924;" name="description[en]" >{{ old('description[en]') }}english</textarea>
				                                </div>
											</div>	
										</div>
                                        <div class="row">
											<div class="col-md-10">
												<div class="form-group">
                                                    <label>Price</label>
					                                <input type="text" class="form-control" name="price" value="{{ old('price') }}" placeholder="Price">
				                                </div>
											</div>				
										</div>
                                        <div class="row">
											<div class="col-md-10">
												<div class="form-group">
                                                    <label>Size</label>
					                                <input type="text" class="form-control" name="size" value="{{ old('size') }}" placeholder="Size">
				                                </div>
											</div>				
										</div>
                                        <div class="row">
											<div class="col-md-10">
												<div class="form-group">
                                                    <label>Color</label>
					                                <input type="text" class="form-control" name="color" value="{{ old('color') }}" placeholder="Color">
				                                </div>
											</div>				
										</div>

										<div class="row">
											<div class="col-md-10">
												<div class="form-group">
                                                   <label>Quantity</label>
                                                   <input type="text" class="form-control" name="quantity" value="{{ old('quantity') }}" placeholder="Quantity">
				                                </div>
											</div>				
										</div>
                                        <div class="row">
											<div class="col-md-10">
												<div class="form-group">
                                                   <label for="category_id">Category :</label>
												   <select name="category_id" class="form-control text-center" style="background-color: #3d239924; width: 50%;">
                                                    @foreach($categories as $category)
                                                    <option class="form-control" value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                    </select>
				                                </div>
											</div>				
										</div>
                                        <div class="row">
											<div class="col-md-10">
												<div class="form-group">
                                                    <label><strong>Upload product picture</strong></label>
					                                <input type="file" name="image" class="file-styled">
				                                </div>
											</div>				
										</div>
                                        <div class="row">
											<div class="col-md-6">
												<div class="form-group">
                                                   <label for="admin_id">Created By :</label>
                                                   <select name="admin_id" class="form-control text-center" style="background-color: #3d239924;">
                                                    @foreach($admins as $admin)
                                                    <option class="form-control" value="{{ $admin->id }}">{{ $admin->first_name }} {{ $admin->last_name }}</option>
                                                    @endforeach
                                                    </select>
				                                </div>
											</div>				
										</div>
                                    

				                        <div class="text-right">
				                        	<button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-left13 position-right"></i></button>
				                        </div>
			                        </form>
				                </div>
				            </div>
						</div>
					</div>
					<!-- /default grid -->

@endsection