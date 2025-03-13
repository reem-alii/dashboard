<?php

namespace App\Http\Controllers\Website\Comment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function saveComment(Request $request){
        Comment::create([
            'comment' => $request->comment,
            'product_id' =>$request->product_id,
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->back();
    }
    public function showComment(){
        $comments = Comment::all();
        return view('website.comment.showComment', compact('comments'));
    }
}
