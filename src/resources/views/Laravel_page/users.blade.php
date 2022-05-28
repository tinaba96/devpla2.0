@extends('layouts.app')

@section('content')

<div class="container">
    @if ($typeOfMembers == 'chat')
    <h1 class="font-medium text-white text-center ">チャット参加者一覧</h1>
    @endif
    @if ($typeOfMembers == 'users')
    <h1 class="font-medium text-white text-center ">ユーザ一覧</h1>
    @endif
    @if ($typeOfMembers == 'following')
    <h1 class="font-medium text-white text-center ">Following一覧</h1>
    @endif
    @if ($typeOfMembers == 'followers')
    <h1 class="font-medium text-white text-center ">Followers一覧</h1>
    @endif
</div>

<body style="background:url(https://devpla.s3.ap-northeast-1.amazonaws.com/devpla/bg.jpeg); background-size:cover;">
@if ($users -> isEmpty())
    <h3 style="color: gray" align='center'>
        誰もいません
    </h3>
@endif

@foreach ($users as $user)
<a href="{{ url('/users/'. $user->id) }}" class="my-4 flex flex-col items-center text-black">
    <div class="w-full md:w-1/2 flex flex-col items-center h-10">
        <div class="w-full px-4">
            <div class="flex flex-col items-center relative">
                <div class="absolute shadow bg-white top-100 z-40 w-full h-14 items-center lef-0 rounded max-h-select overflow-y-auto svelte-5uyqqj">
                    <div class="flex flex-col w-full h-full">
                        <div class="cursor-pointer w-full h-full border-gray-100 rounded-t border-b hover:bg-teal-100">
                            <div class="flex w-full h-full items-center p-2 pl-2 border-transparent border-l-2 relative hover:border-teal-100">
                                <div class="w-6 flex flex-col items-center">
                                    <div class="flex relative w-5 h-5 bg-orange-500 justify-center items-center m-1 mr-2 w-4 h-4 mt-1 rounded-full">
                                        <img src="{{ $user->profile_image }}" width="48" height="48" class="rounded-full" />
                                    </div>
                                </div>
                                <div class="w-full items-center flex">
                                    <div class="mx-2 -mt-1"> {{ $user->name }}
                                    </div>
                                </div>
                                <div>
                                    @if (Auth::user()->id != $user->id)
                                        @if (Auth::user()->is_following($user->id) || Auth::user()->id == $user->id )
                                            <form action='/users/{{ $user->id }}/unfollow' method='POST'>
                                            @csrf
                                            @method('DELETE')
                                            <button type='submit' class='flex bg-blue-200 hover:bg-blue-500 text-white font-bold py-2 px-4 rounded'>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"  fill="currentColor">
                                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                                </svg><span>&nbsp;Following</span>
                                            </button>
                                            </form>
                                        @else
                                            <form action='/users/{{ $user->id }}/follow' method='POST'>
                                            @csrf
                                            <button type='submit' class='whitespace-nowrap bg-blue-400 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded'>Follow</button>
                                            </form>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</a>
@endforeach


@endsection



