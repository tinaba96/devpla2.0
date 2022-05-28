<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chat;
use App\User;
use App\Chatgroup;
use App\User_chatgroup;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function home(){
        $users = User::orderBy('updated_at', 'desc')->get();
        return view('admin_page', compact('users'));
    }
}
