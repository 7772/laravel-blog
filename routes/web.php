<?php

$domainPrefix = (config('app.env', '') == 'production') ? '' : (config('app.sub_domain_prefix', '').'-');

Route::domain($domainPrefix . '7772.blog.io')->namespace('Blog')->group(function () {

    Route::namespace('Ajax')->prefix('ajax')->group(function () {
        /** Post */
        Route::get('/posts', 'PostController@getList');
        Route::get('/posts/{id}', 'PostController@show');

        /** Auth */
        Route::post('/login', 'AuthController@login');

        Route::middleware('auth:api')->group(function () {
            /** Auth */
            Route::post('/logout', 'AuthController@logout');

            /** Session */
            Route::get('/me', 'SessionController@me');

            /** Post */
            Route::post('/posts/register', 'PostController@register');
        });
    });

    Route::get('/{any}', 'HomeController@index')->where('any', '.*');
});