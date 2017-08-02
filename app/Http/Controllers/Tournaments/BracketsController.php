<?php

namespace App\Http\Controllers\Tournaments;

use App\Tournament;
use App\Http\Controllers\Controller;

class BracketsController extends Controller
{
	public function index(Tournament $tournament)
	{
		$brackets = $tournament->brackets;
		return view('brackets.index', compact('tournament', 'brackets'));
	}
}