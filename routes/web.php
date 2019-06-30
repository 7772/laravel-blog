<?php

Auth::routes(['register' => false]);

$domainPrefix = (config('app.env', '') == 'production') ? '' : (config('app.sub_domain_prefix', '').'-');

Route::domain($domainPrefix . '7772.blog.io')->group(function () {
    Route::get('/', 'Blog\HomeController@index')->name('home');
    Route::get('/posts/detail/{id}', 'Blog\PostController@show')->name('post.detail');
    Route::get('/posts/register', 'Blog\PostController@create');

//    Route::middleware('auth', function () {
//        Route::get('/posts/create', 'Blog\PostController@create')->name('post.create');
//    });

});

