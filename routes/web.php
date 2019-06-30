<?php

Auth::routes();

$domainPrefix = (config('app.env', '') == 'production') ? '' : (config('app.sub_domain_prefix', '').'-');

Route::domain($domainPrefix . '7772.blog.io')->group(function () {
    Route::get('/', 'Blog\HomeController@index')->name('home');
    Route::get('/posts/{id}', 'Blog\PostController@show')->name('post.detail');
});

