<?php

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['web']], function () {
    Route::auth();
    Route::get('/', 'TopController@index');
    Route::resource('top', 'TopController', ['only' => 'index']);
    Route::resource('users', 'UsersController', ['only' => ['show', 'edit', 'update']]);
    Route::resource('books', 'BooksController', ['only' => ['create', 'store', 'edit', 'update', 'show']]);
});
