<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ruleset extends Model
{
	protected $fillable = [
		'name',
		'game_id',
		'content'
	];

	public function game()
	{
		return $this->belongsTo(Game::class);
	}
}