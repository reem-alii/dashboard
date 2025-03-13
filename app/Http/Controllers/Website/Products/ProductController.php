<?php

namespace App\Http\Controllers\Website\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Comment;

class ProductController extends Controller
{
    public function showAllProducts(){
        $products = Product::all();
        return view('website.products.products_index', compact('products'));
    }
    public function showProductDetails($id){
        $product = Product::find($id);
        $comments = Comment::where('product_id',$id)->get();
        return view('website.products.product_details', compact('product','comments'));
    }
    
}
