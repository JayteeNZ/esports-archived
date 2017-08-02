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

Route::get('authorization/roles', 'Authorization\RolesController@index');
Route::get('authorization/roles/create', 'Authorization\RolesController@create');
Route::post('authorization/roles', 'Authorization\RolesController@store');
Route::get('authorization/roles/{role}', 'Authorization\RolesController@show');
Route::get('authorization/roles/{role}/edit', 'Authorization\RolesController@edit');
Route::put('authorization/roles/{role}', 'Authorization\RolesController@update');
Route::delete('authorization/roles/{role}', 'Authorization\RolesController@destroy');

Route::get('authorization/permissions', 'Authorization\PermissionsController@index');
Route::get('authorization/permissions/create', 'Authorization\PermissionsController@create');
Route::post('authorization/permissions', 'Authorization\PermissionsController@store');
Route::get('authorization/permissions/{permission}', 'Authorization\PermissionsController@show');
Route::get('authorization/permissions/{permission}/edit', 'Authorization\PermissionsController@edit');
Route::put('authorization/permissions/{permission}', 'Authorization\PermissionsController@update');
Route::delete('authorization/permissions/{permission}', 'Authorization\PermissionsController@destroy');