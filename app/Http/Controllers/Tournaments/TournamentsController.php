<?php

namespace App\Http\Controllers\Tournaments;

use App\Platform;
use App\Tournament;
use App\Http\Controllers\Controller;

class TournamentsController extends Controller
{
	/**
	 * Retrieve and display all Tournaments.
	 */
	public function index()
	{
		$tournaments = Tournament::whereScheduledOrStarted()->orderBy('starts_at', 'asc')
			->limit(30)->get();

		$platforms = Platform::all();

		return view('tournaments.index', compact('platforms', 'tournaments'));
	}

	/**
	 * Display one tournament.
	 */
	public function show(Tournament $tournament)
	{
		return view('tournaments.show', compact('tournament'));
	}
}