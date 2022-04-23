<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Response;

class LoginController extends Controller
{
    /**
     * ログイン
     */
    public function login(Request $request) {
        $result = false;
        $message = '';
        $user = [];
        $credentials = $request->only('email', 'password');
        if (\Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $result = true;
        } else {
            $message = 'EmailまたはPasswordが間違っています。';
        }
        return response()->json(['result' => $result, 'message' => $message]);
    }
    /**
     * ログアウト
     */
    public function logout(Request $request) {
        $result = true;
        $message = 'ログアウトしました。';
        \Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return response()->json(['result' => $result, 'message' => $message]);
    }
    /**
     * ユーザ情報
     */
    public function auth() {
        $result = false;
        $user = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $result = true;
        }
        return response()->json(['result' => $result, 'user' => $user]);
    }
}
