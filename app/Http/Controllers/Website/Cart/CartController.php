<?php

namespace App\Http\Controllers\Website\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;

class CartController extends Controller
{
    public function showCart(){
        $cart_items = Cart::where('user_id', auth()->user()->id)->get();
        return view('website.cart', compact('cart_items'));
    }

    public function addToCart(Request $request, $id){
        $product = Product::find($id);
        $exist_cart = Cart::where('product_id',$id)->first();
        if($exist_cart){
            $exist_cart->product_quantity += $request->quantity;
            $exist_cart->total_price += ($request->quantity * $product->price) ;
            $exist_cart->save();
        }else{
          Cart::create([
            'user_id'          => auth()->user()->id,
            'product_id'       => $id,
            'product_quantity' => $request->quantity,
            'price'            => $product->price,
            'total_price'      => $request->quantity * $product->price,
          ]);
        }

        return redirect()->back()->with('success', 'Added to cart successfully');
    }
    // public function updateQuantity(Request $request, $id){ // Select quantity button
    //     $cart = Cart::find($id);
    //     $cart->product_quantity = $request->quantity;
    //     $cart->total_price = $request->quantity * $cart->price;
    //     $cart->save();

    //     return redirect()->back();
    // }
    public function removeFromCart($id){
        Cart::destroy($id);
        return redirect()->back();
    }
}
