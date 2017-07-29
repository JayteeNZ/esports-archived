<?php

namespace App\Http\Controllers\Dashboard;

use App\Game;
use App\Ruleset;
use App\RulesetSection;

class RulesetsController
{
	/**
	 * Show all rulesets in the system.
	 * 
	 * @return Illuminate\Http\Response
	 */
	public function index()
	{
		$rulesets = Ruleset::get();
		return view('dashboard.rulesets.index', compact('rulesets'));
	}

	/**
	 * Create a new ruleset.
	 * 
	 * @return Illuminate\Http\Response
	 */
	public function create()
	{
		$games = Game::get();
		return view('dashboard.rulesets.create', compact('games'));
	}

	/**
	 * Store a new Ruleset in the system.
	 * 
	 * @return Illuminate\Http\Response
	 */
	public function store()
	{
		$data = request()->validate([
			'name' => 'required',
			'game_id' => 'required|numeric',
			'for' => 'nullable',
			'content' => 'required'
		]);

		$ruleset = Ruleset::create(request(['name', 'game_id', 'for']));
		$ruleset->sections()->create([
			'title' => $ruleset->name,
			'content' => request('content')
		]);

		return redirect('/dashboard/rulesets');
	}
}