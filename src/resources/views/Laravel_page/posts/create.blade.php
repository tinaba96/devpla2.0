@extends('layouts.app')

@section('content')
<body style="background:url(https://devpla.s3.ap-northeast-1.amazonaws.com/devpla/bg.jpeg); background-size:cover;">
    <div class="container mt-4">
        <div class="border p-4 newd">
            <h1 class="h5 mb-4">
                投稿の新規作成
            </h1>

            <form method="POST" action="{{ route('posts.create') }}" enctype="multipart/form-data">
                @csrf

                <fieldset class="mb-4">
                    <div class="form-group">
                        <label for="title">
                            タイトル
                        </label>
                        <input
                            id="title"
                            name="title"
                            class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
                            value="{{ old('title') }}"
                            type="text"
                        >
                        @if ($errors->has('title'))
                            <div class="invalid-feedback">
                                {{ $errors->first('title') }}
                            </div>
                        @endif



                    </div>

                    <div class="form-group">
                        <label for="body">
                            本文
                        </label>

                        <textarea
                            id="editor"
                            name="body"
                            class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}"
                            rows="4"
                        >{{ old('body') }}</textarea>
                        @if ($errors->has('body'))
                            <div class="invalid-feedback">
                                {{ $errors->first('body') }}
                            </div>
                        @endif
                            <br>
                            <p>画像を添付</p>
			                  

                    </div>

                    <div class="mt-5">
                        <a class="btn btn-secondary" href="{{ route('posts.index') }}">
                            キャンセル
                        </a>

                        <button type="submit" class="btn btn-primary">
                            投稿する
                        </button>
                    </div>
                </fieldset>
            </form>
		

		@if (count($errors) > 0)
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
		</ul>
		</div>
		@endif
        </div>
    </div>
@endsection
