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
    Route::view('/about', 'front.index')->name('about');
    Route::group(['prefix' => 'blog', 'as' => 'blog.'], function () {
        Route::view('/', 'front.index')->name('list');
        Route::view('/{id}', 'front.index')->name('detail');
    });
});

