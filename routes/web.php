<?php

Auth::routes();

Route::domain('local-7772.blog.io')->group(function () {
    Route::get('/', 'Blog\HomeController@index')->name('home');
});

