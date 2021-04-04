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

Route::group(['prefix' => config('const.admin_url'), 'as' => 'admin.', 'namespace' => 'Admin'], function () {
    Route::get('/', 'Auth\LoginController@showAdminLoginForm')->name('login_form');
    Route::post('/login', 'Auth\LoginController@login')->name('login');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');

    Route::group(['middleware' => 'auth:admin_users'], function () {
        Route::view('/home', 'admin.home')->name('home');

        // ブログ記事
        Route::resource('article', 'ArticleController')->except(['show']);
        Route::resource('comment', 'CommentController')->only(['index']);
        Route::post('comment/bulk_update_permission', 'CommentController@bulkUpdatePermission')->name('comment.bulk_update_permission');
        Route::delete('comment/bulk_delete', 'CommentController@bulkDelete')->name('comment.bulk_delete');
    });
});



