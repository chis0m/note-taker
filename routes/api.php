<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Note\UserNoteController;
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

Route::get('/', function () {
    return [
        'message' => 'Welcome to my  Note Taker',
    ];
});


Route::post('/login', [LoginController::class, 'login']);
Route::post('/register', [RegisterController::class, 'store']);
Route::apiResource('notes', UserNoteController::class)->middleware('auth:api');
Route::get('failed-auth', static function () {
})->name('failed');
