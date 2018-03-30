<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Game;
use App\Models\Platform;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGameRequest;

class GamesController extends Controller
{
	/**
	 * Show a collection of games.
	 * 
	 * @return Illuminate\Http\Response
	 */
	public function index()
	{
		return view('dashboard.games.index', [
			'games' => Game::get()
		]);
	}

	/**
	 * Show the form for storing a new Game.
	 * 
	 * @return Illuminate\Http\Response
	 */
	public function create()
	{
		return view('dashboard.games.create', ['platforms' => Platform::get()]);
	}

	/**
	 * Persist a new Game.
	 * 
	 */
	public function store(StoreGameRequest $request)
	{
		Game::create(array_merge($request->all(), ['identifier' => uniqid(true)]));

		return redirect('/dashboard/games')->with('success', 'Game Created');
	}
}