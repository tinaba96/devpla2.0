<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use Illuminate\Http\Request;
use App\Post;
use App\Comment; 
use Auth;

class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(CommentRequest $request)
    {
        $posts = Post::find($request->post_id);  //まず該当の投稿を探す
        $comment = new Comment;          //commentのインスタンスを作成
        $comment -> body    = $request -> body;
        $comment -> user_id = Auth::id();
        $comment -> post_id = $request -> post_id;
        $comment -> save();

        return redirect()->route('posts.index', ['post_id' => $posts->id]);
    }

}