<?php

namespace App\Http\Controllers\Tournaments;

use App\Team;
use App\User;
use App\Tournament;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeamsController extends Controller
{
    public function index(Tournament $tournament)
    {
        return view('teams.index', compact('tournament'));
    }

    public function create(Tournament $tournament)
    {
    	return view('teams.create', compact('tournament'));
    }

    public function show(Tournament $tournament, Team $team)
    {
        return view('teams.show', compact('team', 'tournament'));
    }

    public function edit(Tournament $tournament, Team $team)
    {
    	return view('teams.edit', compact('team', 'tournament'));
    }
}
