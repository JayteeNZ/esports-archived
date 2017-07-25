<?php

namespace Parallel\Http\Controllers\Tournaments;

use Parallel\Tournament;
use Parallel\Http\Controllers\Controller;

class TournamentsController extends Controller
{
	/**
	 * Retrieve and display all Tournaments.
	 */
	public function index()
	{
		$tournaments = Tournament::retrieve();
		return view('tournaments.index', compact('tournaments'));
	}

	/**
	 * Display one tournament.
	 */
	public function show(Tournament $tournament)
	{
		return view('tournaments.show', compact('tournament'));
	}
}