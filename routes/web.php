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
//    \Illuminate\Support\Facades\Artisan::call('datnq:add-new-user {number}');
//    event(new \App\Events\PodcastProcessed('dat', \App\Models\User::find(3)));
//    \App\Events\PodcastProcessed::dispatch('dat', \App\Models\User::find(3));
    return view('welcome');
});

Route::get('/fire-redis', function() {
    \App\Events\UserEvent::dispatch(\App\Models\User::find(3));
//    event(new \App\Events\UserEvent(\App\Models\User::find(3)));
    return view('welcome');
});

Route::get('redis', function () {
    return view('redis');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
