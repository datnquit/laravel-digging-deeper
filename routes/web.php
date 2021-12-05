<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RelationshipController;
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


Route::get('test/helper', function () {
//    return aFunctionName();
    return \Helper::aFunctionName();
});

Route::get('http-client', [StudyController::class, 'httpClient']);

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/log-info', [App\Http\Controllers\HomeController::class, 'logInfo'])->name('log-info');
Route::get('/check-login', function () {
    if (\Illuminate\Support\Facades\Auth::guard('web')->check()) {
        echo "true";
    } else {
        echo "false";
    }
});

Route::get('comment', [HomeController::class, 'getComment']);

Route::get('home/{comment_id}', [HomeController::class, 'editComment'])
    ->name('comment.edit');

Route::prefix('relationship')->group(function() {
    Route::get('avatar', [RelationshipController::class, 'avatar']);
    Route::get('posts', [RelationshipController::class, 'posts']);
    Route::get('category', [RelationshipController::class, 'category']);
    Route::get('category-attach', [RelationshipController::class, 'categoryAttach']);
    Route::get('category-detach', [RelationshipController::class, 'categoryDetach']);
    Route::get('category-sync', [RelationshipController::class, 'categorySync']);
    Route::get('category-pivot', [RelationshipController::class, 'categoryPivot']);

    // P2
    Route::get('category-post', [RelationshipController::class, 'categoryPost']);

    // P3
    Route::get('poly-one-one', [RelationshipController::class, 'polyOneOne']);
    Route::get('poly-one-many', [RelationshipController::class, 'polyOneMany']);
    Route::get('poly-one-create', [RelationshipController::class, 'polyOneCreate']);

    Route::get('poly-many-create', [RelationshipController::class, 'polyManyCreate']);
    Route::get('poly-many-many', [RelationshipController::class, 'polyManyMany']);
});
