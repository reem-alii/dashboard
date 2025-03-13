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
				            <div class="panel panel-flat" style="background-color:ivory;">
								<div class="panel-heading" style="background-color:ivory;">
									<h3 class="panel-title"> <i class="fa-solid fa-tag"></i> Edit Category </h3>
									<div class="heading-elements">
										<ul class="icons-list">
					                		<li><a data-action="collapse"></a></li>
					                		<li><a data-action="reload"></a></li>
					                		<li><a data-action="close"></a></li>
					                	</ul>
				                	</div>
								</div>

				                <div class="panel-body">
				                	<form action="{{ route('update.category', $category->id) }}" method="POST">
                                        @csrf
										@method('PUT')
                                        <input type="hidden" name="category_id" value="{{ $category->id }}">
										<div class="row">
											<div class="col-md-10">
												<div class="form-group">
                                                    <label><strong>Name</strong></label>
					                                <input type="text" name="name" class="form-control" value="{{ $category->name }}" placeholder="Name">
				                                </div>
											</div>

											
										</div>

										<div class="row">
											<div class="col-md-10">
												<div class="form-group">
                                                    <label>Description</label>
					                                <textarea class="form-control" style="background-color: #3d239924;" name="description">{{ $category->description }}</textarea>
				                                </div>
											</div>		
										</div>
                                        <div class="row">
											<div class="col-md-10">
												<div class="form-group">
                                                   <label>Allow Ads</label>
                                                   <input type="radio" id="yes" name="allow_ads" value="1">
                                                   <label for="yes">Yes</label><br>
                                                   <input type="radio" id="no" name="allow_ads" value="0">
                                                   <label for="no">No</label><br>
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

@endsection