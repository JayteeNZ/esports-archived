<?php

namespace App;

use App\Game;
use App\RulesetSection;
use Illuminate\Database\Eloquent\Model;

class Ruleset extends Model
{
	protected $fillable = [
		'name',
		'game_id',
		'for_feature'
	];

	protected $with = ['sections'];

	public function game()
	{
		return $this->belongsTo(Game::class);
	}

	public function sections()
	{
		return $this->hasMany(RulesetSection::class);
	}
}