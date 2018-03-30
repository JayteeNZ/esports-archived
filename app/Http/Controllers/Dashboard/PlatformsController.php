<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Platform;
use App\Http\Controllers\Controller;

class PlatformsController extends Controller
{
	/**
	 * Show a list of the resources.
	 * 
	 * @return Illuminate\Http\Response
	 */
	public function index()
	{
		$platforms = Platform::get();
		return view('dashboard.platforms.index', compact('platforms'));
	}

	public function store()
	{
		$data = request()->validate([
			'name' => 'required',
			'display_name' => 'required',
			'slug' => 'required|unique:platforms,slug',
			'visible' => 'boolean'
		]);

		Platform::create($data);

		return redirect('/dashboard/platforms');
	}
}