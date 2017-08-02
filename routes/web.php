<?php

Route::get('/', 'Statics\HomeController@index')->name('home');

Auth::routes();
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::prefix('tournaments')->group(function () {
	Route::get('/', 'Tournaments\TournamentsController@index')->name('tournaments.index');
	Route::get('{tournament}', 'Tournaments\TournamentsController@show')->name('tournaments.show');
	Route::get('{tournament}/rules', 'Tournaments\RulesetController@show')->name('ruleset.show');	
	Route::get('{tournament}/matches', 'Tournaments\MatchesController@index')->name('matches.index');
	Route::get('{tournament}/matches/{match}', 'Tournaments\MatchesController@show')->name('matches.show');
	Route::get('{tournament}/brackets', 'Tournaments\BracketsController@index')->name('brackets.index');
	Route::get('{tournament}/teams', 'Tournaments\TeamsController@index')->name('teams.index');
	Route::get('{tournament}/teams/create', 'Tournaments\RegistrationController@create')->name('teams.create');
	Route::post('{tournament}/teams', 'Tournaments\RegistrationController@store')->name('teams.store');
	Route::get('{tournament}/teams/{team}', 'Tournaments\TeamsController@show')->name('teams.show');
	Route::get('{tournament}/teams/{team}/edit', 'Tournaments\TeamsController@edit')->name('teams.edit');
});

Route::prefix('account')->namespace('Account')->group(function () {
	Route::get('{user}', 'ProfileController@show')->name('profile');
	Route::put('{user}', 'ProfileController@update')->name('profile.update');
	Route::get('{user}/teams', 'ProfileController@showTeams')->name('profile.teams');
	Route::get('{user}/settings', 'SettingsController@edit')->name('account.settings')->middleware('auth');
	Route::put('{user}/settings', 'SettingsController@update')->name('account.settings.update')->middleware('auth');
	Route::put('{user}/settings/password', 'PasswordController@update')->name('account.password.update')->middleware('auth');
});

use GuzzleHttp\Client;

Route::get('challonge', function () {
	$c = new Client();
	$response = $c->request('get', 'https://api.challonge.com/v1/tournaments.json', [
            'query'         => ['api_key' => config('services.challonge.key'), 'subdomain' => 'parallel'],
            'http_errors'   => false,
            'verify'        => true,
    ]);
	$response = json_decode($response->getBody());

	foreach($response as $arr => $tournament) {
		$c->request('delete', "https://api.challonge.com/v1/tournaments/{$tournament->tournament->id}.json", [
			'query' => ['api_key' => config('services.challonge.key')]
		]);
	}
});

use App\Tournament;
use App\Events\Tournaments\RegistrationClosed;

Route::get('another', function () {
	$ch = resolve('challonge');
	$matches = $ch->getMatches(3709529);
	return $matches;
});
