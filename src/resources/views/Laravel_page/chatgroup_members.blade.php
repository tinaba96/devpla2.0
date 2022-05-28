@extends('layouts.app')

@section('content')

<body style="background:url(https://devpla.s3.ap-northeast-1.amazonaws.com/devpla/bg.jpeg); background-size:cover;">

<style>
    .top-100 {top: 100%}
    .bottom-100 {bottom: 100%}
    .max-h-select {
        max-height: 300px;
    }
</style>

<div class="container">
    <h1 class="font-medium text-white text-center ">チャット参加者一覧</h1>
</div>

@foreach($members as $member)
    @if($member->users()->exists())
    <a href="{{ url('/users/'. $member->users()->first()->id) }}" class="flex flex-col items-center text-black">
        <div class="w-full md:w-1/2 flex flex-col items-center h-10">
            <div class="w-full px-4">
                <div class="flex flex-col items-center relative">
                    <div class="absolute shadow bg-white top-100 z-40 w-full lef-0 rounded max-h-select overflow-y-auto svelte-5uyqqj">
                        <div class="flex flex-col w-full">
                            <div class="cursor-pointer w-full border-gray-100 rounded-t border-b hover:bg-teal-100">

                                <div class="flex w-full items-center p-2 pl-2 border-transparent border-l-2 relative hover:border-teal-100">
                                    <div class="w-6 flex flex-col items-center">
                                        <div class="flex relative w-5 h-5 bg-orange-500 justify-center items-center m-1 mr-2 w-4 h-4 mt-1 rounded-full ">

                                                <img src="{{ $member->users()->first()->profile_image }}" width="48" height="48" class="rounded-full" />

                                        </div>
                                    </div>
                                    <div class="w-full items-center flex">
                                        <div class="mx-2 -mt-1"> {{ $member->users()->first()->name }}
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </a>
    @endif
@endforeach
<div class="flex flex-col justify-center items-center h-20">
    @if ($members->where('user_id', Auth::user()->id)->isEmpty())
        <form action='/homechat/{{ $chatgroup->id }}/bemember' method='POST'>
        @csrf
        <button type='submit' class='btn btn-primary'> メンバーになる </button>
        </form>
    @endif
</div>

@endsection
