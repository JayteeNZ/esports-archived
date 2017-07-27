<?php

namespace App\Http\Controllers\Tournaments;

use App\Tournament;
use App\Http\Controllers\Controller;

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