<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
	protected $guarded = ['id'];

	protected $dates = ['starts_at'];

	protected $with = ['game', 'platform'];

	public function setStatus($status)
	{
		// 0 => scheduled: 1 => commenced
		$this->status = $status;
		return $this->save();
	}

	// switch this to a presenter
	public function getStatus()
	{
		switch($this->status) {
			case 0:
				return 'Scheduled';
			case 1:
				return 'Commenced';
			case 2:
				return 'Completed';
			default:
				return 'Unknown';
		}
	}

	// switch this to a presenter
	public function getRegistrationStatus()
	{
		switch($this->registration_status) {
			case 1:
				return 'Open';
			case 0:
				return 'Closed';
			default:
				return 'Unknown';
		}
	}

	// switch this to a presenter or mask behind a mathematical class for future use
	public function getRounds()
	{
		switch($this->teams_per_bracket) {
			case 8:
				return 3;
			case 16:
				return 4;
			case 32:
				return 5;
			case 64:
				return 6;
			case 128:
				return 7;
			default:
				return;
		}
	}

	public function setRegistrationStatus($status)
	{
		$this->registration_status = $status;
		
		return $this->save();
	}

	public function teams()
	{
		return $this->hasMany(Team::class);
	}

	public function scopeWhereScheduledOrCommenced($query)
	{
		return $query->where('status', 0)->orWhere('status', 1);
	}

	public function scopeWhereScheduled($query)
	{
		return $query->where('status', 0);
	}

	public function scopeWhereScheduledAndRegistrationClosed($query)
	{
		return $query->where('status', 0)->where('registration_status', 0);
	}

	public function hasCommenced()
	{
		return $this->status !== 0;
	}

	public function registrationsClosed()
	{
		return $this->registration_status === 0;
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

	public function brackets()
	{
		return $this->hasMany(Bracket::class);
	}

	public function matches()
	{
		return $this->hasMany(Match::class);
	}

	public function hasTeamByName($name)
	{
		return $this->teams()->where('name', $name)->count();
	}
}