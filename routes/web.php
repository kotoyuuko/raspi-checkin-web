<?php

Route::get('/', 'PagesController@root')->name('pages.root');
Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('home', 'PagesController@home')->name('pages.home');
});

Route::middleware(['auth', 'manager'])->group(function () {
    Route::resource('users', 'UsersController')->except(['show', 'create', 'store']);
});
