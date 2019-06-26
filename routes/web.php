<?php

Route::get('/', 'Blog\HomeController@index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
