<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
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

Route::get('user', function() {
    return response()->json([
        'name' => 'Nguyen quang dat',
        'email' => 'datnquit@gmail.com',
    ]);
});

Route::post('user', function(Request $request) {
    Storage::putFileAs('myfiles', $request->file('image'), $request->file('image')->getClientOriginalName());

    return response()->json($request->all());
});

Route::post('header', function(Request $request) {
    \Illuminate\Support\Facades\Log::info("Header", [
        'req' => $request->header('authorization')
    ]);
    return response()->json([
        'success' => true
    ]) ;
});
