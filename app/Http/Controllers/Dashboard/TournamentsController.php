<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

class TournamentsController extends Controller
{
	public function index()
	{
		return view('dashboard.tournaments.index');
	}

	public function create()
	{
		return view('dashboard.tournaments.create');
	}

	public function show()
	{
		return view('dashboard.tournaments.show');
	}
}