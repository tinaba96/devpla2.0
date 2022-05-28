<div class="bg-gray-100 p-3 flex items-start justify-center w-screen ">
  <div class="bg-white border shadow-sm px-4 py-3 my-1 rounded-lg max-w-lg w-3/4">
    <div class="flex items-center">
      <a href="{{ url('/users/'. Auth::user()->id) }}" class="">
        <img class="h-12 w-12 rounded-full" src="{{ Auth::user()->profile_image }}">
      </a>
      <button id="modalOpen" class="flex flex-col w-11/12 sm:w-5/6 lg:w-1/2 max-w-2xl bg-white hover:bg-blue-dark text-gray-400 font-bold border-4 mx-4 py-2 px-4 rounded"> 投稿する   </button>
      <div class="ml-2">
        @if ($errors->has('title'))
        <div class="invalid-feedback">{{ $errors->first('title') }}
        </div>@endif
      </div>
    </div>
  </div>
</div>

<form method="POST" action="{{ route('posts.create') }}" enctype="multipart/form-data">@csrf
<div id="easyModal" class="modal hidden-element">
  <div class="modal-content">
    <div class="modal-body">
      <div class="flex justify-center h-screen items-center bg-gray-200 antialiased">
        <div class="flex flex-col w-11/12 sm:w-5/6 lg:w-1/2 max-w-2xl rounded-lg border shadow-xl">
          <div class="flex justify-end p-1 mr-0 bg-white rounded-tl-lg rounded-tr-lg">
            <!-- モーダルを閉じる×ボタン始まり -->
            <span class="modalClose mr-0">
            <svg class="w-6 h-6 mr-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"
              xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
            </span>
            <!-- モーダルを閉じる×ボタン終わり -->
          </div>
          <div class="px-6 bg-white">
            <div class="flex items-center mb-3">
            <a href="{{ url('/users/'. Auth::user()->id) }}">
              <img class="h-12 w-12 rounded-full" src="{{ Auth::user()->profile_image }}">
            </a>
            <span>&emsp;{{ Auth::user()->name }}</span>
            </div>
            <div>
              <textarea id="editor" name="body" class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}" type="text" name="" cols="60" rows="10" placeholder="画像を添付する場合もテキストを入力してください。" class="border p-2 bg-white rounded h-28" >{{ old('body') }} </textarea>
            </div>
          </div>
          <div class="flex flex-row items-center justify-between px-5 pt-3 pb-4 bg-white rounded-bl-lg rounded-br-lg">
            <ul class="flex items-center">
              <!-- Photoボタンの実装始まり -->
              <li>
                <input type="file" name="image" id="photo_button_input" accept="image/png, image/jpeg" />
                <div aria-describedby="artdeco-hoverable-artdeco-gen-141" aria-label="Add a photo" id="photo_button"
                  class="flex artdeco-button artdeco-button--muted artdeco-button--4 artdeco-button--tertiary ember-view share-box-feed-entry-toolbar__item">
                  <li-icon aria-hidden="true" type="image-icon" class="artdeco-button__icon">

                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" data-supported-dps="24x24"
                      fill="currentColor" class="text-blue-400" width="24" height="24" focusable="false">
                      <path d="M19 4H5a3 3 0 00-3 3v10a3 3 0 003 3h14a3 3 0 003-3V7a3 3 0 00-3-3zm1 13a1 1 0 01-.29.71L16 14l-2 2-6-6-4 4V7a1 1 0 011-1h14a1 1 0 011 1zm-2-7a2 2 0 11-2-2 2 2 0 012 2z">
                      </path>
                    </svg>
                  </li-icon>
                  <span class="artdeco-button__text">Photo </span>
                </div>
              </li>
              <!-- Videoボタンの実装始まり -->
          <li class="ml-2 flex ">
            <div aria-describedby="artdeco-hoverable-artdeco-gen-142" aria-label="Add a photo" id="ember3268" class="flex artdeco-button artdeco-button--muted artdeco-button--4 artdeco-button--tertiary ember-view share-box-feed-entry-toolbar__item">
            <li-icon aria-hidden="true" type="photo-icon" class="artdeco-button__icon ">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" data-supported-dps="24x24" fill="currentColor" class="text-green-400" width="24" height="24" focusable="false">
                <path d="M19 4H5a3 3 0 00-3 3v10a3 3 0 003 3h14a3 3 0 003-3V7a3 3 0 00-3-3zm-9 12V8l6 4z"></path>
              </svg>
            </li-icon>
            </div>
            <span class="artdeco-button__text">Video </span>
          </li>
          <li></li>
          <!-- 絵文字機能のはじまり -->
          <!-- <li>
            <button type="button" class="emoji-trigger inline-flex items-center justify-center rounded-full h-10 w-10 transition duration-500 ease-in-out text-gray-500 hover:bg-gray-300 focus:outline-none">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6 text-gray-600">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
              </svg>
             </button>
           </li> -->
          <!-- 絵文字機能の終わり -->
            </ul>
            <button type="submit" class="px-4 py-2 text-white font-semibold bg-blue-500 rounded items-center">
              投稿する
            </button>
          </div>
        </div>
      </div>
      <div>
          <span>image</span>
      </div>

      <div class="container mt-4">
        <div class="border p-4 newd">
          
            <div class="flex items-center">
              <a href="{{ url('/users/'. Auth::user()->id) }}" class="">
                <img class="h-12 w-12 rounded-full" src="{{ Auth::user()->profile_image }}">
              </a>

              <button id="modalOpen" class="button">Click Me</button>
              <div class="ml-2">
                @if ($errors->has('title'))
                <div class="invalid-feedback">{{ $errors->first('title') }}
                </div>
                @endif
              </div>
              <div class="bg-gray-100 flex ml-6">
                <button type="submit" class="btn2 navbar-nav">Post </button>
              </div>
            </div>
        </div>
       
      </div>
    </div>
  </div>@if (count($errors) >0)
  <div class="alert alert-danger">
    <ul>@foreach ($errors->all() as $error)
      <li>{{ $error }}</li>@endforeach
    </ul>
  </div>@endif

</div>
</form>

 

