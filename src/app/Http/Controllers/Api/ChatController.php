<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Chat;
use App\User;
use App\Images;
use App\Chatgroup;
use App\User_chatgroup;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    /**
     * Create a new controller instance
     * 
     * @return void
     */
    public function __construct(){
        $this->middleware('auth');
    }

    public function home(Chatgroup $chatgroup){
        $groups = Chatgroup::all();
        $members = User_chatgroup::all();

        return view('homechat', compact('groups','members'));
    }

    public function group_list(){
        return view('homechat');
    }

    public function store(Request $request){
       Chatgroup::create([
           'name' => $request->name
           ]);
       User_chatgroup::create([
        'user_id' => Auth::user()->id,
        'chatgroup_id' => 10*(Chatgroup::count())-5
        ]);

        $groups = Chatgroup::all();
        $members = User_chatgroup::all();
        // 二重送信対策
        $request->session()->regenerateToken();
       return redirect()->route('homechat', [
        'groups' => $groups,
        'members' => $members,
    ]);
    }

    public function create(){
        return view('create_chatgroup');
    }

    public function chat(Chatgroup $chatgroup, Chat $chats){
        $members = User_chatgroup::where('chatgroup_id', $chatgroup->id)->get();
        $chats = Chat::where('chatgroup_id', $chatgroup->id)->get();
        if($members->where('user_id', Auth::user()->id)->isEmpty() || Auth::user()->role == 'admin'){
            return back()->with('error', 'あなたはメンバーではありません。');
        }else{
            return view('chat', compact('chatgroup', 'chats', 'members'));
        }
    }

    public function members(Chatgroup $chatgroup){
        $members = $chatgroup->user_chatgroup()->get();
        $typeOfMembers = 'chat';
        return view('chatgroup_members', compact('chatgroup','members', 'typeOfMembers'));
    }

    public function bemember(Chatgroup $chatgroup){
       User_chatgroup::create([
           'user_id' => Auth::user()->id,
           'chatgroup_id' => $chatgroup->id
       ]);
        return back()->with('success', 'メンバーに追加されました。');
    }

    public function add(Request $request, Chatgroup $chatgroup){
        $user = Auth::user();
        $chat = $request->input('chat');
        Chat::create([
            'login_id' => $user->id,
            'name' => $user->name,
            'chat' => $chat,
            'chatgroup_id' => $chatgroup->id
        ]);
        return back();
    }

    public function getData()
    {
        $chats = Chat::orderBy('created_at', 'desc')->get();
        $json = ["chats" => $chats];
        return response()->json($json);
    }

}
