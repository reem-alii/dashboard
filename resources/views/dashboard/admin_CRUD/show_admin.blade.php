@extends('dashboard.layouts.master')

@section('content')     
               
               <div class="col-lg-3">
               </div>
               
               <div class="col-lg-6">

							<!-- User thumbnail -->
							<div class="thumbnail">
								<div class="thumb thumb-rounded thumb-slide">
									<img src="{{ $admin->image ? asset('storage/' . $admin->image) : asset('assets/images/placeholder.jpg') }}" alt="">
									<div class="caption">
										<span>
											<a href="#" class="btn bg-success-400 btn-icon btn-xs" data-popup="lightbox"><i class="icon-camera"></i></a>
										</span>
									</div>
								</div>
							
						    	<div class="caption text-center">
						    		<h6 class="text-semibold no-margin">{{ $admin->first_name }} {{ $admin->last_name }} <small class="display-block">{{ $admin->email }}</small></h6>
					    			<ul class="icons-list mt-15">
				                    	<li> {{ $admin->phone }} </li>
				                    	<li><a href="#" data-popup="tooltip" title="Twitter"><i class="icon-twitter"></i></a></li>
				                    	<li><a href="#" data-popup="tooltip" title="Github"><i class="icon-github"></i></a></li>
			                    	</ul>
								            <h6 class="no-margin text-semibold"><hr></h6>
								            <p class="text-muted content-group-sm"><hr></p>
		                                    <a href="{{ route('edit.admin.form',$admin->id) }}"><button type="button" class="btn btn-info btn-float btn-rounded"><i class="fa-solid fa-pen"></i></button></a>
											<form method="POST" action="{{ route('delete.admin',$admin->id) }}" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
														    <button type="submit" style=" text-decoration: none; cursor: pointer;"
															onclick="return confirm('Are you sure you want to delete this admin?')"
															class="btn btn-danger btn-float btn-float-lg btn-rounded"> <i class="fa-solid fa-trash"></i>
                                                            </button>
                                                         </form>
		                                    <button type="button" class="btn btn-info btn-float btn-rounded btn-loading" data-loading-text="<i class='icon-spinner4 spinner'></i>"><i class="icon-spinner4"></i></button>
						    	</div>
					    	</div>
					    	<!-- /user thumbnail -->
						</div>
@endsection                        