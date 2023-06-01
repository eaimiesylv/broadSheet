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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/', function () {
    return 'broadsheet';
   // return view('index');
});
/*
Route::get('/', function () {
    return 'broadsheet';
   // return view('index');
})->middleware('auth:sanctum');
*/
Route::get('/sms', [App\Http\Controllers\User\SmsController::class, 'index']);
Route::post('/sms', [App\Http\Controllers\User\SmsController::class, 'store']);
Route::post('/auth/register', [App\Http\Controllers\Api\AuthController::class, 'createUser']);
Route::post('/auth/login', [App\Http\Controllers\Api\AuthController::class, 'loginUser']);