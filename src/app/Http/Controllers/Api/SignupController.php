<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;

class SignupController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }
    
    /**
     * ユーザ登録画面の表示
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function getSignup()
    {
        return view('');
    }

    /**
     * ユーザ登録機能
     * @param array $data
     * @return unknown
     */
    public function postSignup(Request $request)
    {
         /** @var Illuminate\Validation\Validator $validator */
         $validator = Validator::make($request->form, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        User::create([
            'name' =>  $request->form['name'],
            'email' => $request->form['email'],
            'password' => Hash::make($request->form['password']),
        ]);
        
        return response()->json(['name' => $request->form['name'], 'email' => $request->form['email']]);
    }
}