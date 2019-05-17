<?php

Route::get('users', 'ApiController@listUsers')->name('api.users');
Route::post('logs', 'ApiController@saveLogs')->name('api.logs');
Route::post('fingerprint', 'ApiController@saveFingerprint')->name('api.fingerprint');
