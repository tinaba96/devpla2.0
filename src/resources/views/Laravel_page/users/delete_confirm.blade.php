@extends('layouts.app')

@section('content')

<div class="card container">
    <div class="border-dark mt-3">
        <div class="card-header">
        <h3 class="mt-3">退会の確認</h3>
        </div>
    </div>
    <div class="card-body">
        <p class="card-text">退会をすると投稿も全て削除されます。</p>
        <p class="card-text">それでも退会をしますか？</p>
    </div>

    <div class="btn-group ml-3 mb-3">
        {!! Form::open(['route'=>['users.destroy',Auth::user()->id],'method'=>'delete']) !!}
            {!!Form::submit('退会する',['class'=>'btn btn-danger'])!!}
        {!! Form::close()!!}

        <div class="ml-3">
            <a href="/" class="btn btn-primary">キャンセルする</a>
        </div>
    </div>
</div>

@endsection