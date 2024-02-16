<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TelegramController;
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
    return view('welcome');
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::prefix('telegram/webhooks')->group(function () {
    Route::post('inbound', function (Request $request) {
        \Log::info($request->all());
    });

    Route::post('inbound',[TelegramController::class, 'inbound'])->name('telegram.inbound');
});

//https://api.telegram.org/bot6691928017:AAHspEazonN6A_IO0O-4KzAgnt90TVsp89Q/setWebhook?url=https://5dfa-58-136-105-13.ngrok-free.app/api/telegram/webhooks/inbound