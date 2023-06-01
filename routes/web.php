<?php

use App\Http\Controllers\ChatUserController;
use App\Http\Controllers\RoomUserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth' ]], function(){


    Route::get('/dashboard', function (){ return view('layouts.master'); })->name('dashboard');

    Route::get('/room', [RoomUserController::class, 'index'])->name('room.index');

    Route::get('/check/room/{user_id}', [RoomUserController::class, 'check_room'])->name('check_room');

    Route::post('/getChats', [ChatUserController::class, 'getChats'])->name('getChats');

    Route::post('/send/message', [ChatUserController::class, 'send_message'])->name('send_message');

    });

