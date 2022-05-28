<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Storage;
use App\User;
use Storage;
use Image;
use InterventionImage;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function users(){
        $users = User::all();
        $typeOfMembers = 'users';
        return view('users', compact('users', 'typeOfMembers'));
    }

    public function user(User $user){
        return view('user', compact('user'));
    }

    public function show(){
        $user = Auth::user();
        return view('user', compact('user'));
    }

    public function edit(){
        $user = Auth::user();
        return view('edit_mypage', compact('user'));
    }

    public function update(Request $requests){
        Auth::user()->update([
            'my_skills' => $requests->my_skills,
            'topics_interest' => $requests->topics_interest,
            'edu_background' => $requests->edu_background,
            'work_history' => $requests->work_history,
            'achieve_quali' => $requests->achieve_quali,
        ]);
        $user = Auth::user();
        return view('user', compact('user'));
    }

    public function edit_image() {
        $user = Auth::user();
        return view('edit_mypage_image', compact('user'));
    }

    public function update_image($id, Request $request) {
        $user = Auth::user();
        $form = $request->all();
        if ($request->file('profile_image')){
            $request->validate([
                'profile_image' => 'required|file|image|mimes:png,jpeg',
            ]);
            $profileImage = $request->file('profile_image');
            if ($profileImage != null) {
                // バケットの`myprefix`フォルダへアップロード
                $path = Storage::disk('s3')->putFile('devpla', $profileImage, 'public');
                // アップロードした画像のフルパスを取得
                $user->profile_image = Storage::disk('s3')->url($path);
            }
        }
        $user->save();
        return view('user', compact('user'));
    }

    private function saveProfileImage($image, $id) {
        // get instance
        $img = \Image::make($image);
        // resize
        $img->fit(100, 100, function($constraint){
            $constraint->upsize(); 
        });
        // バケットの`myprefix`フォルダへアップロード
        $path = Storage::disk('s3')->putFile('devpla', $img, 'public');
        // アップロードした画像のフルパスを取得
        $img_path = Storage::disk('s3')->url($path);
        // return file name
        return $img_path;
    }

}
