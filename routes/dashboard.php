<?php

Route::get('/', 'HomeController@index')
	->name('dashboard');

Route::get('tournaments', 'TournamentsController@index');
Route::get('tournaments/1', 'TournamentsController@show');
Route::get('tournaments/create', 'TournamentsController@create');

Route::get('platforms', 'PlatformsController@index');
Route::post('platforms', 'PlatformsController@store');

Route::get('games', 'GamesController@index');
Route::get('games/create', 'GamesController@create');
Route::post('games', 'GamesController@store');