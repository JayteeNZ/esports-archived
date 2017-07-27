<?php

namespace App;

use App\Tournament;
use Illuminate\Database\Eloquent\Model;

class Brackets extends Model
{
	protected $fillable = [
		'tournament_id',
		'challonge_id',
		'url',
	];
}