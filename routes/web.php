<?php

Route::get('/', 'PagesController@root')->name('pages.root');
Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('home', 'PagesController@home')->name('pages.home');
});
