<?php

namespace Parallel\Http\Controllers\Dashboard;

use Parallel\Http\Controllers\Controller;

class HomeController extends Controller
{
	public function index()
	{
		return view('dashboard.home');
	}
}