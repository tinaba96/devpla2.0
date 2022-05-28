<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Response;

class LpController extends Controller
{
    // public function destroy($id)
    // {
    //     $user = User::find($id);
    //     $user->delete();
    //     return redirect('/');
    // }

    // public function delete_confirm()
    // {
    //     return view('users.delete_confirm');
    // }

    public function lp(){
        return view('Laravel_page/landing-page');
    }
}
