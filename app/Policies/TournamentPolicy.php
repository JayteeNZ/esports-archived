<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Tournament;
use Illuminate\Auth\Access\HandlesAuthorization;

class TournamentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the team.
     *
     * @param  \App\User  $user
     * @param  \App\team  $team
     * @return mixed
     */
    public function view(User $user, Team $team)
    {
        //
    }

    /**
     * Determine whether the user can create teams.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user, Tournament $tournament)
    {
        if ($tournament->hasCommenced() || $user->hasTeam($tournament)) {
            return false;
        }

        return true;
    }

    /**
     * Determine whether the user can update the team.
     *
     * @param  \App\User  $user
     * @param  \App\team  $team
     * @return mixed
     */
    public function update(User $user, Team $team)
    {
        //
    }

    /**
     * Determine whether the user can delete the team.
     *
     * @param  \App\User  $user
     * @param  \App\team  $team
     * @return mixed
     */
    public function delete(User $user, Team $team)
    {
        //
    }
}
