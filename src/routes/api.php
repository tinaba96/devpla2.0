<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\SignupController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/user/login', [LoginController::class, 'login']);

Route::post('/user/logout', [LoginController::class, 'logout']);

Route::middleware('auth:sanctum')->group(function(){
    Route::get('/user/auth', [LoginController::class, 'auth']);
});

Route::get('/signup', [SignupController::class, 'getSignup'])->name('reg');

Route::post('/signup', [SignupController::class, 'postSignup'])->name('index');
