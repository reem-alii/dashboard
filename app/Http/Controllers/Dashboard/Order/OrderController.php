<?php

namespace App\Http\Controllers\Dashboard\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Order_Items;
use App\Models\Product;

class OrderController extends Controller
{
    
    public function showOrderDetails($id){
        $order = Order::find($id);
        $order_items = Order_Items::where('order_id', $id)->get();

        return view('dashboard.order_CRUD.order_details', compact('order','order_items'));
    }
    public function editOrder(Request $request, $id){
        dd($request);
        $order = Order::find($id);
    }
    public function removeItem($id){
        $order_item = Order_Items::find($id);
        $minus = $order_item->product->price * $order_item->quantity ;
        $order_item->order->total_cost -= $minus;
        $order_item->order->quantity -= $order_item->quantity ;
        $order_item->order->save();
        //dd($order_item->order);
        $order_item->delete();
        return redirect()->back();
    }

    public function updateQuntity(Request $request , $id ){
     $order_item = Order_Items::find($id);
     $old_value = $order_item->quantity ;
     $product = Product::find($order_item->product_id);
     
     //Check if stock quantity is less than or equal input quantity
     if ($request->quantity <= $product->quantity){
         $order_item->update([
            'quantity'    => $request->quantity,
        ]);

        // Update quantity in orders table
        if($request->quantity > $old_value ){ //plus
        $order_item->order->quantity += ($request->quantity - $old_value);
        $order_item->order->save();

        }else{ //minus
            $order_item->order->quantity -= ($old_value - $request->quantity);
            $order_item->order->save();
        }
    }

    return redirect()->back();
    }
}
