@extends('website.layouts.master')
@section('page_header')

@endsection

@section('content')
     <div class="row">
	  <div class="col-md-2">
		</div>
		<div class="col-md-8">
        	<h3 class="panel text-center" style="background-color:white;padding:5px 5px; margin-top: 20px;">  Confirm Order </h3>
            <form action="{{ route('update.order') }}" method="POST">
				@csrf
				@method('PUT')
				<input type="hidden" name="order_id" value="{{ $order->id }}">
               <ul class="footer-list" type="none" style="padding-right: 5px;">
                <li  class="footer-li-item" style="color:black;">
                    >&nbsp Order Number : <input style="background-color:#ffcccc;" type="text" value="{{ $order->order_number }}" readonly>
                </li>
                
                <li class="footer-li-item" style="color:black;">
                    >&nbsp Full Name : <input type="text" name="full_name" placeholder="full name" value="{{ old('full_name') }}">
                </li>
                
                <li class="footer-li-item" style="color:black;">
                    >&nbsp Phone Number : <input type="text" name="phone" placeholder="0123456789" value="{{ old('phone') }}">
                </li>
                
                <li class="footer-li-item" style="color:black;">
                    >&nbsp Address : <input type="text" name="address" placeholder="13 street city" value="{{ old('address') }}">
                </li>
                
                <li class="footer-li-item" style="color:black;">
                    >&nbsp Email : <input type="text" name="email" placeholder="email@example.com" value="{{ $order->user->email }}">
                </li>
                
                <li class="footer-li-item" style="color:black;">
                    >&nbsp Quantity : <input style="background-color:#ffcccc;" type="text" value="{{ $order->quantity }}" readonly>
                </li>

				<li class="footer-li-item" style="color:black;">
                    >&nbsp Total Cost : <input style="background-color:#ffcccc;" type="text" value="{{ $order->total_cost }}$" readonly>
                </li>
               </ul>
			   <div class="text-center">
			     <button type="submit" class="btn btn-lg btn-primary">Submit</button>
               </div>
			</form>

		</div> 
	</div>


@endsection