<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;

class LikeController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Post $post)
    {
	    $post->users()->attach(Auth::id());
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
	    $post->users()->detach(Auth::id());
        return back();
    }
}
