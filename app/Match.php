<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
	protected $fillable = [
		'challonge_match_id',
		'challonge_bracket_stage',
	];
}