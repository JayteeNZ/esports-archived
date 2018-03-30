<?php

namespace App\Http\Controllers\Tournaments;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Models\{Team, User, Tournament};

class TeamsController extends Controller
{
    public function index(Tournament $tournament)
    {
        return view('teams.index', compact('tournament'));
    }

    public function create(Tournament $tournament)
    {
        if ($tournament->hasCommenced() || $tournament->registrationsClosed()) {
            alert()->info('You cannot leave your team as it is locked', 'Team Locked')->persistent('Okay');
            return redirect()->back();
        }
        
    	return view('teams.create', compact('tournament'));
    }

    public function store(Tournament $tournament, Team $team)
    {
        request()->validate([
            'user' => 'required', 
        ]);

        if (request('user') == auth()->user()->username) {
            alert()->error('You cannot add yourself to the team', 'Error')->persistent('Okay');
            return redirect()->back();
        }
        if (!$user = User::where('username', request('user'))->first()) {
            alert()->error('Could not find a player called' . request('user'), 'Player not found!')->persistent('Okay');
            return redirect()->back();
        }

        $team->add($user, ['status' => 2, 'position' => 0]);

        return redirect()->back();
    }

    public function show(Tournament $tournament, Team $team)
    {
        $users = User::all();
        return view('teams.show', compact('team', 'tournament', 'users'));
    }

    public function update(Tournament $tournament, Team $team)
    {
        if ($tournament->hasCommenced() || $tournament->registrationsClosed()) {
            alert()->info('You cannot leave your team as it is locked', 'Team Locked')->persistent('Okay');
            return redirect()->back();
        }

        request()->validate([
            'name' => [
                'required',
                Rule::unique('teams')->ignore($team->id, 'id'),
            ]
        ]);

        $team->update(['name' => request('name')]);

        alert()->success('You have updated your team name', 'Team Updated!')->persistent('Cheers');
        return redirect()->back();
    }

    public function destroy(Tournament $tournament, Team $team)
    {
        if ($tournament->hasCommenced() || $tournament->registrationsClosed()) {
            alert()->info('You cannot leave your team as it is locked', 'Team Locked')->persistent('Okay');
            return redirect()->back();
        }

        $team->delete();

        alert()->success('You have disbanded your team', 'Team Disbanded!');
        return redirect()->route('tournaments.show', $tournament);
    }
}
