<?php

namespace App\Http\Controllers\Tournaments;

use App\Models\Team;
use App\Models\User;
use App\Http\Controllers\Controller;

class TeamModerationController extends Controller
{
	public function destroy(Team $team, User $user)
	{
		if (!$team->findMember($user)) {
			alert()->error('Could not remove the user', 'Error');
			return redirect()->back();
		}

		$team->remove($user);
		alert()->success('User removed from team', 'Done!');
		return redirect()->back();
	}
}