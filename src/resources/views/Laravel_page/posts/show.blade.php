@extends('layouts.app')

<head>
<script src="https://kit.fontawesome.com/7c7377020a.js" crossorigin="anonymous"></script>
</head>

@section('content')
<body style="background:url(https://devpla.s3.ap-northeast-1.amazonaws.com/devpla/bg.jpeg); background-size:cover;">
    <div class="container mt-4">
        <div class="border p-4 newd">
            <h1 class="h5 mb-4">
                {{ $post->title }}
            </h1>
            @can('edit', $post)
                <div class="mb-4 text-right">
                    <a class="btn btn-primary" href="{{ route('posts.edit', ['post_id' => $post]) }}">
                        編集する
                    </a>
                    <form
                    style="display: inline-block;"
                    method="POST"
                    action="{{ route('posts.destroy', ['post_id' => $post]) }}"
                    >
                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger">削除する</button>
                    </form>
                </div>
            @endcan



            <p class="mb-5">
                {!! nl2br($post->body_html) !!}
            </p>

            <section>
                <h2 class="h5 mb-4">
                    コメント
                </h2>
                <form class="mb-4" method="POST" action="{{ route('comments.store',['post_id' => $post] ) }}">
                    @csrf

                    <input
                        name="post_id"
                        type="hidden"
                        value="{{ $post->id }}"
                    >

                    <div class="form-group">
                        <label for="body">
                            本文
                        </label>

                        <textarea
                            id="body"
                            name="body"
                            class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}"
                            rows="4"
                        >{{ old('body') }}</textarea>
                        @if ($errors->has('body'))
                            <div class="invalid-feedback">
                                {{ $errors->first('body') }}
                            </div>
                        @endif
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">
                            コメントする
                        </button>
                    </div>
                </form>

                @forelse($post->comments as $comment)
                    <div class="border-top p-4">
                        <time class="text-secondary">
                            {{ $comment->created_at->format('Y.m.d H:i') }}
                        </time>
                        <p class="mt-2">
                            {!! nl2br(e($comment->body)) !!}
                        </p>
                    </div>
                @empty
                    <p>コメントはまだありません。</p>
                @endforelse
            </section>
	    <div class="row justify-content-center">
                @if ($post->users()->where('user_id', Auth::id())->exists())
                    <div class="col align-self-end">
		    <form action="{{ route('unlikes', $post) }}" method="POST">
		      @csrf
		      <input type="submit" value="&#xf164;UnLike" class="fas btn btn-danger">
		    </form>
	    </div>
                @else
                    <div class="col align-self-end">
		    <form action="{{ route('likes', $post) }}" method="POST">
		      @csrf
		      <input type="submit" value="&#xf164;Like" class="fas btn btn-success">
		    </form>
		    </div>
                @endif


        </div>
    </div>
@endsection