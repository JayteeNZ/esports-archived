<?php

namespace App\Integrations\Challonge;

use App\Tournament;
use Reflex\Challonge\Challonge;

class Bracket
{
	/**
	 * Creates a new Bracket on Challonge.
	 * @return [type] [description]
	 */
	public function create(Challonge $challonge, Tournament $tournament)
	{
		$bracket = $challonge->createTournament([
			'tournament[name]' 			=> $tournament->name,
			'tournament[url]' 			=> md5(uniqid(true)),
			'tournament[subdomain]' 	=> config('services.challonge.subdomain'),
			'tournament[tournament_type]' => $tournament->format,
            'tournament[open_signup]' => false,
            'tournament[hold_third_place_match]' => $tournament->allows_third_place_match
		]);

		return $bracket;
	}

	public function update()
	{

	}

	public function destroy()
	{

	}
}