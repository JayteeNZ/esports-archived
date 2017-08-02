<?php

namespace App\Integrations\Challonge;

class Participant
{
	public function __construct($teams)
	{
		return $this->teams = $teams;
	}
}