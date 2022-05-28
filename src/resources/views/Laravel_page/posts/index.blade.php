@extends('layouts.app')
@section('content')

@auth
    <!-- 投稿詳細始まり-->
    @include('components.post_details')
    <!-- 投稿詳細終わり-->
@endauth

@foreach ($posts as $post)
<div id="p2">
    <div class="bg-gray-100 p-3 flex items-start justify-center w-screen ">
    <div class="bg-white border shadow-sm px-4 py-3 my-1 rounded-lg max-w-lg w-3/4">
        <div class="flex items-center">
        <img class="h-12 w-12 rounded-full" src="{{ optional($post->user()->first())->profile_image }}">
        <div class="ml-2">
            <div class="text-sm ">
            <span class="font-semibold">{{ optional($post->user()->first())->name }}</span>
            </div>
            <div class="text-gray-500 text-xs ">{{ optional($post->user()->first())->work_history }}</div>
        </div>
        </div>
        <p class="break-words whitespace-normal text-gray-800 text-sm mt-2 leading-normal md:leading-relaxed">{!! nl2br(Str::limit($post->body_html, 200)) !!}</p>
            @if($post -> image)
                <p>{{ $post->image->file_name }}</p>
                <img src="{{ $post->image -> file_path }}" style="width:100%;">
            @endif
        <a class="card-link" href="{{ route('posts.show', ['post_id' => $post]) }}">
                続きを読む
        </a>
        <div class="text-gray-500 text-xs items-center">
        <img class="mr-0.5" src="https://static-exp1.licdn.com/sc/h/d310t2g24pvdy4pt1jkedo4yb"/>
        <span>{{ $post -> users() -> count() }} ・{{ $post->comments->count() }} comments</span>
        </div>

        
        <div>
            <hr>
        </div>
        <div>
            <ul class="mb-0 flex justify-start feed-shared-social-actions feed-shared-social-action-bar social-detail-base-social-actions feed-shared-social-action-bar--has-social-counts">
                <!-- いいねボタンの実装始まり -->
                <li class=" flex px-2 reactions-react-button feed-shared-social-action-bar__action-button">
                    <button class="flex artdeco-button artdeco-button--muted artdeco-button--4 artdeco-button--tertiary ember-view react-button__trigger">
                            @if ($post->users()->where('user_id', Auth::id())->exists())
                            <span class="artdeco-button__text">
                                    <form action="{{ route('unlikes', $post) }}" method="POST">
                                    @csrf
                                    <div class="flex justify-center artdeco-button__text align-items-center">
                                        <li-icon aria-hidden="true" type="speech-bubble-icon" class="artdeco-button__icon">
                                            <img class="flex reactions-icon artdeco-button__icon reactions-react-button__icon reactions-icon__creation--small" src="https://static-exp1.licdn.com/sc/h/3yew62z57yb4vtsgl0ko7v5pw" alt="LIKE" data-test-reactions-icon-type="LIKE" data-test-reactions-icon-theme="light">
                                        </li-icon>
                                        <input type="submit" value="Like" class="bg-white artdeco-button__text react-button__text">
                                    </div>
                                    </form>
                            </span>
                            @else
                            <span class="flex artdeco-button__text">
                                    <form action="{{ route('likes', $post) }}" method="POST">
                                    @csrf
                                    <div class="flex justify-center artdeco-button__text align-items-center">
                                        <li-icon aria-hidden="true" type="speech-bubble-icon" class="artdeco-button__icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24" data-supported-dps="24x24" fill="currentColor" class="mercado-match" width="24" height="24" focusable="false">
                                            <path d="M19.46 11l-3.91-3.91a7 7 0 01-1.69-2.74l-.49-1.47A2.76 2.76 0 0010.76 1 2.75 2.75 0 008 3.74v1.12a9.19 9.19 0 00.46 2.85L8.89 9H4.12A2.12 2.12 0 002 11.12a2.16 2.16 0 00.92 1.76A2.11 2.11 0 002 14.62a2.14 2.14 0 001.28 2 2 2 0 00-.28 1 2.12 2.12 0 002 2.12v.14A2.12 2.12 0 007.12 22h7.49a8.08 8.08 0 003.58-.84l.31-.16H21V11zM19 19h-1l-.73.37a6.14 6.14 0 01-2.69.63H7.72a1 1 0 01-1-.72l-.25-.87-.85-.41A1 1 0 015 17l.17-1-.76-.74A1 1 0 014.27 14l.66-1.09-.73-1.1a.49.49 0 01.08-.7.48.48 0 01.34-.11h7.05l-1.31-3.92A7 7 0 0110 4.86V3.75a.77.77 0 01.75-.75.75.75 0 01.71.51L12 5a9 9 0 002.13 3.5l4.5 4.5H19z">
                                            </path>
                                            </svg>
                                        </li-icon>
                                        <input  type="submit" value="Like" class="bg-white artdeco-button__text react-button__text react-button__text--like">
                                    </div>
                                    </form>
                            </span>
                            @endif
                    </button>   
                </li>
                <!-- いいねボタンの実装終わり -->
                <!-- コメントボタンの実装始まり -->
                <li class="px-2 comment feed-shared-social-action-bar__action-button">
                    <div class="flex justify-center artdeco-button__text align-items-center">
                        <li-icon aria-hidden="true" type="speech-bubble-icon" class="artdeco-button__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24" data-supported-dps="24x24" fill="currentColor" class="mercado-match" width="24" height="24" focusable="false">
                            <path d="M7 9h10v1H7zm0 4h7v-1H7zm16-2a6.78 6.78 0 01-2.84 5.61L12 22v-4H8A7 7 0 018 4h8a7 7 0 017 7zm-2 0a5 5 0 00-5-5H8a5 5 0 000 10h6v2.28L19 15a4.79 4.79 0 002-4z">
                            </path>
                            </svg>
                        </li-icon>
                        <input type="button" value="Comment" class="elem3 bg-white artdeco-button artdeco-button--muted artdeco-button--4 artdeco-button--tertiary ember-view comment-button flex">
                    </div>
                </li>
                <!-- コメントボタンの実装終わり -->
            </ul>
        </div>

    <div class ="hidden-element elem4">

        <div >
            <!-- コメント入力バーの実装始まり-->
            <form class="mb-4" method="POST" action="{{route('comments.store',['post_id' => $post])}}">
                <div class="px-4 pt-4 mb-2 sm:mb-0">
                <div class="relative flex">
                    @csrf
                    <input name="post_id" type="hidden" value="{{ $post->id }}">
                    <input
                            id="body"
                            name="body"
                            class="{form-control{{ $errors->has('body') ? 'is-invalid' : '' }}} emoji w-full focus:outline-none focus:placeholder-gray-400 text-gray-600 placeholder-gray-600 pl-12 bg-gray-200 rounded-full py-3 "
                            value="{{ old('body') }}"
                            type="text"
                            placeholder="コメントを入力して下さい"
                    >
                    @if ($errors->has('body'))
                        <div class="invalid-feedback">
                        {{ $errors->first('body') }}
                        </div>
                    @endif
                    <div class="absolute right-0 items-center inset-y-0 hidden sm:flex">
                        {{-- <button type="button" class="inline-flex items-center justify-center rounded-full h-10 w-10 transition duration-500 ease-in-out text-gray-500 hover:bg-gray-300 focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6 text-gray-600">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"></path>
                            </svg>
                        </button> --}}
                        <button type="button" class="inline-flex items-center justify-center rounded-full h-10 w-10 transition duration-500 ease-in-out text-gray-500 hover:bg-gray-300 focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6 text-gray-600">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </button>
                        <button type="button" class="emoji-trigger inline-flex items-center justify-center rounded-full h-10 w-10 transition duration-500 ease-in-out text-gray-500 hover:bg-gray-300 focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6 text-gray-600">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </button>
                        <button type="submit" class="inline-flex items-center justify-center rounded-full h-12 w-12 transition duration-500 ease-in-out text-white bg-blue-500 hover:bg-blue-400 focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-6 w-6 transform rotate-90">
                            <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"></path>
                            </svg>
                        </button>
                    </div>
                </div>
                </div>
            </form>
            <!-- コメント入力バーの実装終わり-->
        </div>

        <div>
            <!-- コメント内容始まり-->
            @include('components.comment_contents',['post' => $post])
            <!-- コメント内容終わり-->
        </div>
    </div>
    </div>
</div>

</div>

@endforeach

@endsection



