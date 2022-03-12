<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;
use App\Models\SkillMaster;

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
        $skills=SkillMaster::all();
        return response()->json([
            'skills' => $skills 
        ], Response::HTTP_OK);
    }

    /**
     * ユーザ登録機能
     * @param array $data
     * @return unknown
     */
    public function postSignup(Request $request)
    {
         /** @var Illuminate\Validation\Validator $validator */
        //  $validator = Validator::make($request->form, [
        //     'name' => 'required',
        //     'email' => 'required|email',
        //     'password' => 'required'
        // ]);

        // if ($validator->fails()) {
        //     return response()->json($validator->messages(), Response::HTTP_UNPROCESSABLE_ENTITY);
        // }
        switch($request->gender){
            case "男性":
                $gender = 'male';
                break;
            case "女性":
                $gender = 'female';
                break;
            default:
                $gender = null;
        }

        switch($request->yop){
            case "1年未満":
                $yop = '1';
                break;
            case "1~3年":
                $yop = '2';
                break;
            case "4~10年":
                $yop = '3';
                break;
            case "11年以上":
                $yop = '4';
                break;
            default:
                $yop = null;
        }

        User::create([
            'name' =>  $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'gender' => $gender,
            'yop' => $yop,
        ]);
        
        return response()->json(['name' => $request->name, 'email' => $request->email]);
    }
}