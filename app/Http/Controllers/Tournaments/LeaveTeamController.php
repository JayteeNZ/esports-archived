<?php

namespace App\Http\Controllers\Tournaments;

use App\Models\Team;
use App\Models\Tournament;
use App\Http\Controllers\Controller;

class LeaveTeamController extends Controller
{
	public function leave(Tournament $tournament, Team $team)
	{
		if ($tournament->hasCommenced() || $tournament->registrationsClosed()) {
			alert()->info('You cannot leave your team as it is locked', 'Team Locked')->persistent('Okay');
			return redirect()->back();
		}

		if (!request()->user()->hasTeam($tournament)) {
			return redirect()->home();
		}

		$team->remove(request()->user());
		alert()->success('You have left the team', 'Done');

		return redirect()->route('tournaments.show', $tournament);
	}
}