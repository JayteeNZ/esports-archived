<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
	public static function retrieve()
	{
		return self::all();
	}

	public function game()
	{
		return $this->belongsTo(Game::class);
	}
}