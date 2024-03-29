<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['as' => 'api.'], function () {
    // ブログ記事
    Route::resource('article', 'ArticleController')->only(['index', 'show']);
    Route::resource('comment', 'CommentController')->only(['store']);

    // いいね
    Route::group(['prefix' => 'like', 'as' => 'like.'], function () {
        // ポートフォリオ
        Route::get('/portfolio', 'LikeController@getPortofolioLikesInfo');
        Route::post('/portfolio', 'LikeController@likePortfolio');
        // ブログ
        Route::post('/article', 'LikeController@likeArticle');
    });
});
