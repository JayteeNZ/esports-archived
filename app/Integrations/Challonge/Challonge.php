<?php

namespace App\Integrations\Challonge;

class Challonge
{
	public function __construct()
	{
		$this->challonge = app('challonge');
	}
}