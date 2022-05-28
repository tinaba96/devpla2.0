@extends('layouts.app')

@section('content')
<body style="background:url(https://devpla.s3.ap-northeast-1.amazonaws.com/devpla/bg.jpeg); background-size:cover;">

<div class="container">

  <section class="px-4 sm:px-6 lg:px-4 xl:px-6 pt-4 pb-4 sm:pb-6 lg:pb-4 xl:pb-6 space-y-4">
  <header class="flex items-center justify-between">
    <h2 class="text-lg leading-6 font-medium text-white">開発グループ一覧</h2>

    <form align='right' action='/homechat/create' method='GET'>
            @csrf
      <button class="hover:bg-blue-200 hover:text-white group flex items-center rounded-md bg-blue-500 text-white text-sm font-medium px-4 py-2">    
        <svg class="group-hover:text-blue-600 text-white text-blue-500 mr-2" width="12" height="20" fill="currentColor">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M6 5a1 1 0 011 1v3h3a1 1 0 110 2H7v3a1 1 0 11-2 0v-3H2a1 1 0 110-2h3V6a1 1 0 011-1z"/>
        </svg>
          新規グループ作成
      </button>
    </form>
  </header>
  <form class="relative">
    <svg width="20" height="20" fill="currentColor" class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">
      <path fill-rule="evenodd" clip-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" />
    </svg>
    <input class="focus:border-blue-500 focus:ring-1 focus:ring-blue-500 focus:outline-none w-full text-sm text-black placeholder-gray-500 border border-gray-200 rounded-md py-2 pl-10" type="text" aria-label="Filter projects" placeholder="グループを検索" />
  </form>

  <form action='/homechat/create' method='GET'>
            @csrf
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-1 xl:grid-cols-2 gap-4">
      <div class="hover:shadow-lg flex rounded-lg">
          <button class="hover:border-transparent hover:shadow-xs bg-white w-full flex items-center justify-center rounded-lg border-2 border-dashed border-gray-200 text-sm font-medium py-4">
          新しいグループを作る
          </button>
      </div>
  </form>

      @foreach($groups as $group)

        <div  class="z-0 hover:bg-blue-500 hover:border-transparent hover:shadow-lg group block rounded-lg p-4 border border-gray-200 bg-white ">
          <dl class="grid sm:block lg:grid xl:block grid-cols-2 grid-rows-2 items-center">
            <div> <dt class="sr-only">Title</dt> <dd class="group-hover:text-blue leading-6 font-medium text-black">
                {{ $group->name }}
              </dd>
            </div>
            <div>
              <dt class="sr-only">Category</dt>
              <dd class="group-hover:text-blue-200 text-sm font-medium sm:mb-4 lg:mb-0 xl:mb-4">
                {{ $group->category }}
              </dd>
            </div>
            <div class="col-start-2 row-start-1 row-end-3">
              <dt class="sr-only">Users</dt>
              {{-- <dd class="flex justify-end sm:justify-start lg:justify-end xl:justify-start -space-x-2"> --}}

              <dd class="flex flex-row-reverse justify-end mt-10">
                @if($members->where('chatgroup_id', $group->id)->count() > 5)
                  <div class="flex relative w-10 h-10 bg-gray-500 justify-center items-center m-1 mr-2 -ml-3 rounded-full border-r-2 border-white text-xl text-white">
                    <div>
                      +{{  $members->where('chatgroup_id', $group->id)->count() -5 }}  
                    </div>
                  </div>
                @endif

                @foreach($members->where('chatgroup_id', $group->id) as $member)
                  @if($member->users()->exists())
                  <a href="{{ url('/users/'. $member->users()->first()->id) }}" class="z-10">
                    <img src="{{ $member->users()->first()->profile_image }}" width="48" height="48" class="group_member_count flex relative w-10 h-10 rounded-full border-2 border-white" >
                  </a>
                  @else
                    @continue
                  @endif
                  @if($loop->index == 4)
                    @break
                  @endif
                @endforeach
                <p class="group_member_count_view"></p>
              </dd>
            </div>
            <div class = text-right >
              <a href="{{ url('/homechat/' . $group->id .  '/members/') }}" type='button' class="hover:bg-blue-200 hover:text-blue-800 group rounded-md bg-blue-100 text-blue-600 text-sm font-medium px-4 py-2">参加メンバー</a>
              <a href="{{ url('/homechat/' . $group->id) }}" type='button' class="hover:bg-green-200 hover:text-green-800 group rounded-md bg-green-100 text-green-600 text-sm font-medium px-4 py-2">チャットに参加</a>
            </div>
          </dl>
        </div>
        @endforeach


    </section>
</div>

@endsection