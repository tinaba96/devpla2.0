@extends('layouts.app')

@section('content')

<div class="w-full md:w-9/12 mx-2 h-64 container mx-auto">
                <!-- Profile tab -->
                <!-- About Section -->
                <div class="bg-white p-3 shadow-sm rounded-sm">
                <form method='POST' action='/mypage/edit'>
                    <div class="flex items-center space-x-2 text-gray-900 leading-8">
                        <span clas="text-green-500">
                            <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </span>
                        <span class="tracking-wide font-extrabold">プロフィール</span>
                        @csrf
                        @method('PATCH')
                        <button class='bg-gray-400 hover:bg-gray-700 text-white font-bold py-1 px-3 rounded ml-auto' type='submit'> 編集完了 </bitton>
                    </div>
                    <div>
                        <div class="grid md:grid-cols-1 text-sm">
                            <div class="grid grid-cols-1">
                                <div class="px-4 py-2 font-semibold">スキル</div>
                                <div class="px-4 py-2" >
                                    <input name='my_skills' type='text' class='form-control form-control-sm' value='{{ Auth::user()->my_skills }}'>
                                </div>
                            </div>
  
                            <div class="grid grid-cols-1">
                                <div class="px-4 py-2 font-semibold">興味のある分野</div>
                                <div class="px-4 py-2">
                                <input name='topics_interest' type='text' class='form-control form-control-sm', value='{{ Auth::user()->topics_interest }}'>
    
                            </div>
                            </div>
                            <div class="grid grid-cols-1">
                                <div class="px-4 py-2 font-bold">学歴</div>
                                <div class="px-4 py-2">
                                    <input name='edu_background' type='text' class='form-control form-control-sm', value='{{ Auth::user()->edu_background }}'>
                            </div>
                            </div>

                            <div class="grid grid-cols-1">
                                <div class="px-4 py-2 font-semibold">職歴</div>
                                <div class="px-4 py-2">
                                    <input name='work_history' type='text' class='form-control form-control-sm', value='{{ Auth::user()->work_history }}'>
                                </div>
                            </div>
                            <div class="grid grid-cols-1">
                                <div class="px-4 py-2 font-semibold">業績と資格</div>
                                <div class="px-4 py-2">
                                <input name='achieve_quali' type='text' class='form-control form-control-sm', value='{{ Auth::user()->achieve_quali }} '>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
                </div>
</div>
@endsection




