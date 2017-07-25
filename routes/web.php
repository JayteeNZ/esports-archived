<?php

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('tournaments', 'Tournaments\TournamentsController@index');
Route::get('tournaments/{tournament}', 'Tournaments\TournamentsController@show');

Route::get('@{user}', 'AccountController@show');