<?php

namespace App\Http\Controllers\Matches;

use App\Models\Match;
use App\Events\Comments\MatchCommentCreated;
use App\Http\Controllers\Controller;

class MatchCommentsController extends Controller
{
	public function index(Match $match)
	{
		return $match->comments()->with('user')->orderBy('created_at', 'desc')->get();
	}

	public function store(Match $match)
	{
		$data = request()->validate([
			'body' => 'required|max:2000',
		]);

		$message = $match->comments()->create([
			'user_id' => auth()->user()->id,
			'body' => request('body')
		]);

		broadcast(new MatchCommentCreated($message))->toOthers();
	}
}