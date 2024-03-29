<?php

namespace App\Http\Controllers\Dashboard;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Models\{Game, Platform, Ruleset, Tournament};

class TournamentsController extends Controller
{
	public function index()
	{
		$tournaments = Tournament::get();
		return view('dashboard.tournaments.index', compact('tournaments'));
	}

	public function create()
	{
		$platforms = Platform::get();
		$games = Game::get();
		$rulesets = Ruleset::get();
		return view('dashboard.tournaments.create', compact('platforms', 'games', 'rulesets'));
	}

	public function store()
	{
		request()->validate([
			'name' => 'required',
			'min_teams' => 'required|numeric',
			'max_teams' => 'required|numeric',
			'players' => 'required',
			'subs' => 'required',
			'platform_id' => 'required|numeric',
			'ruleset_id' => 'required|numeric',
			'game_id' => 'required|numeric',
			'format' => 'required',
			'teams_per_bracket' => 'required',
			'starts_at' => 'required',
			'visibility' => 'numeric|required'
		]);

		Tournament::create(
			array_merge(
				request()->all(), 
				['starts_at' => Carbon::parse(request('starts_at'))->toDateTimeString()]));

		return redirect('/dashboard/tournaments');
	}

	public function show(Tournament $tournament)
	{
		return view('dashboard.tournaments.show', compact('tournament'));
	}
}