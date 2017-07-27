<?php

if (! function_exists('active')) {
	function active($route, $class = 'active') {
		return request()->is($route . '*') ? $class : '';
	}
}