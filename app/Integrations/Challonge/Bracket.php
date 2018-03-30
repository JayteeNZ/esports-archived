<?php

namespace App\Integrations\Challonge;

use App\Models\Tournament;
use App\Transformers\TournamentTransformer;

class Bracket extends Challonge
{
	/**
	 * Creates a new Bracket on Challonge.
	 * @return [type] [description]
	 */
	public function create(Tournament $tournament)
	{
		$transformer = new TournamentTransformer;
		return $this->challonge->createTournament($transformer->transform($tournament));
	}
}