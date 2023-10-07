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
    return view('welcome');
});

Route::get('/name', function () {
    return 'Sandro';
});

Route::get('/surname', function () {
    return 'Suknidze';
});

Route::get('/age', function () {
    return '21';
});

Route::get('/hobby', function () {
    return 'Basketball';
});

Route::get('/skinColor', function () {
    return 'white';
});

Route::get('/test', function () {
    return 'test success';
});

Route::post('/post', function () {
    return response()->json(['message' => 'წარმატებით განახლდა']);
});

Route::put('/put', function () {
    return response()->json(['message' => 'წარმატებით დაემატა']);
});

Route::delete('/delete', function () {
    return response()->json(['message' => 'წარმატებით წაიშალა']);
});
