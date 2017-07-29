<?php

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('tournaments', 'Tournaments\TournamentsController@index');
Route::get('tournaments/{tournament}', 'Tournaments\TournamentsController@show');

Route::get('tournament/{tournament}/teams/create', 'TeamsController@create');
Route::post('tournament/{tournament}/teams', 'TeamsController@store')->name('team.store');

Route::post('teams/{team}/players', 'TeamMembersController@store');


Route::get('/profile/{user}', 'AccountController@show')->name('profile');