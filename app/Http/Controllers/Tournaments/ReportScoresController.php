<?php

namespace App\Http\Controllers\Tournaments;

use App\Events\Match\ScoreReported;
use App\Http\Controllers\Controller;
use App\Models\{Match, Tournament, User};

class ReportScoresController extends Controller
{
	public function store(Match $match) // move the logic here to a FormRequest or Set Rules???
	{
		$user = request()->user();
		$team = $user->getTeam($match->tournament);
		// check if the team is within this match.
		if (!$match->hasTeam($team)) {
			alert()->error("This isn't your match", 'Not a chance')->persistent('Whoops');
			return redirect()->back();
		}
		// check if the authenticated user is the team leader
		if ( ! ($team->isLeader($user) || $team->isCaptain($user)) ) {
			alert()->error('You must be the Team Leader or Captain to report scores.', 'Whoops')->persistent('Okay');
			return redirect()->back();
		}

		request()->validate([
			'score' => 'required|numeric',
			'opposition_score' => 'required|numeric'
		]);
		
		$match->score()->create([
			'team_id' => $team->id,
			'user_id' => $user->id,
			'score' => request('score'),
			'opposition_score' => request('opposition_score')
		]);

		event(new ScoreReported($match, $team));
		
		alert()->success('', 'Scores reported')->persistent('Okay');
		return redirect()->back();
	}

}