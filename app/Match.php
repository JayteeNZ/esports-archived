<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
	protected $guarded = [];

	public function teamOne()
	{
		return Team::where('id', $this->team_one_id)->first();
	}

	public function teamTwo()
	{
		return Team::where('id', $this->team_two_id)->first();
	}
}