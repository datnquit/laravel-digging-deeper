<?php

use App\Http\Controllers\SendMailController;
use App\Http\Controllers\StudyController;
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

Route::get('send-mail', [SendMailController::class, 'sendMail']);

Route::get('config-mail', [SendMailController::class, 'configMail']);
Route::post('test-mail', [SendMailController::class, 'testMail']);

Route::get('store-queue', [StudyController::class, 'storeQueue']);

Route::get('welcome/{locale}', [StudyController::class, 'changeLang']);

Route::middleware('localization')->get('echo-lang', function () {
    echo __('messages.welcome', [
        'name' => 'Dat'
    ]);
    echo "<br>";
    echo __('messages.field.name');
    echo "<br>";
//    {{ __('messages.field.name') }}

    echo __('Welcome to my website');
    return view('lang');
});


use App\Http\Controllers\MultilangController;

Route::prefix('admin')->group(function() {
    Route::get('multi/create', [MultilangController::class, 'formMulti']);

    Route::post('store-multi', [MultilangController::class, 'storeMulti'])
        ->name('admin.multi.store');

    Route::get('multi/{id}', [MultilangController::class, 'editMulti']);

    Route::put('multi/{id}', [MultilangController::class, 'updateMulti'])
        ->name('admin.multi.update');
});
// Không cần use LaravelLocalization
Route::prefix(LaravelLocalization::setLocale())->group(function() {
    Route::get('multi/{id}', [MultilangController::class, 'detail']);
});

