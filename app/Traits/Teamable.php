<?php

namespace App\Traits;

use App\Models\{Team, Match, Tournament};

trait Teamable
{
	public function teams()
    {
        return $this->belongsToMany(Team::class)->withPivot(['status', 'position'])
            ->withTimestamps();
    }

    /**
     * Check if a user has a team for the given tournament.
     * @param  Tournament $tournament
     * @return boolean
     */
    public function hasTeam(Tournament $tournament)
    {
        return !! $this->teams()->where('tournament_id', $tournament->id)->count();
    }

    /**
     * Get the team for the given Tournament.
     * @param  Team $team
     * @return App\Team
     */
   	public function getTeam(Tournament $tournament)
   	{
   		return $this->teams()->where('tournament_id', $tournament->id)->first();
   	}

    // needs revamping. Change relationship for effective use.
    public function hasMatch(Match $match)
    {
        if ($match->teamOne()->users()->where('user_id', $this->id)->first()) {
            return true;
        }

        if ($match->teamTwo()->users()->where('user_id', $this->id)->first()) {
            return true;
        }

        return false;
    }

    public function getTeamForMatch(Match $match)
    {
        if (!$this->hasTeam($match->tournament)) {
            abort(403);
        }

        if ($match->teamOne()->users()->where('user_id', $this->id)->first()) {
            return $match->teamOne;
        }

        abort(403);
    }
}