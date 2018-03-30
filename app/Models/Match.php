<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
	protected $guarded = [];

	public function tournament()
	{
		return $this->belongsTo(Tournament::class);
	}

	public function teams()
	{
		return $this->belongsToMany(Team::class)->withTimestamps();
	}

	public function comments()
	{
		return $this->hasMany(Comment::class);
	}

	public function teamOne()
	{
		return $this->teams->first();
	}

	public function teamTwo()
	{
		return $this->teams->last();
	}

	public function hasTeam($team)
	{
		return !! $this->teams->where('id', $team->id)->count();
	}

	public function findTeamForUser($user)
	{
		if ((bool) $this->teamOne()->users->where('id', $user->id)->count()) {
			return $this->teamOne();
		}


		if ((bool) $this->teamTwo()->users->where('id', $user->id)->count()) {
			return $this->teamTwo();
		} 

		return false;
	}

	public function awaitingScores($query)
	{
		return $this->where('status', 2)->orWhere('status', 3);
	}

	public function score()
	{
		return $this->hasMany(MatchScore::class);
	}

	public function updateStatus($status)
	{
		$this->status = $status;
		$this->save();
	}

	public function getStatus()
	{
		switch($this->status) {
			case 1:
				return 'Scheduled';
			case 2:
				$team = $this->teams->where('id', $this->score->first()->team_id)->first();
				return "{$team->name} has reported - Waiting for {$this->teams->where('id', '!=', $team->id)->first()->name}";
			case 3:
				$team = $this->teams->where('id', $this->score->first()->team_id)->first();
				return "{$team->name} has reported - Waiting for {$this->teams->where('id', '!=', $team->id)->first()->name}";
			case 4:
				return "Disputed";
			case 5:
				return "Completed";
			default:
				return "Unknown";
		}
	}

	public function getTeamOneScore()
	{
		return $this->score->where('team_id', $this->teamOne()->id)->first()->score ?? '0';
	}

	public function getTeamTwoScore()
	{
		return $this->score->where('team_id', $this->teamTwo()->id)->first()->score ?? '0';
	}

	public function bracket()
	{
		return $this->belongsTo(Bracket::class, 'challonge_tournament_id', 'challonge_id');
	}
}