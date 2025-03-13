<?php

namespace App\Http\Controllers\Website\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Post ;

class IndexController extends Controller
{
    public function showIndex(){
        //$products = Product::all();
        $products = Product::paginate(8);
        //$products = NULL ;
        $posts = Post::all();
        return view('website.index',compact('products','posts'));

    }
    public function showCategory($id){
        $products = Product::where('category_id', $id)->paginate(8);
        $posts = Post::all();
        if($products->count() == 0){
            $products = NULL;
        }
        return view('website.index', compact('products','posts'));
    }
    public function all(){
        $products = Product::paginate(8);
        //return redirect()->back()->with(compact('products'));
        return view('website.index', compact('products'));

    }
    
}
