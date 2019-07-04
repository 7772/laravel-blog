<?php

Auth::routes(['register' => false]);

$domainPrefix = (config('app.env', '') == 'production') ? '' : (config('app.sub_domain_prefix', '').'-');

Route::domain($domainPrefix . '7772.blog.io')->group(function () {
    Route::get('/', 'Blog\HomeController@index')->name('home');
    Route::get('/posts/detail/{id}', 'Blog\Ajax\PostController@show')->name('post.detail');

    Route::middleware('auth')->group(function () {
        Route::get('/posts/register', 'Blog\PostController@create')->name('post.register');
        Route::post('/posts/register', 'Blog\Ajax\PostController@register')->name('post.register');
    });

});

