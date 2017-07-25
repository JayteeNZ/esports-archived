<?php

namespace Parallel;

use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
	public static function retrieve()
	{
		return static::all();
	}

	public function getAssociatedUSer()
	{
		return Controller::where('id', 1);
	}

}