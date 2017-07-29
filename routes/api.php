<?php

use App\Tournament;
use Illuminate\Http\Request;

Route::post('/teams/validate', function (Request $request) {
	
	$tournament = Tournament::findOrFail(request('tournament')['id']);

	if (!$tournament->hasTeamByName(request('name'))) {
		return response('', 200);
	}

	return response(['errors' => ['This Team name already exists']], 422);
});