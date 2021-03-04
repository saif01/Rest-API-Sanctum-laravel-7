<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::post('/login', [UserController::class,'index']);
Route::post('/login', 'UserController@index');
Route::get('user-token', 'UserController@userToken');

Route::middleware('auth:sanctum')->get('users', 'UserController@users');

Route::middleware('auth:sanctum')->get('check-ability', 'UserController@checkAbility');
//Route::get('check-ability', 'UserController@checkAbility');


