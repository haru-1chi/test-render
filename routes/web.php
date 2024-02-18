<?php
use App\Http\Controllers\WordController;
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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/test-render', [WordController::class, 'testRender']);
Route::get('/downloadDocx', [WordController::class, 'downloadDocx']);

Route::get('/doc-generate',function(){
    $headers = array(
        'Content-type'=>'text/html',
        'Content-Disposition'=>'attatchement;Filename=mydoc.docx'
    );
    return \Response::make(view('word-summary'), 200,$headers);
});