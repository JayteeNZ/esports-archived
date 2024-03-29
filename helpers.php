<?php

if (! function_exists('active')) {
	function active($route, $matchType = 'all', $class = 'active') {
		if ($matchType != 'all') {
			return request()->is($route) ? $class : '';
		}
		return request()->is($route . '*') ? $class : '';
	}
}

function return_if($value) {
	if ($value == true) {
		return $value;
	}
}