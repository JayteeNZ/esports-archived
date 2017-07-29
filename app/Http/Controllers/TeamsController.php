<?php

namespace App\Http\Controllers;

use App\Team;
use App\User;
use App\Tournament;
use App\PlayerTeam;
use Illuminate\Http\Request;

class TeamsController extends Controller
{
    public function create(Tournament $tournament)
    {
    	return view('teams.create', compact('tournament'));
    }

    public function store(Tournament $tournament)
    {
        $data = request()->validate(['name' => 'required']);

        $team = Team::create([
            'name' => request('name'),
            'tournament_id' => $tournament->id
        ]);

        return request()->all();

        return response(['message' => 'Team Created!', 'team' => $team]);
    }
}
