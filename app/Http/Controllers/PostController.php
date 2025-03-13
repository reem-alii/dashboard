<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Product;

class PostController extends Controller
{
    public function storePost(Request $request){
        $request->validate([
            'name.en' => 'required|regex:/^[A-Za-z0-9 ]+$/',
            'name.ar' => 'required|regex:/^[\p{Arabic}\s\p{N}]+$/u',
        ]);
        dd('correct');
        $post = Post::create([
            'name'=> $request->name,
            'description'=> $request->description,
        ]);
        return redirect()->back();
    }
    public function showPosts()
    {
        $posts = Post::all();
        //dd($posts);
        $products = Product::paginate(1);
        return view('website.index', compact('posts','products'));
    }
    
}
