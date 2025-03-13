<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Order;

class VerifyOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $order_id = $request->route('id');
        $order = Order::find($order_id);
        if ($order->user_id !== auth()->user()->id) {
            return redirect()->route('user.orders');
        }else{  
            return $next($request);
        }
    }
}
