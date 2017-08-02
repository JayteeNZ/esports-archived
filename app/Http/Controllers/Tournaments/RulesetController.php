<?php

namespace App\Http\Controllers\Tournaments;

use App\Tournament;
use App\Http\Controllers\Controller;

class RulesetController extends Controller
{
	public function show(Tournament $tournament)
	{
		return view('ruleset.show', compact('tournament'));
	}
}