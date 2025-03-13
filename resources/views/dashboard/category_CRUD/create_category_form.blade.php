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
									<h6 class="panel-title"> <i class="fa-solid fa-user-plus"></i> Create Category </h6>
									<div class="heading-elements">
										<ul class="icons-list">
					                		<li><a data-action="collapse"></a></li>
					                		<li><a data-action="reload"></a></li>
					                		<li><a data-action="close"></a></li>
					                	</ul>
				                	</div>
								</div>

				                <div class="panel-body">
				                	<form action="{{ route('store.category') }}" method="POST">
                                        @csrf
										<div class="row">
											<div class="col-md-10">
												<div class="form-group">
                                                    <label>Name</label>
					                                <input type="text" name="name[en]" class="form-control" value="{{ old('name[en]') }}" placeholder="Name in English">
													<input type="text" name="name[ar]" class="form-control" value="{{ old('name[ar]') }}" placeholder="Name in Arabic">
				                                </div>
											</div>

											
										</div>

										<div class="row">
											<div class="col-md-10">
												<div class="form-group">
                                                    <label>Description</label>
					                                <textarea class="form-control" style="background-color: #3d239924;" name="description[en]">{{ old('description[en]')? old('description[en]') : "description in English" }}</textarea>
													<textarea class="form-control" style="background-color: #3d239924;" name="description[ar]">{{ old('description[ar]')? old('description[ar]') : "description in Arabic" }}</textarea>
				                                </div>
											</div>	
										</div>
                                        

										<div class="row">
											<div class="col-md-10">
												<div class="form-group">
                                                   <label>Allow Ads</label><br>
                                                   <input type="radio" id="yes" name="allow_ads" value="1">
                                                   <label for="yes">Yes</label><br>
                                                   <input type="radio" id="no" name="allow_ads" value="0">
                                                   <label for="no">No</label><br>
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