<?php

namespace App;

use App\Tournament;
use Illuminate\Database\Eloquent\Model;

class Bracket extends Model
{
	protected $fillable = [
		'tournament_id',
		'challonge_id',
		'url',
	];

	public function tournament()
	{
		return $this->belongsTo(Tournament::class);
	}
}