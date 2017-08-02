<?php

namespace App\Http\Controllers\Tournaments;

use DB;
use App\User;
use App\Team;
use App\Tournament;
use App\Http\Controllers\Controller;

class RegistrationController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:member'])->only('create');
    }

	public function create(Tournament $tournament)
	{
        $this->authorize('create', $tournament);

        $users = User::all();
        return view('teams.create', compact('tournament', 'users'));
	}

	public function store(Tournament $tournament)
    {
        $this->authorize('create', $tournament);

        request()->validate(['name' => 'required', 'users.*' => 'required'], [
            'users.*' => "You must provide a username"
        ]);

        $users = [];
        
        foreach(request('users') as $username) {
            $users[] = User::where('username', $username)->first();
        }

        DB::transaction(function () use ($tournament, $users) {
            $team = Team::create([
                'name' => request('name'),
                'tournament_id' => $tournament->id
            ]);

            $team->setOwner(auth()->user()->id);

            // $team->users()->attach($userIds, ['status' => 0, 'position' => 0]);
            $team->addMembers($users);
        });

        return redirect()->route('tournaments.show', $tournament);
    }
}