<?php

Route::get('/', 'HomeController@index')
	->name('dashboard');

Route::get('tournaments', 'TournamentsController@index');
Route::get('tournaments/create', 'TournamentsController@create');
Route::post('tournaments', 'TournamentsController@store');
Route::get('tournaments/{tournament}', 'TournamentsController@show');

Route::get('platforms', 'PlatformsController@index');
Route::post('platforms', 'PlatformsController@store');

Route::get('rulesets', 'RulesetsController@index');
Route::get('rulesets/create', 'RulesetsController@create');
Route::post('rulesets', 'RulesetsController@store');

Route::get('games', 'GamesController@index');
Route::get('games/create', 'GamesController@create');
Route::post('games', 'GamesController@store');