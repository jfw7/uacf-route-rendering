<?php

use Illuminate\Support\Facades\Route;

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
    return Socialite::driver('uacf')->redirect();
});

Route::get('callback', function () {
    $user = Socialite::driver('uacf')->user();
    return Http::withHeaders([
        'Authorization' => "Bearer {$user->token}",
    ])->get('https://api.ua.com/v7.1/workout', ['user' => $user->id, 'order_by' => '-start_datetime']);
});
