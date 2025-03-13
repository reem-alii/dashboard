<?php

namespace App\Http\Controllers\Dashboard\CommentCRUD;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function deleteComment($id){
        Comment::destroy($id);
        return redirect()->back();
    }
}
