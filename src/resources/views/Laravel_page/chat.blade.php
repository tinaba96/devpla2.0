@extends('layouts.app')

@section('content')


<div class="font-sans antialiased h-screen flex">
    <!-- Sidebar / channel list -->

    <div class="bg-white text-black flex-none w-64 pb-6 hidden md:block">
        <div class="text-black mb-2 mt-3 px-4 flex justify-between">
            <div class="flex-auto">
                <h1 class="font-semibold text-xl leading-tight mb-1 truncate">{{ $chatgroup->name }}  </h1>
                <div class="flex items-center mb-6">
                    <span class="bg-green rounded-full block w-2 h-2 mr-2"></span>
                    <span class="text-black opacity-50 text-sm">{{ Auth::user()->name }}</span>
                </div>
            </div>
            <div>
                <svg class="h-6 w-6 fill-current text-black opacity-25" viewBox="0 0 20 20">
                    <path d="M14 8a4 4 0 1 0-8 0v7h8V8zM8.027 2.332A6.003 6.003 0 0 0 4 8v6l-3 2v1h18v-1l-3-2V8a6.003 6.003 0 0 0-4.027-5.668 2 2 0 1 0-3.945 0zM12 18a2 2 0 1 1-4 0h4z" fill-rule="evenodd" />
                </svg>
            </div>
        </div>
        <div class="mb-8">
            <div class="px-4 mb-2 text-black flex justify-between items-center">
                <div class="opacity-75">Channels</div>
                <div>
                    <svg class="fill-current h-4 w-4 opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M11 9h4v2h-4v4H9v-4H5V9h4V5h2v4zm-1 11a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16z" />
                    </svg>
                </div>
            </div>
            <div class="bg-white py-1 px-4 text-black"></div>
        </div>
        <div class="mb-8">
            <div class="px-4 mb-2 text-black flex justify-between items-center">
                <div class="opacity-75">Direct Messages</div>
                <div>
                    <svg class="fill-current h-4 w-4 opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M11 9h4v2h-4v4H9v-4H5V9h4V5h2v4zm-1 11a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16z" />
                    </svg>
                </div>
            </div>

            <div class="flex items-center mb-3 px-4">
                <span class="bg-green rounded-full block w-2 h-2 mr-2"></span>
                @foreach ($members as $member)
                    @if($member->users()->exists())
                        <span class="opacity-75">{{ $member->users()->first()->name }}
                    @endif
                @endforeach
                 <span class="text-grey text-sm">(you)</span></span>
            </div>

        </div>
    </div>
    <!-- Chat content -->
    <div class="flex-1 flex flex-col bg-white overflow-hidden">
        <!-- Top bar -->
        <div class="border-b flex px-6 py-2 items-center flex-none">
            <div class="flex flex-col">
                <h3 class="text-grey-darkest mb-1 font-extrabold">#general</h3>
            </div>
        </div>
        <!-- Chat messages -->
        <div class="px-6 py-4 flex-1 overflow-y-scroll">
            <!-- A message -->
            @foreach ($chats as $chat)
                @include('components.chat',['item' => $chat])
            @endforeach
        </div>
        <div class="pb-6 px-4 flex-none">
                <form method="POST" action='/homechat/{{ $chatgroup->id }}'>
                @csrf
                    <div class="flex rounded-lg  overflow-hidden">
                        <textarea class="form-control" id="chat" name="chat" placeholder="メッセージを入力 (Shift+Enter)" aria-label="With textarea" onkeydown="if(event.shiftKey&&event.keyCode==13){document.getElementById('submit').click();return false};"></textarea>
                        <button type="submit" id="submit" class="btn btn-outline-primary comment-btn">送信</button>
                    </div>
                </form>
            </div>
    </div>
</div>


@endsection

@section('js')
<script src="{{ asset('js/chat.js') }}"></script>
@endsection




