<?php

$domainPrefix = (config('app.env', '') == 'production') ? '' : (config('app.sub_domain_prefix', '').'-');

Route::domain($domainPrefix . '7772.blog.io')->namespace('Blog')->group(function () {

    Route::namespace('Ajax')->prefix('ajax')->group(function () {
        /** Post */
        Route::get('/posts', 'PostController@getList');

        /** Auth */
        Route::post('/login', 'AuthController@login');
    });

    Route::get('/{any}', 'HomeController@index')->where('any', '.*');
});