<?php

namespace App\Http\Controllers\Tournaments;

use App\Http\Controllers\Controller;
use App\Models\{Platform, Tournament};

class TournamentsController extends Controller
{
	/**
	 * Retrieve and display all Tournaments.
	 */
	public function index()
	{
		// groupBy to enhance the starting days in the view???
		$tournaments = Tournament::whereScheduledOrCommenced()->orderBy('starts_at', 'asc')
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