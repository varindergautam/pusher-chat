<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'App\Http\Controllers\HomeController@index');
Route::get('/load-latest-messages', 'App\Http\Controllers\MessagesController@getLoadLatestMessages');
Route::post('/send', 'App\Http\Controllers\MessagesController@postSendMessage');
Route::get('/fetch-old-messages', 'App\Http\Controllers\MessagesController@getOldMessages');
Auth::routes();