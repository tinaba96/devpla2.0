<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- CSS読み込み 移動削除厳禁-->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- CSS読み込み 移動削除厳禁-->

    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link
        rel="stylesheet"
        href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous"
    >


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>



    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/view.css') }}" rel="stylesheet">
    <link href="emoji-button-master/css/emoji-button.css" rel="stylesheet">

    <!-- 絵文字機能 移動削除厳禁-->
    <link href="simplemde-with-emoji-picker-main/unicode-emoji-picker/css/emoji.css" rel="stylesheet">
    <link href="simplemde-with-emoji-picker-main/unicode-emoji-picker/css/emoji_add.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
    <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
    <!-- 絵文字機能 移動削除厳禁-->

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/homechat') }}">
                DevPla
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            @if (Auth::check())
                                <a class="nav-link" href="{{ route('homechat') }}">チャット</a>
                                <a class="nav-link" href="{{ route('posts.index') }}">投稿一覧</a>
                                @if (Auth::user()->role == 'admin')
                                <a class="nav-link" href="{{ route('image_list') }}">写真一覧</a>
                                @endif
                                <a class="nav-link" href="{{ route('users_list') }}">ユーザ一覧</a>
                                @if (Auth::user()->role == 'admin')
                                    <a class="nav-link" href="{{ route('admin') }}">管理者画面</a>
                                @endif
                            @endif
                            <!-- Authentication Links -->
                            @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('ログイン') }}</a>
                            </li>
                            @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('新規登録') }}</a>
                            </li>
                            @endif
                            @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('home') }}">
                                        {{ __('ホーム') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('mypage') }}">
                                        {{ __('マイページ') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                        {{ __('ログアウト') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @endguest
                        </ul>
                </div>
            </div>
        </nav>

        @if (Session::has('success'))
            <div class="alert alert-success" role="alert">
                <strong> {{ Session::get('success') }}</strogn>
            </div>
        @elseif (Session::has('error'))
            <div class="alert alert-danger" role="alert">
                <strong>{{ Session::get('error') }}</strong>
            </div>
        @endif

    </div>
    <div class ="d">
        @yield('content')
    </div>



    
<!-- 絵文字機能 移動削除厳禁-->
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="simplemde-with-emoji-picker-main/unicode-emoji-picker/js/emoji_add.js"></script>
<script src="simplemde-with-emoji-picker-main/unicode-emoji-picker/js/config.js"></script>
<script src="simplemde-with-emoji-picker-main/unicode-emoji-picker/js/emoji-picker.js"></script>
<!-- 絵文字機能 移動削除厳禁-->

@if(Auth::check())
<script>
    document.getElementById('logout').addEventListener('click', function(event) {
    event.preventDefault();
    document.getElementById('logout-form').submit();
    });
</script>
@endif
@yield('scripts')
@yield('js')
</body>
</html>