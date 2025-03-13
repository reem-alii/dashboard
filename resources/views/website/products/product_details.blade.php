@extends('website.layouts.master')
@section('content')

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
    <div class="About-content" style="color:black;"> 
            <div class="who-are-we">
               
              <br>
            <h2 class="about-heading">{{ $product->name }}</h2>
            
            <p class="about-paragraph" >Description :{{ $product->description }}</p>
            </div>


            <div>
                <ul class="about-list">
                <li class="list"> 
                   <div class="list-icon"><i class="fa-solid fa-money-check-dollar"></i></div> 
                   <span>Price :{{ $product->price }}</span>
                
                </li>

                <li class="list">

                    <div class="list-icon"><i class="fa-solid fa-tags"></i></div> 
                    <span>Size :{{ $product->size }} </span>

                </li>

                <li class="list">
                    <div class="list-icon"><i class="fa-solid fa-palette"></i></div> 
                    <span>Color :{{ $product->color }} </span>


                </li>

                <li class="list">
                    
                    <div class="list-icon"><i class="fa-solid fa-layer-group"></i></div> 
                    <span>Category :{{ $product->category->name }} </span>
                </li>
      
                </ul>
                
              </div>
              <div class="col-lg-10 col-md-9">
                </div>

               <div class="col-lg-5 col-md-3" style="margin-right: 200px; margin-top: 35px;">

                <ul class="icons-list mt-15">
					<li>
                        <form action="{{ route('add.to.cart',$product->id)}}" method="POST">
                            @csrf
                            <div style=" background-color:white; padding:4px 6px;">
                            <label for="quantity">select quantity :</label>
                             <select name="quantity" class="text-center" style="padding:2px 4px ;">
                             @for($i=1; $i<= $product->quantity; $i++)
                                 <option class="form-control text-center" value="{{ $i }}">{{ $i }}</option>
                             @endfor
                             </select>
                             </div>
                            <button type="submit" style="border:#636e72; color: inherit; text-decoration: none; cursor: pointer; padding:20px 20px; border-radius:2px; background-color:yellow; font-size:large;">
						        Add to cart <i class="fa-solid fa-cart-shopping" style="margin:0 6px; font-size:15px;"></i>
                            </button>
                        </form>
					</li>
                </ul>
                </div>
                
         </div>   
             
        <div class="location-img">

            <img src="{{ $product->image ? asset('storage/' . $product->image) : asset('assets/images/placeholder.jpg') }}" alt="product">

        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <!-- Basic alert -->
						<div class="alert alpha-brown border-brown alert-styled-left text-center" style="margin-left: 93px;background-color:#AE68464D;position: initial; color:black; margin-top: 5px; font-size: 20px">
                        <i class="fa-solid fa-comment-dots"></i>  Comments and FeedBack  <i class="fa-solid fa-comment-dots"></i>
					    </div>
				<!-- /basic alert -->
            </div>
        </div>
        
        <div class="row">
         <div class="col-lg-6 col-md-6">
           <!-- Share your thoughts -->
							<div class="panel panel-flat">
								<div class="panel-heading" style="background-color: #AE684624;">
									<h6 class="panel-title">Share your Comment</h6>
								</div>

								<div class="panel-body" style="background-color: #AE684624;">
									<form action="{{ route('save.comment') }}" method="POST">
                                        @csrf
										<div class="form-group">
											<textarea name="comment" class="form-control mb-15" rows="3" cols="1" placeholder="What's on your mind?"></textarea>
										</div>
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">

										<div class="row">
				                    		<div class="col-xs-6">
					                        	
				                    		</div>

				                    		<div class="col-xs-6 text-right">
					                            <button type="submit" class="btn bg-brown btn-labeled btn-labeled-right">Share <b><i class="icon-circle-left2"></i></b></button>
				                    		</div>
				                    	</div>
			                    	</form>
		                    	</div>
							</div>
							<!-- /share your thoughts --> 
          </div>

            <!-- Comments on Product -->

            <div class="col-lg-6 col-md-12">
              <div class="panel-body">
                <ul class="media-list chat-list chat-list-inverse content-group">
                    <li class="media reversed">
						<div class="media-body">
							<div class="media-content" style="text-align: left; background-color:#A1887F; color:black;">
                            <h4 style="margin-top: 0px; margin-bottom: 0px;"> Hi </h4>
                                Thus superb the tapir the wallaby blank frog execrably much since dalmatian by in hot. Uninspiringly arose mounted stared one curt safe</div>
							<span class="media-annotation display-block mt-10" style="color:black;">Nov 1, 2024 <i class="icon-pin-alt position-right"></i></span>
						</div>

						<div class="media-right">
								<img src="{{ asset('assets/images/placeholder.jpg') }}" class="img-circle" alt="">
						</div>
			        </li>
                </ul>
              </div>
            </div>
            <!---------------------------------------------->
            @foreach($comments as $comment)
            <div class="col-lg-6 col-md-6">
              </div>

            <div class="col-lg-6 col-md-12">
              <div class="panel-body">
                <ul class="media-list chat-list chat-list-inverse content-group">
                    <li class="media reversed">
						<div class="media-body">
							<div class="media-content" style="text-align: left; background-color:#A1887F; color:black;">
                            <h4 style="margin-top: 0px; margin-bottom: 0px;"> {{ $comment->user->first_name}} {{ $comment->user->last_name}} </h4>
                                {{ $comment->comment }} 
                            </div>
							<span class="media-annotation display-block mt-10" style="color:black;">{{ $comment->created_at }} <i class="icon-pin-alt position-right"></i></span>
						</div>

						<div class="media-right">
								<img src="{{ asset('assets/images/placeholder.jpg') }}" class="img-circle" alt="">
						</div>
			        </li>
                </ul>
              </div>
            </div>
            @endforeach
            <!-- /comments on Product -->

        </div>
        
@endsection