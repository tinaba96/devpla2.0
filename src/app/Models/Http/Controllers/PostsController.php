<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Post;
use App\Images;
use Storage;


class PostsController extends Controller{
    //投稿一覧ページを表示する。
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('posts.index', ["posts" => $posts]);
    }

    //投稿作成ページを表示する。
    public function showCreateForm()
    {
        return view('posts.create');
    }

    //投稿作成処理を実行する。
    public function create(Request $request)
    {
        // Postモデルのインスタンスを作成する
        $post = new Post();
        // タイトル
        //$post->title = $request->title;
        //コンテンツ
        $post->body = $request->body;
        //登録ユーザーからidを取得
        $post->user_id = Auth::user()->id;
        // インスタンスの状態をデータベースに書き込む
        $post->save();
    
    if ($request -> file('image')){
		$request->validate([
			'image' => 'required|file|image|mimes:png,jpeg',
		]);

		$images = $request->file('image');

		if($images) {
            $path = Storage::disk('s3')->putFile('devpla', $images, 'public');

			if($path){
				Images::create([
                    "post_id" => $post->id,
					"file_name" => $images->getClientOriginalName(),
					"file_path" => Storage::disk('s3')->url($path)
				]);
			}
    }
    }
        //「投稿する」をクリックしたら投稿情報表示ページへリダイレクト        
        return redirect()->route('posts.index', [
            'post' => $post,
        ]);
    }
        
    //投稿編集ページを表示する。
    function showEditForm($post_id)
    {
        $post = Post::findOrFail($post_id);
        return view('posts.edit', [
            'post' => $post,
        ]);
    }

    //投稿編集処理を実行する。
    function update($post_id, Request $request)
    {
        $post = Post::findOrFail($post_id);
        //$post->title = $request->title;
        //コンテンツ
        $post->body = $request->body;
        //登録ユーザーからidを取得
        $post->user_id = Auth::user()->id;
        $post->save();
        return redirect()->route('posts.show', ['post_id' => $post->id]);
    }

    //投稿詳細ページを表示する。
    function show($post_id)
    {
    $post = Post::findOrFail($post_id);

    return view('posts.show', [
        'post' => $post,
    ]);
    }

    //投稿削除処理を実行する。
    function destroy($post_id)
    {
        $post = \App\Post::find($post_id);
        //削除
        $post->delete();

    return redirect()->route('posts.index');
    }

    function upload(Request $request){
        $request->validate([
            'image' => 'required|file|image|mimes:png,jpeg',
        ]);

        $images = $request->file('image');

        if($images) {
            //saving uploaded image
            $path = $images->store('uploads',"public");
            //store in DB
            if($path){
                Images::create([
                    "post_id" => $post_id,
                    "file_name" => $images->getClientOriginalName(),
                    "file_path" => $path
                ]);
            }
        }
        return redirect("/list");
	}

}
