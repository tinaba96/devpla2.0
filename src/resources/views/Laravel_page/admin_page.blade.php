<style>
    .post-card{
        margin-top: 20px;
        margin-bottom: 20px;
    }
    .cont{
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
    }

</style>

@extends('layouts.app')

@section('content')
<body style="background:url(https://devpla.s3.ap-northeast-1.amazonaws.com/devpla/bg.jpeg); background-size:cover;">

<div class="container">
    <h1 style="color:green; text-align:center;">アクティブユーザー</h1>

    <div class="row">
        @foreach($users as $user)
        @if ($user->role != 'admin')
            <div class="col-md-6">
                <div class="card post-card">
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-6" style='text-overflow: ellipsis;' >
                                <a href="{{ url('/users/' . $user->id) }}">
                                <div class="cont">
                                <h3 style='text-overflow: ellipsis;'>{{ $user->name }}</h3>
                                </div>
                                </a>
                            </div>
                            <div class="col-md-6"> 
                                <u>最終ログイン</u>
                                <div>{{ $user->last_login_at }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @endforeach 
    </div>
</div>



@endsection