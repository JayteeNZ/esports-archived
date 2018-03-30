<?php

namespace App\Http\Controllers\Tournaments;

use DB;
use App\Models\{User, Team, Tournament};
use App\Http\Controllers\Controller;
use App\Rules\MustHaveAnAssociatedGameAccount;
use App\Rules\MustNotEqualTheAuthenticatedUser;

class RegistrationController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:member'])->only('create');
    }

	public function create(Tournament $tournament)
	{
        $this->authorize('create', $tournament);

        $users = User::whereNotIn('id', [auth()->user()->id])->get()
            ->makeHidden(['first_name', 'last_name', 'email', 'created_at', 'updated_at']);

        return view('teams.create', compact('tournament', 'users'));
	}

    /**
     * Create the team with the associated players
     */
	public function store(Tournament $tournament)
    {
        $this->authorize('create', $tournament);

        $field = "account_" . $tournament->platform->name;
        
        // redirect back if the user does not have the qualified gamertag on their account.
        if (empty(auth()->user()->profile->{$field})) {
            alert()->error('You dont have a Gamertag defined on your account', 'No Gamertag')->persistent('Okay');
            return redirect()->back();
        }

        // ensure all users are validated to be registered on to the team
        request()->validate([
            'name' => 'required', 
            'users.*' => [
                'exists:users,username',
                'distinct',
                new MustNotEqualTheAuthenticatedUser(auth()->user()),
                new MustHaveAnAssociatedGameAccount($tournament)
            ]
        ], [
            'users.*.exists' => 'Sorry, but that user does not exist',
            'users.*.required' => 'You must provide a username'
        ]);

        // if the tournament is a one-versus-one, immediately create the team
        // and assign the owner.
        if ($tournament->players == 1) {
            $team = Team::create([
                'name' => request('name'),
                'tournament_id' => $tournament->id
            ]);

            $team->setLeader(auth()->user()->id);

            return redirect()->route('tournaments.show', $tournament);
        }

        $users = User::whereIn('username', request('users'))->get();

        $team = Team::create([
            'name' => request('name'),
            'tournament_id' => $tournament->id
        ]);

        $team->setLeader(auth()->user()->id);

        $team->addMembers($users);

        return redirect()->route('tournaments.show', $tournament);
    }
}