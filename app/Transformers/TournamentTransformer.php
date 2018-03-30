<?php

namespace App\Transformers;

use App\Models\Tournament;

class TournamentTransformer
{
	public function transform(Tournament $tournament)
	{
		return [
			'tournament[name]' 						=> 	$tournament->name,
			'tournament[url]' 						=> 	md5(uniqid(true)),
			'tournament[subdomain]' 				=> 	config('services.challonge.subdomain'),
			'tournament[tournament_type]' 			=> 	$tournament->format,
            'tournament[open_signup]' 				=> 	false,
            'tournament[hold_third_place_match]' 	=> 	$tournament->allows_third_place_match
		];
	}
}