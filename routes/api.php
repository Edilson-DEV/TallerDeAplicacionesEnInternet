<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//         return $request->user();
//});
Route::post('/auth/login',[LoginController::class, 'login']);
Route::get('/auth/me',[LoginController::class, 'me']);
Route::get('/auth/logout',[LoginController::class, 'logout']);
Route::post('/auth/register',[LoginController::class, 'register']);

Route::middleware('auth:api')->prefix('/user')->group(function(){

    Route::middleware('auth:api')->get('/all',[UserController::class, 'all']);

});

Route::get('/greeting', function () {
    return 'Hello World';
});
