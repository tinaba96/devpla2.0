@extends('layouts.app')

@section('content')

<div class="bg-gray-100">
    <div class="container mx-auto p-5">
        <div class="md:flex no-wrap md:-mx-2 ">
            <!-- Left Side -->
            <div class="w-full md:w-3/12 md:mx-2">
                <!-- Profile Card -->
                <div class="bg-white p-3 border-t-4 border-green-400">
                    <div class="image overflow-hidden">
                        <img class="h-auto w-full mx-auto" src="{{ $user -> profile_image }}" alt="profile_image">
                    </div>
                    <h1 class="text-gray-900 font-bold text-xl leading-8 my-1">{{ $user->name }}</h1>

                    <div class="row justify-content-center text-sm">

                    <div class="grid grid-cols-2">
                        <div class="px-4 py-1 text-center">
                            <a href = {{ url('/users/' . $user->id . '/followers') }}>
                            {{ $user->followers()->count() }}</a>
                        </div>  
                        <div class="px-4 py-1 text-center">
                            <a href = {{ url('/users/' . $user->id . '/following') }}>
                            {{ $user->following()->count() }}</a>
                        </div>
                        <div class="px-1 py-1 font-semibold">フォロワー数 </div>
                        <div class="px-1 py-1 font-semibold">フォロー数</div>
                    </div>
                </div>
                    <ul
                        class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
                        <li class="flex items-center py-3">
                            <span>利用開始日</span>
                            <span class="ml-auto">{{ $user->created_at->format('Y/m/d') }}</span>
                        </li>
                    </ul>
                    <div class="text-sm" >
                        @if (Auth::user()->id == $user->id)
                        <a href =  {{ url('/mypage/image/edit/') }}> 写真の編集 </a>
                        @endif
                    </div>
                </div>
            </div>
            <!-- Right Side -->
            <div class="w-full md:w-9/12 mx-2 h-64">
                <!-- Profile tab -->
                <!-- About Section -->
                <div class="bg-white p-3 shadow-sm rounded-sm">
                    <div class="flex items-center space-x-2 text-gray-900 leading-8">
                        <span clas="text-green-500">
                            <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </span>
                        <span class="tracking-wide font-extrabold">プロフィール</span>
                        <div class="text-sm"> 
                            @if (Auth::user()->id == $user->id)
                            <a href =  {{ url('/mypage/edit/') }}> 編集 </a>
                            @endif
                        </div>
                    </div>
                        
                    <div>
                        <div class="grid md:grid-cols-1 text-sm">
                            <div class="grid grid-cols-3">
                                <div class="px-4 py-2 font-semibold">スキル</div>
                                <div class="px-4 py-2">{{ $user->my_skills }}</div>
                                <div class="px-4 py-2"></div>
                            </div>
  
                            <div class="grid grid-cols-3">
                                <div class="px-4 py-2 font-semibold">興味のある分野</div>
                                <div class="px-4 py-2">{{ $user->topics_interest }}</div>
                                <div class="px-4 py-2"></div>
                            </div>
                            <div class="grid grid-cols-3">
                                <div class="px-4 py-2 font-bold">学歴</div>
                                <div class="px-4 py-2">{{ $user->edu_background }}</div>
                                <div class="px-4 py-2"></div>
                            </div>

                            <div class="grid grid-cols-3">
                                <div class="px-4 py-2 font-semibold">職歴</div>
                                <div class="px-4 py-2">{{ $user->work_history }}</div>
                                <div class="px-4 py-2"></div>
                            </div>
                            <div class="grid grid-cols-3">
                                <div class="px-4 py-2 font-semibold">業績と資格</div>
                                <div class="px-4 py-2">{{ $user->achieve_quali }}</div>
                                <div class="px-4 py-2"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class = "p-2 text-sm text-right">
                    @if (Auth::user()->id == $user->id)
                        <a href =  {{ url('user/delete') }}> 退会予定の方はこちら </a>
                    @endif
                </div>   
            </div>
        </div>
    </div>
</div>

@endsection
