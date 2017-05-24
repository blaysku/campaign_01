<?php

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

// Server response to url image files
Route::get('/img/{path}', function (Illuminate\Http\Request $request, $path) {
    return app('glide')->getImageResponse($path, $request->all());
})->where('path', '.*');

Route::group(['namespace' => 'Frontend'], function () {
    Route::resource('user', 'UserController');
});

Route::get('a', function () {
    return view('layouts.frontend');
});
