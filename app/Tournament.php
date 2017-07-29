<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
	protected $guarded = ['id'];

	protected $dates = ['starts_at'];

	protected $with = ['game', 'platform'];

	public function setStatus($status)
	{
		$this->status = $status;
		$this->save();
	}

	public function teams()
	{
		return $this->hasMany(Team::class);
	}

	public function scopeWhereScheduledOrStarted($query)
	{
		return $query->where('status', 'scheduled')->orWhere('status', 'started');
	}
	
	public static function retrieve()
	{
		return self::all();
	}

	public function game()
	{
		return $this->belongsTo(Game::class);
	}

	public function platform()
	{
		return $this->belongsTo(Platform::class);
	}

	public function ruleset()
	{
		return $this->belongsTo(Ruleset::class);
	}

	public function hasTeamByName($name)
	{
		return $this->teams()->where('name', $name)->count();
	}
}