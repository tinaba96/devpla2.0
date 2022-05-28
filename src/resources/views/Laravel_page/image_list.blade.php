@extends('layouts.app')

@section('content')

<body style="background:url(https://devpla.s3.ap-northeast-1.amazonaws.com/devpla/bg.jpeg); background-size:cover;">
<a class = text-white href="{{ route('posts.index') }}">投稿画面に戻る</a>
<h1 style="color:green; text-align:center;  font-size: 2.25rem;">写真一覧</h1>
<hr />

@foreach($images as $image)
<div style="width: 18rem; float:left; margin: 16px;">
	<p style='color:orange;'>{{ $image->file_name }}</p>
	<img src="{{ $image -> file_path }}" style="width:100%;">
	<p style='color:blue;'>投稿日時 {{ $image->created_at->format('Y.m.d') }}</p>
</div>

@endforeach

@endsection
