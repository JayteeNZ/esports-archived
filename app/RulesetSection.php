<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RulesetSection extends Model
{
	protected $fillable = [
		'title',
		'ruleset_id',
		'content'
	];
}