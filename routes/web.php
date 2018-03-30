<?php

Route::redirect('/', 'tournaments');


// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('logout', 'Auth\LoginController@logout')->name('logout');

// Tournament Routes
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
	Route::post('{tournament}/teams/{team}/add', 'Tournaments\TeamsController@store')->name('teams.add-member');
	Route::get('{tournament}/teams/{team}', 'Tournaments\TeamsController@show')->name('teams.show');
	Route::put('{tournament}/teams/{team}', 'Tournaments\TeamsController@update')->name('teams.update');
	Route::delete('{tournament}/teams/{team}/leave', 'Tournaments\LeaveTeamController@leave')->name('teams.leave');
	Route::delete('{tournament}/teams/{team}/delete', 'Tournaments\TeamsController@destroy')->name('teams.destroy');
});

Route::get('match/{match}/comments', 'Matches\MatchCommentsController@index')->middleware('auth');
Route::post('match/{match}/comments', 'Matches\MatchCommentsController@store')->middleware('auth');

Route::middleware('auth')->group(function () {
	Route::delete('/teams/{team}/remove/{user}', 'Tournaments\TeamModerationController@destroy')->name('teams.remove-player');
	Route::post('/matches/{match}/report', 'Tournaments\ReportScoresController@store')->name('scores.store');
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

Route::get('challonge-tournament', function () {
	$client = new Client();
	$p = [];

	for($i = 0; $i <= 32; $i++) {
		$participants['participants'][] = [
			'name' => str_random(32)
		];
	}

	$response = $client->request('post', 'https://api.challonge.com/v1/tournaments/parallel-l6cpcx93/participants/bulk_add.json', [
		'query' => [
			'api_key' => config('services.challonge.key'),
		],
		'json' => $participants
	]);
	$response = json_decode($response->getBody());
	dd($response);
});

Route::get('matches', function () {
	$challonge = resolve('challonge');
	$bracket = \App\Bracket::find(1);
	dispatch(new \App\Jobs\ScanForNewMatches($bracket));
});