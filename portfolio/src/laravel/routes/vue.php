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

Route::group(['as' => 'front.'], function () {
    Route::view('/', 'front.index')->name('home');
    Route::view('/blog', 'front.index')->name('blogList');
    Route::view('/about', 'front.index')->name('about');
});

Route::group(['as' => 'api.', 'prefix' => 'api'], function () {
    // ブログ記事
    Route::resource('article', 'ArticleController')->only(['index', 'show']);
});