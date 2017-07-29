<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
	protected $fillable = [
		'name',
		'tournament_id',
	];

	public function users()
	{
		return $this->belongsToMany(User::class)->withPivot(['status', 'position'])
			->withTimestamps();
	}

	public function tournament()
	{
		return $this->belongsTo(Tournament::class);
	}
}