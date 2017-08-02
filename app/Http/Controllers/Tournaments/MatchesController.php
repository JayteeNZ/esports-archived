<?php

namespace App\Http\Controllers\Tournaments;

use App\Match;
use App\Tournament;
use App\Http\Controllers\Controller;

class MatchesController extends Controller
{
	public function index(Tournament $tournament)
	{
		return view('matches.index', compact('tournament'));
	}

	public function show(Tournament $tournament, Match $match)
	{
		return view('matches.show', compact('tournament', 'match'));
	}
}