<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/');
    }

    public function delete_confirm()
    {
        return view('users.delete_confirm');
    }

    public function lp(){
        return view('landing-page');
    }
}
