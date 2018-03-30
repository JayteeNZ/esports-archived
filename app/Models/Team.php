<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
	protected $fillable = [
		'name',
		'tournament_id',
		'challonge_id'
	];

	protected $with = ['users'];

	public function getId()
	{
		return $this->id;
	}

	public function users()
	{
		return $this->belongsToMany(User::class)->withPivot(['status', 'position'])
			->withTimestamps();
	}

	public function score($match)
	{
		return $this->scores->where('match_id', $match->id)->first();
	}

	public function scores()
	{
		return $this->hasMany(MatchScore::class);
	}

	/**
	 * Return the teams matches.
	 * @return [type] [description]
	 */
	public function matches()
	{
		return $this->belongsToMany(Match::class);
	}

	public function setLeader($id)
	{
		$this->users()->attach($id, ['status' => 2, 'position' => 2]);
	}

	public function isLeader($user)
	{
		return $this->users()->find($user->id)->pivot->position === 2;
	}

	public function isCaptain($user)
	{
		return $this->users()->find($user->id)->pivot->position === 1;
	}

	public function leader()
	{
		return $this->users()->where('position', 2)->firstOrFail();
	}

	public function add(User $user, $options = [])
	{
		if ($this->findMember($user)) {
			return;
		}
		
		$this->users()->attach($user, $options);
	}

	public function remove(User $user)
	{
		if (!$this->findMember($user)) {
			return;
		}
		return $this->users()->detach($user);
	}

	public function findMember(User $user)
	{
		return !! $this->users()->where('user_id', $user->id)->count();
	}

	public function tournament()
	{
		return $this->belongsTo(Tournament::class);
	}

	public function addMembers($users = [])
	{
		collect($users)->each(function ($user) {
			$this->add($user, ['status' => 0, 'position' => 0]);
		});
	}
}