<?php
use App\Http\Controllers\TelegramController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::prefix('telegram/webhooks')->group(function () {
    Route::post('inbound', function (Request $request) {
        \Log::info($request->all());
    });

    Route::post('inbound',[TelegramController::class, 'inbound'])->name('telegram.inbound');
});