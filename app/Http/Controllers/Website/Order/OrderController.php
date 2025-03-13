<?php

namespace App\Http\Controllers\Website\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Cart;
use App\Models\Order_Items;
use App\Models\Product;
use App\Http\Requests\Website\Order\OrderRequest;

class OrderController extends Controller
{
    
    public function createOrder(){
        $user = auth()->user();
        $quantity = $user->carts->sum('product_quantity');
        $price = $user->carts->sum('total_price');
        $order = Order::create([
            'user_id'      => auth()->user()->id,
            'quantity'     => $quantity,
            'total_cost'   => $price,
            'order_number' => '#'.random_int(10000, 99999),
        ]);
        foreach($user->carts as $cart):
            $order_item = Order_Items::create([
                'order_id' => $order->id,
                'product_id' => $cart->product->id,
                'quantity' => $cart->product_quantity,
            ]);
            $product = Product::where('id',$cart->product_id)->first();
            $product->quantity -= $cart->product_quantity;
            $product->save();
        endforeach;
        Cart::where('user_id',$user->id)->delete();
        return view('website.orders.confirm_order',compact('order'));
    }
    public function updateOrder(OrderRequest $request){
        $user = auth()->user();
        $order = Order::find($request->order_id);
        $order->update([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);
        return redirect()->route('user.orders');
    }
    public function showAllOrders(){
        $user = auth()->user();
        $orders = Order::where('user_id',$user->id)->get();

        return view('website.orders.all_orders',compact('orders'));
    }
    public function deleteOrder($id){
        $items = Order_Items::where('order_id',$id)->get();
        foreach($items as $item):
          $product = Product::where('id',$item->product_id)->first();
          //dd($product);
          $product->quantity += $item->quantity;
          $product->save();
          $item->delete();
        endforeach;
        Order::destroy($id);
        return redirect()->back();
    }
    public function showOrderDetails($id){
        $order = Order::find($id);
        return view('website.orders.order_details',compact('order'));
    }
}
